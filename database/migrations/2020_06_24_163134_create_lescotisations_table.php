<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLescotisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lescotisations', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('id_parents');
            $table->string('nombre_enfants');
            $table->string('benevolat');
            $table->string('mois');
            $table->string('type_de_cotisation');
            $table->string('type_de_paiement');
            $table->string('montant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lescotisations');
    }
}
