<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('fingerprint_id'); // Referencia a la tabla fingerprints
        $table->string('nombre');
        $table->timestamp('fecha_entrada')->nullable();
        $table->timestamp('fecha_salida')->nullable();

        $table->text('user_notes')->nullable(); // Notas del usuario
        $table->text('admin_notes')->nullable(); // Notas del administrador
        $table->timestamps();

        $table->foreign('fingerprint_id')->references('id')->on('fingerprints');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
