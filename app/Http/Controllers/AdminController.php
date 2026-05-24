<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $totalProductos = Inventario::count();
        $totalClientes = User::where('rol', 'cliente')->count();
        $stockBajo = Inventario::where('stock', '<', 10)->count();
        
        return view('admin.dashboard', compact('totalProductos', 'totalClientes', 'stockBajo'));
    }

    public function usuarios()
    {
        $usuarios = User::all();
        return view('admin.usuarios', compact('usuarios'));
    }
}