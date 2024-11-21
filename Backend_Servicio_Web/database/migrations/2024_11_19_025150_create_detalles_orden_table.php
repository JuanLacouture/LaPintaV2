<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesOrdenTable extends Migration
{
    public function up()
    {
        Schema::create('detalles_orden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orden_id'); // Mantener como bigint porque orden_id puede ser más grande
            $table->unsignedInteger('product_id'); // Cambiar de unsignedBigInteger a unsignedInteger
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamps();
        
            // Claves foráneas
            $table->foreign('orden_id')->references('id')->on('ordenes')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });        
        
    }

    public function down()
    {
        Schema::dropIfExists('detalles_orden');
    }
}
