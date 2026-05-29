<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Carrito vacío');
        }

        return DB::transaction(function () use ($cart, $request) {

            $total = 0;
            $products = [];

            // 1. VALIDAR TODO
            foreach ($cart as $id => $item) {

                $product = Product::find($id);

                if (!$product) {
                    return redirect('/cart')->with('error', 'Producto no encontrado');
                }

                if ($product->stock < $item['quantity']) {
                    return redirect('/cart')->with('error', 'Stock insuficiente para ' . $product->name);
                }

                $products[$id] = $product;

                $total += $item['price'] * $item['quantity'];
            }

            // 2. CREAR ORDER
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending',
                'address' => $request->address ?? null
            ]);

            // 3. CREAR ITEMS + DESCONTAR STOCK
            foreach ($cart as $id => $item) {

                $product = $products[$id];

                $product->decrement('stock', $item['quantity']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget('cart');

            return redirect('/orders/' . $order->id);
        });
    }
}