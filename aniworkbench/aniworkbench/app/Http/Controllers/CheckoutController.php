<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function show($id)
{
    $order = \App\Models\Order::with('items.product')->findOrFail($id);

    return response()->json($order);
}
public function apiStore(Request $request)
{
    $cart = $request->input('cart', []);

    if (!is_array($cart) || empty($cart)) {
        return response()->json([
            'error' => 'Carrito vacío o inválido'
        ], 400);
    }

    $order = Order::create([
        'user_id' => null,
        'status' => 'pending',
        'total' => 0,
    ]);

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    $order->update([
        'total' => $total,
    ]);

    return response()->json([
        'id' => $order->id
    ]);
}
    public function index()
    {
        $cart = session()->get('cart', []);

        return \App\Models\Order::orderBy('created_at', 'desc')->get();
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/products')->with('error', 'Carrito vacío');
        }

        $order = Order::create([
            'user_id' => auth()->id() ?? 1,
            'status' => 'pending',
            'total' => 0,
        ]);

        $total = 0;

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $total += $item['quantity'] * $item['price'];
        }

        $order->update([
            'total' => $total,
        ]);

        session()->forget('cart');

        return redirect('/products')->with('success', 'Pedido creado correctamente');
    }
}