<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('libelle', 100);
            $table->string('unite', 100);
            $table->double('qteStock', 15, 3);
            $table->double('qteSeuil',15,3);
            $table->double('prix', 10, 2);
            $table->double('prixAchat', 10, 2); 
            $table->unsignedBigInteger('groupe_produit_id')->nullable();

            $table->foreign('groupe_produit_id')
            ->references('id')
            ->on('groupe_produits')
            ->onDelete('restrict')
            ->onUpdate('restrict');         
            
            
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
        Schema::dropIfExists('produits');
    }
}
