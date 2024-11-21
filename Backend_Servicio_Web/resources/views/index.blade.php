<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Pinta</title>
    <link rel="icon" href="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Header&Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('menu_restaurante/Scrollers.css') }}">
</head>
<body>
    <header>
        <div class="dropdown">
            <button class="dropbtn">
                <img src="{{ asset('menu_restaurante/Imagenes/Menu_Hamburgesa.png') }}" alt="Menu">
            </button>
            <div class="dropdown-content">
                <a href="{{ route('conocenos') }}">¿Quiénes Somos?</a>
                <a href="{{ route('carta') }}">Carta</a>
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

    <div class="slider-box">
        <ul>
            <li>
                <img src="{{ asset('menu_restaurante/Imagenes/Index/bandeja_grande.png') }}" alt="Bandeja Paisa">
                <div class="texteo">
                    <h3>Plato de la Temporada</h3>
                    <h1><a href="{{ route('carta') }}">Bandeja Paisa</a></h1>
                    <p>Frijoles, arroz, carne molida, chicharrón, chorizo, huevo, y plátano maduro.</p>
                </div>
            </li>
            <li>
                <img src="{{ asset('menu_restaurante/Imagenes/Index/Ceviche_grande.png') }}" alt="Ceviche de Camarón">
                <div class="texteo">
                    <h3>Entrada de la Temporada</h3>
                    <h1><a href="{{ route('carta') }}">Ceviche de Camarón</a></h1>
                    <p>Fresco ceviche de camarón en salsa de tomate con limón y cilantro.</p>
                </div>
            </li>
            <li>
                <img src="{{ asset('menu_restaurante/Imagenes/Index/Guaro_grande.png') }}" alt="Aguardiente Rosado del Tolima">
                <div class="texteo">
                    <h3>¡Disfruta y Prueba!</h3>
                    <h1><a href="{{ route('carta') }}">Aguardiente Rosado del Tolima</a></h1>
                    <p>Aguardiente rosado del Tolima, suave y refrescante. 750ml.</p>
                </div>
            </li>
            <li>
                <img src="{{ asset('menu_restaurante/Imagenes/Index/Merengon_grande.png') }}" alt="Merengón de Guanábana">
                <div class="texteo">
                    <h3>Endulza tu paladar</h3>
                    <h1><a href="{{ route('carta') }}">Merengón de Guanábana</a></h1>
                    <p>Merengón de guanábana, crujiente por fuera y suave por dentro.</p>
                </div>
            </li>
            <li>
                <img src="{{ asset('menu_restaurante/Imagenes/Index/chefs_grandre.png') }}" alt="Conoce La Pinta">
                <div class="texteo">
                    <h3>¿Quiénes somos?</h3>
                    <h1><a href="{{ route('conocenos') }}">¡Conoce La <br> Pinta!</a></h1>
                    <p> Conoce como nacio La Pinta</p>
                </div>
            </li>
        </ul>
    </div>

    <section class="tradition">
        <h2>Tradición en cada plato, alegría en cada sorbo</h2>
        <div class="tradition-gallery">
            <div class="tradition-item">
                <img src="{{ asset('menu_restaurante/Imagenes/Index/Ajiaco_mediano.png') }}" alt="Ajiaco">
                <div class="overlay">
                    <h3><a href="{{ route('carta') }}">Ajiaco</a></h3>
                    <p>Ajiaco típico Bogotano con pollo, diferentes papas, arroz, aguacate y alcaparras.</p>
                </div>
            </div>
            <div class="tradition-item">
                <img src="{{ asset('menu_restaurante/Imagenes/Index/cuajada_mediana.png') }}" alt="Cuajada">
                <div class="overlay">
                    <h3><a href="{{ route('carta') }}">Cuajada con Melado</a></h3>
                    <p>Postre tradicional con cuajada y melado de panela.</p>
                </div>
            </div>
            <div class="tradition-item">
                <img src="{{ asset('menu_restaurante/Imagenes/Index/cartagena_medaiana.png') }}" alt="Posta Cartagenera">
                <div class="overlay">
                    <h3><a href="{{ route('carta') }}">Posta Cartagenera</a></h3>
                    <p>Carne de res en salsa negra, típica de Cartagena, acompañada de arroz de coco.</p>
                </div>
            </div>
            <div class="tradition-item">
            <img src="{{ asset('menu_restaurante/Imagenes/Index/Platano_mediana.png') }}" alt="Platano">
            <div class="overlay">
                <h3><a href="{{ route('carta') }}">Plátano con Bocadillo y Queso</a></h3>
                <p>Plátano maduro con bocadillo <br>y queso fresco.</p>
            </div>
        </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('menu_restaurante/Imagenes/LaPintaLogo.png') }}" alt="La Pinta Logo">
                </a>
                <div class="footer-address">
                    <p><strong>Dirección:</strong> Cra 69 #25B – 44 Of. 609,<br>Edificio World Business Port</p>
                    <p><strong>Teléfono:</strong> 601 7034250</p>
                </div>
            </div>
            <div class="footer-right">
                <h2><a href="{{ route('conocenos') }}">Conócenos</a></h2>
                <div class="footer-social">
                    <img src="{{ asset('menu_restaurante/Imagenes/RedesSociales.png') }}" alt="Redes Sociales">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
