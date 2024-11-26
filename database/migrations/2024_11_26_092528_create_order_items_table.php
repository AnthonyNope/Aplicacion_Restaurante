<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Relación con la tabla orders
            $table->foreignId('plato_id')->constrained('platos')->onDelete('cascade'); // Relación con la tabla platos
            $table->integer('quantity'); // Cantidad del plato
            $table->decimal('price', 10, 2); // Precio del plato
            $table->timestamps(); // created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};