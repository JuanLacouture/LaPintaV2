<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Pinta - Menú</title>
    <link rel="icon" href="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Header&Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/CSS/carta.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Scrollers.css') }}">
    <script src="{{ asset('menu_restaurante/JAVASCRIPT/desplegable.js') }}" defer></script>
    <script src="{{ asset('menu_restaurante/JAVASCRIPT/Carta.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Questrial&display=swap" rel="stylesheet">
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
                <a href="{{ route('carrito') }}">Carrito de Compras</a>
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
        <div class="Entradas">
            <h1>Entradas</h1>
            <div class="carousel-container">
                <button class="carousel-button left" onclick="scrollCarousel('entradas-carousel', -300)">&#9664;</button>
                <div class="carousel" id="entradas-carousel"></div>
                @foreach ($products as $product)
                    @if ($product->category === 'Entradas')
                        <div class="carousel-item">
                            <div class="plato">
                                <img src="{{ asset('menu_restaurante/Imagenes/Menu/' . $product->image) }}" alt="{{ $product->name }}">
                                <p class="precio">${{ number_format($product->price, 0, ',', '.') }}</p>
                                <p class="nombre"><strong>{{ $product->name }}</strong></p>
                                <p class="descripcion">{{ $product->description }}</p>
                                <button class="add-to-cart" onclick="toggleDesplegable()" 
                                        data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}, "image": "{{ $product->image }}" }'>
                                    Añadir al carrito
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
                <button class="carousel-button right" onclick="scrollCarousel('entradas-carousel', 300)">&#9654;</button>
                </div>
            </div>
        </div>

        <div class="Platos-Fuertes">
            <h1>Platos Fuertes</h1>
            <div class="carousel-container">
                <button class="carousel-button left" onclick="scrollCarousel('platos-fuertes-carousel', -300)">&#9664;</button>
                <div class="carousel" id="platos-fuertes-carousel"></div>
                @foreach ($products as $product)
                    @if ($product->category === 'Platos Fuertes')
                        <div class="plato">
                            <img src="{{ asset('menu_restaurante/Imagenes/Menu/' . $product->image) }}" alt="{{ $product->name }}">
                            <p class="precio">${{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="nombre"><strong>{{ $product->name }}</strong></p>
                            <p class="descripcion">{{ $product->description }}</p>
                            <button class="add-to-cart" onclick="toggleDesplegable()" 
                                    data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}, "image": "{{ $product->image }}" }'>
                                Añadir al carrito
                            </button>
                        </div>
                    @endif
                @endforeach
                <button class="carousel-button right" onclick="scrollCarousel('platos-fuertes-carousel', 300)">&#9654;</button>
                </div>
            </div>
        </div>

        <div class="Bebidas">
            <h1>Bebidas</h1>
            <div class="carousel-container">
                <button class="carousel-button left" onclick="scrollCarousel('bebidas-carousel', -300)">&#9664;</button>
                <div class="carousel" id="bebidas-carousel"></div>
                @foreach ($products as $product)
                    @if ($product->category === 'Bebidas')
                        <div class="plato">
                            <img src="{{ asset('menu_restaurante/Imagenes/Menu/' . $product->image) }}" alt="{{ $product->name }}">
                            <p class="precio">${{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="nombre"><strong>{{ $product->name }}</strong></p>
                            <p class="descripcion">{{ $product->description }}</p>
                            <button class="add-to-cart" onclick="toggleDesplegable()" 
                                    data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}, "image": "{{ $product->image }}" }'>
                                Añadir al carrito
                            </button>
                        </div>
                    @endif
                @endforeach
                <button class="carousel-button right" onclick="scrollCarousel('bebidas-carousel', 300)">&#9654;</button>
                </div>
                
            </div>
        </div>

        <div class="Postres">
            <h1>Postres</h1>
            <div class="carousel-container">
                <button class="carousel-button left" onclick="scrollCarousel('postres-carousel', -300)">&#9664;</button>
                <div class="carousel" id="postres-carousel"></div>
                @foreach ($products as $product)
                    @if ($product->category === 'Postres')
                        <div class="plato">
                            <img src="{{ asset('menu_restaurante/Imagenes/Menu/' . $product->image) }}" alt="{{ $product->name }}">
                            <p class="precio">${{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="nombre"><strong>{{ $product->name }}</strong></p>
                            <p class="descripcion">{{ $product->description }}</p>
                            <button class="add-to-cart" onclick="toggleDesplegable()" 
                                    data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}, "image": "{{ $product->image }}" }'>
                                Añadir al carrito
                            </button>
                        </div>
                    @endif
                @endforeach
                <button class="carousel-button right" onclick="scrollCarousel('postres-carousel', 300)">&#9654;</button>
                </div>
                
            </div>
        </div>

        <div class="sticky-button" onclick="toggleDesplegable()">
            <img src="{{ asset('menu_restaurante/Imagenes/Home/carritoIcono copy.png') }}" alt="Carrito de Compras">
        </div>

        <div id="overlay" class="overlay" onclick="toggleDesplegable()"></div>

        <div id="slider-container">
            <div id="slider-content">
                <button class="close-btn" onclick="toggleDesplegable()">&times;</button>
                <iframe src="{{ route('desplegable') }}" id="desplegable-iframe" frameborder="0"></iframe>
            </div>
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
