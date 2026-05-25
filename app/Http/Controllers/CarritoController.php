<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
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
        
        if ($producto->stock <= 0) {
            return redirect()->back()->with('error', 'Producto agotado');
        }
        
        $carrito = Session::get('carrito', []);
        
        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] < $producto->stock) {
                $carrito[$id]['cantidad']++;
            } else {
                return redirect()->back()->with('error', 'No hay suficiente stock');
            }
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
        
        return redirect()->back()->with('success', $producto->nombre . ' agregado al carrito');
    }

    public function actualizar(Request $request, $id)
    {
        $carrito = Session::get('carrito', []);
        $producto = Inventario::find($id);
        
        if (isset($carrito[$id]) && $producto) {
            $nuevaCantidad = $request->cantidad;
            if ($nuevaCantidad <= $producto->stock && $nuevaCantidad > 0) {
                $carrito[$id]['cantidad'] = $nuevaCantidad;
                Session::put('carrito', $carrito);
                return redirect()->route('carrito.index')->with('success', 'Carrito actualizado');
            } else {
                return redirect()->back()->with('error', 'Cantidad no disponible');
            }
        }
        
        return redirect()->route('carrito.index')->with('error', 'Producto no encontrado');
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
        
        foreach ($carrito as $id => $item) {
            $producto = Inventario::find($id);
            if (!$producto || $producto->stock < $item['cantidad']) {
                return redirect()->route('carrito.index')->with('error', 'Stock insuficiente para ' . $item['nombre']);
            }
        }
        
        foreach ($carrito as $id => $item) {
            $producto = Inventario::find($id);
            $producto->stock -= $item['cantidad'];
            $producto->save();
        }
        
        Session::forget('carrito');
        
        return redirect()->route('productos.index')->with('success', '¡Compra realizada con éxito! Gracias por tu pedido.');
    }
}