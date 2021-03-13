<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneAjustementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_ajustements', function (Blueprint $table) {
            $table->id();
            $table->boolean('ajuste')->default(false);
            $table->double('qteAvant', 15,2)->nullable();
            $table->double('qteReelle', 15, 2)->nullable();
            $table->foreign('vente_id')->references('id')->on('ventes')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_ajustements');
    }
}
