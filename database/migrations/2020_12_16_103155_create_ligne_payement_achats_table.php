<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePayementAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('ligne_payement_achats', function (Blueprint $table) {
            $table->id();
            $table->double('montant', 15, 2);
            $table->double('montantRestant',15,2);

            $table->unsignedBigInteger('achat_id');

            $table->foreign('achat_id')->references('id')->on('achats')->onDelete('cascade');

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
        Schema::dropIfExists('ligne_payement_achats');
        Schema::enableForeignKeyConstraints();
    }
}
