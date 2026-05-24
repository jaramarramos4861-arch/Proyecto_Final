<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
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
            'productos' => Inventario::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventario.Paleta-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $Producto = new Inventario();
        $Producto->nombre = $request->nombre;
        $Producto->precio = $request->precio;
        $Producto->stock = $request->stock;
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
            'paleta' => $paleta
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $paleta)
    {
        return view('inventario.Paleta-edit')
        ->with([
            'paleta' => $paleta
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
            'stock' => 'required|numeric'
        ]);

        $Producto->nombre = $request->nombre;
        $Producto->precio = $request->precio;
        $Producto->stock = $request->stock;
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
