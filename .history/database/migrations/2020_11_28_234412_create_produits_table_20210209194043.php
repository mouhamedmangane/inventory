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
            $table->string('imageUrl')->nullable();
            $table->string('img', 500)->nullable()->default('0.png');//0.png image par défaut des produits
            $table->string('libelle', 100);
            $table->string('unite', 100)->default('Unité | u');
            $table->string('rI', 100)->nullable();
            $table->string('code', 128);
            $table->string('type', 128)->default("consommable");
            $table->double('qteStock', 15, 3)->nullable();;
            $table->double('qteSeuil',15,3)->nullable();;
            $table->double('prixVenteMin', 10, 2)->unsigned()->nullable();
            $table->double('prixAchatMin', 10, 2)->unsigned()->nullable(); 
            $table->double('prixVenteMax', 10, 2)->unsigned()->nullable();
            $table->double('prixAchatMax', 10, 2)->unsigned()->nullable(); 
            $table->boolean('archived')->default(false);
            $table->boolean('vendable')->default(true);
            $table->boolean('achetable')->default(true);
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
