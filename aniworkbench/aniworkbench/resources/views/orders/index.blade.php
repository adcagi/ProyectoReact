@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Mis pedidos</title>

    <style>
        body {
            background: #050505;
            color: #00ff88;
            font-family: Arial;
        }

        .box {
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            text-shadow: 0 0 10px #00ff88;
        }

        .order {
            border: 1px solid #00ff88;
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            background: rgba(0,255,136,0.05);
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px;
            border: 1px solid #00ff88;
            color: #00ff88;
            text-decoration: none;
            border-radius: 8px;
        }

        .btn:hover {
            box-shadow: 0 0 10px #00ff88;
        }
    </style>
</head>
<body>



<div class="box">

    <h1>📦 MIS PEDIDOS <> </h1>

    @foreach($orders as $order)
        <div class="order">
            <b>Pedido #{{ $order->id }}</b><br>
            Estado: {{ $order->status }}<br>
            Total: {{ $order->total }} €<br>
            Fecha: {{ $order->created_at }}

            <br>

            <a class="btn" href="/orders/{{ $order->id }}">
                👁 Ver detalle
            </a>
        </div>
    @endforeach

</div>

</body>
</html>
@endsection