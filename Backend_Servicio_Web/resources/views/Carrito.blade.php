<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Pinta - Mi Pedido</title>
    <link rel="icon" href="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/CSS/carrito.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Header&Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Scrollers.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Questrial&display=swap" rel="stylesheet">
    <script src="{{ asset('menu_restaurante/JAVASCRIPT/Carrito.js') }}" defer></script>
</head>
<body>
    <header>
        <div class="dropdown">
            <button class="dropbtn">
                <img src="{{ asset('menu_restaurante/Imagenes/Menu_Hamburgesa.png') }}" alt="Menu">
            </button>
            <div class="dropdown-content">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('conocenos') }}">¿Quiénes Somos?</a>
                <a href="{{ route('carta') }}">Carta</a>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
        
        <h1><a href="{{ route('home') }}">La Pinta</a></h1>
        <div>
            <a href="{{ route('carrito') }}">
                <img src="{{ asset('menu_restaurante/Imagenes/Index/carritoIcono.png') }}" alt="Carrito">
            </a>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <h1>Mi Pedido</h1>
            <div class="cart">
                <div class="cart-header">
                    <span class="header-product">Producto</span>
                    <span class="header-quantity">Cantidad</span>
                    <span class="header-price">Precio</span>
                </div>
                <div class="cart-item">
                    <div class="product">
                        <!-- Aquí se renderizarán los items del carrito -->
                    </div>
                </div>
                <div class="quantity-container">
                    <button class="minus" data-name="Product Name">-</button>
                    <input type="number" value="1" readonly>
                    <button class="plus" data-name="Product Name">+</button>
                </div>
                <div class="price-container">
                    <!-- Aquí se renderizarán el precio del carrito -->
                </div>
            </div>
            
            <div class="summary">
                <div class="button-container">
                    <button id="clear-cart" class="clear-cart"></button>
                </div>
                <div>Subtotal: <span id="subtotal">$0.00</span></div>
                <div>IVA (19%): <span id="tax">$0.00</span></div>
                <div>Total: <span id="total">$0.00</span></div>
            </div>
            <button id="buy-now" class="buy-now">Comprar</button>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" alt="La Pinta Logo">
                </a>
                <div class="footer-address">
                    <p><strong>Dirección:</strong> Cra 69 #25B – 44 Of. 609,<br>Edificio World Business Port</p>
                    <p><strong>Teléfono:</strong> 601 7034250</p>
                </div>
            </div>
            <div class="footer-right">
                <h2><a href="{{ route('conocenos') }}">Conócenos</a></h2> 
                <div class="footer-social">
                    <img src="{{ asset('menu_restaurante/Imagenes/Home/RedesSociales.png') }}" alt="Redes Sociales">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
