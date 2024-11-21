<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>La Pinta Login</title>
    <link rel="icon" href="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Questrial&family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gestion_pedidos/CSS/login.css') }}">
</head>
<body>
    <a href="{{ route('home') }}" class="back-btn">Atrás</a>
    <div class="login-container">
        <div class="login-header">
            <img src="{{ asset('menu_restaurante/Imagenes/Home/LaPintaLogo.png') }}" alt="Logo Restaurante" class="logo">
            <h1>Bienvenido a La Pinta</h1>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="login-btn" onclick="redirectToAdmin()">Ingresar</button>
        </form>
    </div>
    <script src="{{ asset('gestion_pedidos/JAVASCRIPT/login.js') }}" defer></script></body>
</html>
