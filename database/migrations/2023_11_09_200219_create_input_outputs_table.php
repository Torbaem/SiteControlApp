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
        Schema::create('input_outputs', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->date('fecha');
          $table->Time('horaentrada');
          $table->Time('horasalida');
          $table->string('cargo');
          $table->timestamps();

          $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_outputs');
    }
};
