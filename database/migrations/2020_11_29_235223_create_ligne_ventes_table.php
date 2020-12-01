<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_ventes', function (Blueprint $table) {
            $table->id();
            $table->double('prixUnité', 15, 2);
            $table->double('quantité',15,2);

            $table->unsignedBigInteger('vente_id');
            $table->unsignedBigInteger('produit_id');
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
        Schema::dropIfExists('ligne_ventes');
    }
}
