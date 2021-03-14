<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneVenteRecusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_vente_recus', function (Blueprint $table) {
            $table->id();
            $table->double('qteLivre',15,2);
            $table->double('qteRestant',15,2);
            $table->unsignedBigInteger('ligne_vente_id')->;
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
        Schema::dropIfExists('ligne_vente_recus');
    }
}
