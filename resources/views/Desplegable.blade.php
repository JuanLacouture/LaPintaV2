<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <link rel="stylesheet" href="{{ asset('menu_restaurante/CSS/desplegable.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Scrollers.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <script src="{{ asset('menu_restaurante/JAVASCRIPT/desplegable.js') }}" defer></script>
</head>

<body>
    <div id="desplegable-container" class="cart-summary">
        <h1>Resumen de compra</h1>
        <div id="cart-items" class="cart-items">
                <!-- Los elementos del carrito se insertarán aquí dinámicamente -->
        </div>
        <div class="summary">
            <p>SubTotal: <span id="subtotal">$0</span></p>
            <p>Impuestos (IVA 19%): <span id="tax">$0</span></p>
            <p>Envío: <span id="shipping">-</span></p>
            <h3>Total de la orden: <span id="total">$0</span></h3>
            <script>
                const carritoUrl = "{{ route('carrito') }}";
            </script>
            <button class="checkout-btn" onclick="finalizarCompra()">Finalizar compra</button>
        </div>
    </div>
</body>
</html>