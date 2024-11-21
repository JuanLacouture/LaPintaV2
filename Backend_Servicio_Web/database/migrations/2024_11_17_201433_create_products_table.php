<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Ejecuta la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID autoincremental como clave primaria
            $table->string('category'); // Categoría del producto
            $table->string('name'); // Nombre del producto
            $table->text('description'); // Descripción del producto
            $table->decimal('price', 10); 
            $table->string('image'); // Nombre de la imagen (.png)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
