<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario de Pago - La Pinta</title>
    <!-- Enlace a la hoja de estilos usando el helper asset() -->
    <link rel="stylesheet" href="{{  ('http://127.0.0.1:8000/menu_restaurante/CSS/pago.css') }}">
    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <!-- Enlace al archivo JavaScript usando el helper asset() -->
    <script src="{{ ('http://127.0.0.1:8000/menu_restaurante/JAVASCRIPT/Pago.js') }}" defer></script>
</head>

<body>
    <img src="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" alt="Imagen">
    <h1>Formulario de Pago</h1>
    <form id="payment-form">
    <label for="name">Nombre Completo:</label>
    <input type="text" id="name" name="nombre" required>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>

    <label for="address">Dirección:</label>
    <input type="text" id="address" name="direccion" required>

    <label for="payment-method">Método de Pago:</label>
    <select id="payment-method" name="metodo_pago" required>
        <option value="credit-card">Tarjeta de Crédito</option>
        <option value="debit-card">Tarjeta de Débito</option>
        <option value="paypal">PayPal</option>
    </select>

    <div id="cart-items" class="cart-items">
        <!-- Los elementos del carrito se renderizarán aquí dinámicamente -->
    </div>

    <button type="button" id="submit-button">Pagar</button>
</form>

<script>
    document.getElementById("submit-button").addEventListener("click", async () => {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const total = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);

        const orderData = {
            nombre: document.getElementById("name").value,
            telefono: document.getElementById("telefono").value,
            email: document.getElementById("email").value,
            direccion: document.getElementById("address").value,
            productos: cart.map(item => ({
                id: item.id,
                cantidad: item.quantity,
                precio_unitario: item.price
            })),
            total: total
        };

        console.log("Enviando datos:", JSON.stringify(orderData));

        try {
            const response = await fetch("{{ route('guardar_orden') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify(orderData)
            });

            if (!response.ok) {
                throw new Error(`Error en la solicitud: ${response.status}`);
            }

            alert("¡Pedido enviado correctamente!");
            localStorage.removeItem("cart"); // Limpia el carrito
            window.location.href = "{{ route('confirmacion') }}";
        } catch (error) {
            console.error("Error al enviar el pedido:", error);
            alert("Hubo un problema al enviar el pedido. Por favor, intenta de nuevo.");
        }
    });
</script>


    <div id="order-summary"></div>
        <h2>Resumen del Pedido</h2>
        <ul id="item-list"></ul>
        <p id="total-amount"></p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const cartItemsContainer = document.getElementById("cart-items");
            const productosInput = document.getElementById("productos-input");
            let totalAmount = 0;

            // Renderizar productos en el carrito
            cartItemsContainer.innerHTML = "";
            cart.forEach(item => {
                const itemElement = document.createElement("div");
                itemElement.innerHTML = `
                    <p><strong>${item.name}</strong> - Cantidad: ${item.quantity}</p>
                    <p>Precio unitario: $${item.price.toFixed(2)}</p>
                `;
                cartItemsContainer.appendChild(itemElement);
                totalAmount += item.price * item.quantity;
            });

            // Mostrar total en resumen
            document.getElementById("total-amount").innerText = `Total: $${totalAmount.toFixed(2)}`;

            // Pasar productos al input oculto
            productosInput.value = JSON.stringify(cart.map(item => ({
                id: item.id,
                cantidad: item.quantity,
                precio_unitario: item.price,
            })));
        });
    </script>
</body>
</html>
