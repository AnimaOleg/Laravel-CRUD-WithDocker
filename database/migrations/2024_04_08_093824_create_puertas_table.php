<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('puertas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('status', ['Jardin', 'Rellano', 'Garaje', 'Castillo'])->nullable();
            $table->enum('material', ['Madera', 'Acero'])->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('precio')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puertas');
    }
};
