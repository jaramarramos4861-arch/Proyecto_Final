<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Categoria;
use Illuminate\Http\Request;

class Paletas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventario.Paleta-index')
        ->with([
            'productos' => Inventario::with('categoria')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        
        return view('inventario.Paleta-create')
        ->with([
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $Producto = new Inventario();
        $Producto->nombre = $request->nombre;
        $Producto->precio = $request->precio;
        $Producto->stock = $request->stock;
        $Producto->categoria_id = $request->categoria_id;
        $Producto->save();

        return redirect()->route('paletas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $paleta)
    {
        return view('inventario.Paleta-show')
        ->with([
<<<<<<< HEAD
            'paleta' => $paleta->load('categoria')
=======
            'paleta' => $paleta
>>>>>>> upstream/main
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $paleta)
    {
<<<<<<< HEAD
        $categorias = Categoria::all();
        
        return view('inventario.Paleta-edit')
        ->with([
            'paleta' => $paleta,
            'categorias' => $categorias
=======
        return view('inventario.Paleta-edit')
        ->with([
            'paleta' => $paleta
>>>>>>> upstream/main
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $Producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
<<<<<<< HEAD
            'stock' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
=======
            'stock' => 'required|numeric'
>>>>>>> upstream/main
        ]);

        $Producto->nombre = $request->nombre;
        $Producto->precio = $request->precio;
        $Producto->stock = $request->stock;
<<<<<<< HEAD
        $Producto->categoria_id = $request->categoria_id;
=======
>>>>>>> upstream/main
        $Producto->save();

        return redirect()->route('paletas.show', $Producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $paleta)
    {
        $paleta->delete();
        return redirect()->route('paletas.index');
    }
}