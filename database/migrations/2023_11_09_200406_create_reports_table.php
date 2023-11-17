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
          $table->string('name');
          $table->date('fecha');
          $table->Time('horaentrada');
          $table->Time('horasalida');
          $table->string('cargo');
          $table->string('description');
          $table->string('adminnote');

          $table->foreignId('input_output_id')->constrained('input_outputs');
          $table->timestamps();
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
