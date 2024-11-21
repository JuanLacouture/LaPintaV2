<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('Login');
    }

    // Manejar el proceso de login
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redireccionar al panel de admin
            return redirect()->route('admin');
        }

        // Si falla, redireccionar de vuelta al login con un error
        return back()->withErrors([
            'message' => 'Credenciales incorrectas. Intenta nuevamente.',
        ]);
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}



