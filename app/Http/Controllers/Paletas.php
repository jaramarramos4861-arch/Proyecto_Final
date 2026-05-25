<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Paletas extends Controller
{
    public function index()
    {
        $productos = Inventario::with('categoria')->get();
        return view('inventario.Paleta-index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('inventario.Paleta-create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        Inventario::create($request->all());
        return redirect()->route('paletas.index')->with('success', 'Producto creado');
    }

    public function show(Inventario $paleta)
    {
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            return redirect('/')->with('error', 'No tienes acceso');
        }
        return view('inventario.Paleta-show', compact('paleta'));
    }

    public function edit(Inventario $paleta)
    {
        $categorias = Categoria::all();
        return view('inventario.Paleta-edit', compact('paleta', 'categorias'));
    }

    public function update(Request $request, Inventario $paleta)
{
    $request->validate([
        'nombre' => 'required',
        'precio' => 'required|numeric',
        'stock' => 'required|numeric',
        'categoria_id' => 'required|exists:categorias,id'
    ]);
       $paleta->update([
        'nombre' => $request->nombre,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'categoria_id' => $request->categoria_id,
        'imagen' => $request->imagen,
        'descripcion' => $request->descripcion
    ]);

    return redirect()->route('paletas.show', $paleta)->with('success', 'Producto actualizado correctamente');
}

    public function destroy(Inventario $paleta)
{
    $paleta->delete();
    return redirect()->route('paletas.index')->with('success', 'Producto eliminado correctamente');
}
}