@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Catálogo test1</title>

    <style>
        body {
            background: #050505;
            color: #00ff88;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #00ff88;
            text-shadow: 0 0 10px #00ff88;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .product {
            border: 1px solid #00ff88;
            background: rgba(0,255,136,0.05);
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,255,136,0.2);
        }

        .product h3 {
            margin: 0;
            color: #00ff88;
        }

        .price {
            font-weight: bold;
            color: white;
        }

        a {
            color: #00ff88;
            text-decoration: none;
        }

        a:hover {
            text-shadow: 0 0 10px #00ff88;
        }

        .cart-btn {
            display: block;
            text-align: center;
            margin: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>CATÁLOGO test 13
    </h1>

    @foreach($products as $product)
        <div class="product">
            <h3>{{ $product->name }}</h3>

            <div class="image">
                @if($product->image ?? false)
                    @if(str_starts_with($product->image, 'http'))
                        <img src="{{ $product->image }}"
                            style="max-width:200px;max-height:200px;border-radius:10px;">
                    @else
                        <img src="{{ asset('storage/' . $product->image) }}"
                            style="max-width:200px;max-height:200px;border-radius:10px;">
                    @endif
                @else
                    📦 Sin imagen
                @endif
            </div>

            <p>{{ $product->description }}</p>
            <p class="price">{{ $product->price }} €</p>

            <a href="/cart/add/{{ $product->id }}">
                ➕ Añadir al carrito
            </a>

            <div>
                <h3>
                    <a href="{{ url('/products/' . $product->id) }}">
                        Ver Producto
                    </a>
                </h3>

                <p>{{ $product->price }} €</p>
            </div>

        </div>
    @endforeach

    <a class="cart-btn" href="/cart">
        🛒 Ir al CARRO
    </a>

</div>

</body>
</html>
@endsection
