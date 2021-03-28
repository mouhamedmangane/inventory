<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Boolean;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->string('numeroVente', 100);
            $table->double('montantTotal', 15, 2);
            $table->boolean('complet')->nullable()->default(false);
            $table->boolean('livraisonComplet')->nullable()->default(false);
            $table->unsignedBigInteger('client_id')->nullable()->default(NULL);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');
            


           
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
       Schema::dropIfExists('ventes');
       Schema::enableForeignKeyConstraints();
    }
}