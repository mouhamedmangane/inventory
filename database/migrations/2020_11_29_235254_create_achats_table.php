<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->string('numeroAchat', 100);
            $table->double('montantTotal', 15, 2);
            $table->boolean('complet')->nullable()->default(false);
            $table->unsignedBigInteger('fournisseur_id')->nullable()->default(NULL);

            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('restrict');

            $table->unsignedBigInteger('done_by_user')->default(1);//Auth::user()->id) par defaut user connecté
            $table->foreign('done_by_user')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('achats');
    }
}
