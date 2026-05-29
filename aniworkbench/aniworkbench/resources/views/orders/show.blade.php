@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Pedido #{{ $order->id }}</title>

    <style>
        body {
            background: #050505;
            color: #00ff88;
            font-family: Arial, sans-serif;
        }

        .box {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            text-shadow: 0 0 10px #00ff88;
        }

        .card {
            border: 1px solid #00ff88;
            background: rgba(0,255,136,0.05);
            padding: 15px;
            margin: 10px 0;
            border-radius: 12px;
        }

        .info {
            text-align: center;
            margin-bottom: 20px;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #00ff88;
            border-radius: 6px;
            margin-top: 5px;
        }

        a {
            color: #00ff88;
            text-decoration: none;
        }

        a:hover {
            text-shadow: 0 0 10px #00ff88;
        }

        .total {
            text-align: center;
            font-size: 22px;
            margin-top: 20px;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 25px;
            padding: 10px;
            border: 1px solid #00ff88;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="box">

    <h1>📦 PEDIDO #{{ $order->id }}</h1>

    <div class="info">
        <h2>
            Estado:
            <span class="badge">{{ ucfirst($order->status) }}</span>
        </h2>

        <p>
            Fecha: {{ $order->created_at->format('d/m/Y H:i') }}
        </p>

        <p>
            Total: <b>{{ $order->total }} €</b>
        </p>
    </div>

    <h2>🛒 Productos</h2>

    @foreach($order->items as $item)
        <div class="card">

            @if(str_starts_with($item->product->image ?? '', 'http'))
                <img src="{{ $item->product->image }}"
                     style="width:80px;height:80px;border-radius:10px;">
            @else
                <img src="{{ asset('storage/' . $item->product->image) }}"
                     style="width:80px;height:80px;border-radius:10px;">
            @endif

            <br>

            <b>{{ $item->product->name }}</b><br>
            Cantidad: {{ $item->quantity }}<br>
            Precio: {{ $item->price }} €

        </div>
    @endforeach

    <div class="total">
        💰 TOTAL: {{ $order->total }} €
    </div>

    <a class="back" href="/products">
        🏪 Volver a la tienda
    </a>

</div>

</body>
</html>
@endsection
