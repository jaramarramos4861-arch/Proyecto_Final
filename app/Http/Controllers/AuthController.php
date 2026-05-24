<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLogin()
    {
        return view('welcome');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if ($user->rol === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/productos');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ])->onlyInput('email');
    }

    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('welcome');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:500',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
            'rol' => 'cliente'
        ]);

        Auth::login($user);

        return redirect('/productos');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}