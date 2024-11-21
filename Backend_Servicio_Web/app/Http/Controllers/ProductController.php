<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Función para mostrar la vista de la carta con todos los productos
    public function showCarta()
    {
        // Obtener todos los productos de la base de datos
        $products = Product::all();

         // Verifica si los productos están siendo recuperados
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No hay productos disponibles'], 404);
        }

        // Retornar la vista 'Carta' y pasarle los productos
        return view('Carta', ['products' => $products]);
    }
}
