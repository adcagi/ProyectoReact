@extends('layouts.app')

@section('content')

<head>

    <style>
        body {
            background: #050505;
            color: #00ff88;
            font-family: Arial;
        }

        .box {
            max-width: 700px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
        }

        h1 {
            text-shadow: 0 0 10px #00ff88;
        }

        .cart-item {
            border: 1px solid #00ff88;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            background: rgba(0,255,136,0.05);
        }

        .total {
            font-size: 22px;
            margin-top: 20px;
        }

        button {
            background: black;
            color: #00ff88;
            border: 1px solid #00ff88;
            padding: 12px 20px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            box-shadow: 0 0 10px #00ff88;
        }

        a {
            color: #00ff88;
            display: block;
            margin-top: 15px;
            text-decoration: none;
        }

        a:hover {
            text-shadow: 0 0 10px #00ff88;
        }
    </style>
</head>


<div class="box">

    <h1>💳 CHECKOUT</h1>
    <h2>test</h2>
    @if(empty($cart))
        <p>❌ El carrito está vacío</p>
    @else

        @php $total = 0; @endphp

        @foreach($cart as $item)
            <div class="cart-item">
                <strong>{{ $item['name'] }}</strong><br>
                {{ $item['quantity'] }} x {{ $item['price'] }} €
            </div>

            @php $total += $item['quantity'] * $item['price']; @endphp
        @endforeach

        <div class="total">
            TOTAL: {{ $total }} €
        </div>

        <form method="POST" action="/checkout">
            @csrf
            <button type="submit">
                Finalizar compra
            </button>
        </form>

    @endif

    <a href="/cart">← volver al carrito</a>

</div>


@endsection
