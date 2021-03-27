<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composants', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('paquet_id');
            $table->foreign('paquet_id')->references('id')->on('produits')->onDelete('restrict');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('restrict');

            
            $table->double('quantite', 15, 3);
            $table->string('unite');



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
        Schema::dropIfExists('composants');
        Schema::enableForeignKeyConstraints();
    }
}
