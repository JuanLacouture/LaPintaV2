<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conoce La Pinta</title>
        <link rel="icon" href="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('menu_restaurante/CSS/Conocenos2.css') }}">
        <link rel="stylesheet" href="{{ asset('menu_restaurante/Header&Footer.css') }}">
        <link rel="stylesheet" href="{{ asset('menu_restaurante/Scrollers.css') }}">
        <script src="{{ asset('menu_restaurante/JAVASCRIPT/Conocenos2.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Tropika&display=swap" rel="stylesheet">
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

    <main class="main">
        <h1>Conócenos</h1>
        <div class="seccion-nosotros">
            <div class="marco-nosotros" onmouseover="showInfo('juanjo')" onmouseleave="resetInfo()">
                <div class="imagen-nosotros">
                    <img src="{{ asset('menu_restaurante/Imagenes/Conocenos2/juanjoConocenos.png') }}" alt="Juanjo">
                </div>
            </div>
    
            <div class="marco-nosotros" onmouseover="showInfo('lacu')" onmouseleave="resetInfo()">
                <div class="imagen-nosotros">
                    <img src="{{ asset('menu_restaurante/Imagenes/Conocenos2/lacuConocenos.png') }}" alt="Lacu">
                </div>
            </div>
    
            <div class="marco-nosotros" onmouseover="showInfo('andres')" onmouseleave="resetInfo()">
                <div class="imagen-nosotros">
                    <img src="{{ asset('menu_restaurante/Imagenes/Conocenos2/andresConocenos.png') }}" alt="Andres">
                </div>
            </div>
        </div>
    
        <div class="seccion-historia">
            <div class="logo-historia" id="info-logo">
                <img src="{{ asset('menu_restaurante/Imagenes/Conocenos/logo.png') }}" alt="La Pinta Logo">
            </div>
            <div class="texto-historia">
                <h2 id="info-title">Historia de La Pinta</h2>
                <h3 id="info-subtitle">Desde 2015</h3>
                <p id="info-description">
                    Andrés, Juan Andrés, y Juan José se conocieron en la universidad, y a pesar de sus diferentes trayectorias, mantuvieron una sólida amistad basada en su amor por Colombia. Andrés, apasionado por la cocina, dedicó diez años a estudiar la gastronomía colombiana, mientras que Juan Andrés se convirtió en un exitoso empresario con una gran fortuna, y Juan José desarrolló su carrera en la administración de empresas. En 2015, decidieron fusionar sus talentos y fundaron La Pinta Colombiana, un restaurante que fusiona la autenticidad de la comida tradicional colombiana con una experiencia de alta calidad. Hoy en día, La Pinta no solo es un referente en la gastronomía colombiana, sino también un lugar popular para disfrutar de fiestas y eventos.
                </p>
            </div>
        </div>

        <div class="seccion-fiesta">
            <div class="fondo-fiesta">
                <h2>¡Vive la Mejor Fiesta Colombiana!</h2>
            </div>
            
            <div class="imagenes-fiesta">
                <img src="{{ asset('menu_restaurante/Imagenes/Conocenos2 copy/badbunny-conocenos.png') }}" alt="Bad Bunny">
                <div class="imagen-container">
                    <img src="{{ asset('menu_restaurante/Imagenes/Conocenos2 copy/imagen2-conocenos.jpg') }}" alt="Fiesta Imagen 2" >
                    <div class="texto-hover">
                        Reserva Ahora Mismo al Chat de WhatsApp: 601 7034250
                    </div>
                </div>
            </div>
            
            <p class="texto-fiesta">
                ¡Descubre la experiencia única que ofrece La Pinta! Nuestro restaurante no solo te deleita con la auténtica comida típica de Colombia, sino que también es el escenario perfecto para tus eventos más especiales.
            </p>
        </div>
        
        
    </main>    
    
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