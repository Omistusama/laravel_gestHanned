<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotis', function (Blueprint $table) {
            $table->id();
            $table->string('nom_de_famille');
            $table->string('nombre_enfants');
            $table->string('mois');
            $table->string('type');
            $table->string('a_payer');
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
        Schema::dropIfExists('cotis');
    }
}
