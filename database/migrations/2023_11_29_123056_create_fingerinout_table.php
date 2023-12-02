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
      Schema::create('fingerinout', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('fingerprint_id'); // Referencia al registro de huella dactilar
        $table->enum('action', ['entrada', 'salida']); // Campo para la acción (entrada o salida)
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
        Schema::dropIfExists('fingerinout');
    }
};
