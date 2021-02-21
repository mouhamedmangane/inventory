<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePayementVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_payement_ventes', function (Blueprint $table) {
            $table->id();
            $table->double('montant', 15, 2);
            $table->double('montantRestant',15,2);

            $table->unsignedBigInteger('vente_id');
        
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
        Schema::dropIfExists('ligne_payement_ventes');
    }
}
