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
    Schema::create('platos', function (Blueprint $table) {
        $table->id(); // ID automático
        $table->string('nombre'); // Nombre del plato
        $table->decimal('precio', 8, 2); // Precio del plato con dos decimales
        $table->timestamps(); // created_at y updated_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
