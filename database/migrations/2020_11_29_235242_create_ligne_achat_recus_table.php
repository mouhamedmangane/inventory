<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneAchatRecusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('ligne_achat_recus', function (Blueprint $table) {
            $table->id();
            $table->double('prixUnite', 15, 2);
            $table->double('quantiteRecu',15,2);

            $table->unsignedBigInteger('achat_id');
            
            $table->foreign('achat_id')
                ->references('id')
                ->on('achat')
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
        Schema::dropIfExists('ligne_achat_recus');
    }
}
