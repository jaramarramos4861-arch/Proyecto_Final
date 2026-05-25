<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Verificar si es admin
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            return redirect('/')->with('error', 'No tienes acceso');
        }
        
        $totalProductos = Inventario::count();
        $totalClientes = User::where('rol', 'cliente')->count();
        $stockBajo = Inventario::where('stock', '<', 10)->count();
        
        return view('admin.dashboard', compact('totalProductos', 'totalClientes', 'stockBajo'));
    }

    public function usuarios()
    {
        // Verificar si es admin
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            return redirect('/')->with('error', 'No tienes acceso');
        }
        
        $usuarios = User::all();
        return view('admin.usuarios', compact('usuarios'));
    }
}