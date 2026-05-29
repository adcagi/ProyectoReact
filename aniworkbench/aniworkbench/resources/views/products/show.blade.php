<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>

    <style>
        body {
            margin: 0;
            background: #050505;
            color: #00ff88;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .image {
            border: 1px solid #00ff88;
            border-radius: 15px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0,255,136,0.05);
            font-size: 14px;
        }

        .card {
            padding: 20px;
        }

        h1 {
            font-size: 32px;
            text-shadow: 0 0 10px #00ff88;
            margin-bottom: 10px;
        }

        .price {
            font-size: 26px;
            margin: 15px 0;
        }

        .stock {
            margin-bottom: 15px;
            opacity: 0.8;
        }

        .description {
            margin: 20px 0;
            line-height: 1.5;
            opacity: 0.9;
        }

        button {
            background: transparent;
            border: 1px solid #00ff88;
            color: #00ff88;
            padding: 12px 20px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: 0.3s;
        }

        button:hover {
            box-shadow: 0 0 15px #00ff88;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #00ff88;
            text-decoration: none;
        }

        .back:hover {
            text-shadow: 0 0 10px #00ff88;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #00ff88;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">

    {{-- IMAGEN --}}
    <div class="image">
        @if($product->image ?? false)
            <img src="{{ asset('storage/' . $product->image) }}"
                 style="max-width:100%;max-height:100%;border-radius:10px;">
        @else
            📦 Sin imagen
        @endif
    </div>

    {{-- INFO --}}
    <div class="card">

        <span class="badge">Producto</span>

        <h1>{{ $product->name }}</h1>

        <div class="price">
            {{ $product->price }} €
        </div>

        <div class="stock">
            Stock disponible: {{ $product->stock }}
        </div>

        <div class="description">
            {{ $product->description ?? 'Sin descripción disponible.' }}
        </div>

        {{-- ADD TO CART --}}
        <form method="POST" action="{{ url('/cart/add/' . $product->id) }}">
            @csrf
            <button type="submit">
                🛒 Añadir al carrito
            </button>
        </form>

        <a class="back" href="/products">
            ← Volver a productos
        </a>

    </div>

</div>

</body>
</html>