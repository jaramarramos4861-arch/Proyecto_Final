<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carrito = Session::get('carrito', []);
        $total = 0;
        
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        
        return view('carrito.index', compact('carrito', 'total'));
    }

    public function agregar(Request $request, $id)
    {
        $producto = Inventario::find($id);
        
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
        
        $carrito = Session::get('carrito', []);
        
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
                'imagen' => $producto->imagen,
                'stock' => $producto->stock
            ];
        }
        
        Session::put('carrito', $carrito);
        
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function actualizar(Request $request, $id)
    {
        $carrito = Session::get('carrito', []);
        
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->cantidad;
            Session::put('carrito', $carrito);
        }
        
        return redirect()->route('carrito.index')->with('success', 'Carrito actualizado');
    }

    public function eliminar($id)
    {
        $carrito = Session::get('carrito', []);
        
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            Session::put('carrito', $carrito);
        }
        
        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

    public function comprar(Request $request)
    {
        $carrito = Session::get('carrito', []);
        
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío');
        }
        
        Session::forget('carrito');
        
        return redirect()->route('productos.index')->with('success', '¡Compra realizada con éxito! Gracias por tu pedido.');
    }
}