@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Carrito</title>

    <style>
        body {
            background: #050505;
            color: #00ff88;
            font-family: Arial, sans-serif;
        }

        h1, h3 {
            text-align: center;
            text-shadow: 0 0 10px #00ff88;
        }

        .cart {
            max-width: 800px;
            margin: auto;
        }

        .item {
            border: 1px solid #00ff88;
            background: rgba(0,255,136,0.05);
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .btn {
            display: block;
            text-align: center;
            margin: 15px;
            padding: 10px;
            border: 1px solid #00ff88;
            border-radius: 8px;
        }
    </style>
</head>

<body>


<div class="cart">

    <h1>🛒 CARRITO</h1>

    @php $total = 0; @endphp

    @foreach($cart as $id => $item)

        <div class="item">
            <div>
                <strong>{{ $item['name'] }}</strong><br>
                {{ $item['quantity'] }} x {{ $item['price'] }} €
            </div>

            <a href="/cart/remove/{{ $id }}">
                ❌ eliminar
            </a>
        </div>

        @php $total += $item['quantity'] * $item['price']; @endphp

    @endforeach

<h3 class="total">TOTAL: {{ $total }} €</h3>

<a class="btn" href="/checkout">
    💳 FINALIZAR COMPRA
</a>

<a class="btn" href="/cart/clear">
    🧹 Vaciar carrito
</a>

<a class="btn" href="/products">
    🏪 volver a la tienda
</a>

</div>

</body>
</html>
@endsection