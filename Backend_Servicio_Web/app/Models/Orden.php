<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    // Indica explícitamente el nombre de la tabla
    protected $table = 'ordenes';

    // Campos que se pueden llenar
    protected $fillable = ['nombre', 'telefono', 'email', 'direccion', 'total'];

    // Relación con productos
    public function productos()
    {
        return $this->belongsToMany(Product::class, 'detalles_orden')
            ->withPivot('cantidad', 'precio_unitario')
            ->withTimestamps();
    }
}
