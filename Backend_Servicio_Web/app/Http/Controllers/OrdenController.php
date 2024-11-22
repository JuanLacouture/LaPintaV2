<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function guardarOrden(Request $request)
{
    try {
        // Validar los datos del JSON
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'direccion' => 'required|string|max:255',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:products,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0'
        ]);

        // Crear la orden
        $orden = Orden::create([
            'nombre' => $validated['nombre'],
            'telefono' => $validated['telefono'],
            'email' => $validated['email'],
            'direccion' => $validated['direccion'],
            'total' => $validated['total']
        ]);

        // Asociar los productos a la orden
        foreach ($validated['productos'] as $producto) {
            $orden->productos()->attach($producto['id'], [
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario']
            ]);
        }

        return response()->json(['message' => 'Orden guardada correctamente.'], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



    public function admin(Request $request)
{
    $query = Orden::with('productos');

    // Formatear productos con cantidad y nombre en una sola cadena
    foreach ($query as $orden) {
        $orden->productos_formateados = $orden->productos->map(function ($producto) {
            return "{$producto->pivot->cantidad} x {$producto->nombre}";
        })->toArray();
    }

    // Filtro por estado
    if ($request->filled('estado') && $request->estado !== 'Todos') {
        $query->where('estado', $request->estado);
    }

    // Filtro por nombre
    if ($request->filled('nombre')) {
        $query->where('nombre', 'LIKE', '%' . $request->nombre . '%');
    }

    // Obtener los resultados
    $ordenes = $query->get();

    return view('admin', compact('ordenes'));
}


    public function cambiarEstado(Request $request, $id)
    {
        try {
            // Busca la orden
            $orden = Orden::findOrFail($id);

            // Valida el estado recibido
            $request->validate([
                'estado' => 'required|in:Pendiente,Atendido', // Solo permite estos valores
            ]);

            // Actualiza el estado
            $orden->estado = $request->input('estado');
            $orden->save();

            return response()->json(['success' => true], 200); // Respuesta exitosa
        } catch (\Exception $e) {
            // Registra el error en los logs
            Log::error('Error al actualizar el estado:', [
                'id' => $id,
                'estado' => $request->input('estado', 'no enviado'),
                'error' => $e->getMessage(),
            ]);

            return response()->json(['error' => 'No se pudo actualizar el estado'], 500); // Respuesta de error
        }
    }

    public function listarOrdenes()
    {
        $ordenes = Orden::with('productos')->get();

        return response()->json($ordenes);
    }

    public function eliminarOrden($id)
    {
        $orden = Orden::findOrFail($id);
        $orden->delete();

        return response()->json(['success' => true]);
    }
}
