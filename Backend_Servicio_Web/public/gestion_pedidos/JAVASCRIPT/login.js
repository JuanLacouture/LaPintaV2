// Función para borrar el placeholder al hacer clic en el campo
function handleFocus(event) {
    event.target.dataset.placeholder = event.target.placeholder;
    event.target.placeholder = '';
}

// Función para restaurar el placeholder si el campo está vacío
function handleBlur(event) {
    if (event.target.value === '') {
        event.target.placeholder = event.target.dataset.placeholder;
    }
}

// Seleccionar los campos de usuario y contraseña
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

// Añadir eventos de focus y blur
usernameInput.addEventListener('focus', handleFocus);
usernameInput.addEventListener('blur', handleBlur);
passwordInput.addEventListener('focus', handleFocus);
passwordInput.addEventListener('blur', handleBlur);

// Función para manejar el login
async function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === '' || password === '') {
        alert('Por favor, ingresa tu usuario y contraseña.');
        return;
    }

    try {
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ username, password })
        });

        if (!response.ok) {
            throw new Error('Error en la solicitud al servidor.');
        }

        const data = await response.json();

        if (data.message === 'Login exitoso') {
            window.location.href = '/admin.html';
        } else {
            alert(data.error || 'Credenciales incorrectas.');
        }
    } catch (error) {
        console.error('Uncaught Error:', error);
        alert('Hubo un problema con el servidor. Intenta de nuevo más tarde.');
    }
}