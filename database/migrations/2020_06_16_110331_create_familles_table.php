<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familles', function (Blueprint $table) {
            $table->id('id');
            $table->text('nom_de_famille');
            $table->text('prenom_parents');
            $table->text('nombre_d_enfants');
            $table->text('email');
            $table->integer('numero_tel');
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
        Schema::dropIfExists('familles');
    }
}
