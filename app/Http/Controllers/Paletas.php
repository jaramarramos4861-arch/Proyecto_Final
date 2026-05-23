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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
