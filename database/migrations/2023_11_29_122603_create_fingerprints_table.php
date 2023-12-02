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
      Schema::create('fingerprints', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Referencia al usuario asociado
        // Otros campos relacionados con la huella dactilar
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fingerprints');
    }
};
