<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre'); // Nombre del cliente
            $table->string('telefono'); // Teléfono del cliente
            $table->string('email'); // Email del cliente
            $table->text('direccion'); // Dirección del cliente
            $table->decimal('total', 10, 2); // Agregar columna para el total
            $table->enum('estado', ['Pendiente', 'Atendido'])->default('Pendiente'); // Estado de la orden
            $table->timestamps(); // Timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
