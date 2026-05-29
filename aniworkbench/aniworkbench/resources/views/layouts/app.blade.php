<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #050505;
            color: #00ff88;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            border-bottom: 1px solid #00ff88;
            position: sticky;
            top: 0;
            background: #050505;
        }

        .logo {
            font-weight: bold;
            text-shadow: 0 0 10px #00ff88;
        }

        nav a {
            margin: 0 10px;
            color: #00ff88;
            text-decoration: none;
        }

        nav a:hover {
            text-shadow: 0 0 10px #00ff88;
        }

        .container {
            padding: 30px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">🛍️ MyShop</div>

    <nav>
        <a href="/dashboard">Home</a>
        <a href="/products">Productos</a>
        <a href="/cart">Carrito</a>
        <a href="/orders">Mis pedidos</a>

        @auth
    <form action="/logout" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="background:none;border:none;color:#00ff88;cursor:pointer;font-family:Arial;font-size:16px;">
            Salir
        </button>
    </form>
            
        @else
            <a href="/login">Login</a>
        @endauth
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

</body>
</html>
