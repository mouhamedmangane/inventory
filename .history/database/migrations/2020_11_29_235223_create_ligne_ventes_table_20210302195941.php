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
        Schema::disableForeignKeyConstraints();
        Schema::create('ligne_ventes', function (Blueprint $table) {
            $table->id();
            $table->double('prixUnite', 15, 2);
            $table->double('quantiteDemande',15,2)->nullable();
            $table->double('quantiteRecu',15,2)->nullable();

            $table->unsignedBigInteger('vente_id');
            
            $table->foreign('vente_id')
                ->references('id')
                ->on('ventes')
                ->onDelete('restrict')
                ->onUpdate('restrict');
                
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')
            ->references('id')
            ->on('produit')
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
        Schema::dropIfExists('ligne_ventes');
    }
}
