<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido - La Pinta</title>
    <link rel="stylesheet" href="{{ asset('menu_restaurante/CSS/confirmacion.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <script src="{{ ('http://127.0.0.1:8000/menu_restaurante/JAVASCRIPT/Confirmacion.js') }}" defer></script>
</head>

<body>
    <img src="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" alt="Imagen">
    <h1>Confirmación de Pedido</h1>

    <div id="order-summary">
        <!-- Aquí se mostrarán los detalles de la orden -->
    </div>
</body>
</html>
