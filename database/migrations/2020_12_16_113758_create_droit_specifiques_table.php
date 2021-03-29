<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroitSpecifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('droit_specifiques', function (Blueprint $table) {
            $table->id();
            $table->boolean('c')->default(false);
            $table->boolean('r')->default(false);
            $table->boolean('u')->default(false);
            $table->boolean('d')->default(false);
            $table->boolean('co')->default(false);
            $table->boolean('ro')->default(false);
            $table->boolean('uo')->default(false);
            $table->boolean('do')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('objet_id');    
            
            $table->foreign('objet_id')->references('id')->on('objets')->onDelete('cascade');            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('droit_specifiques');
        Schema::enableForeignKeyConstraints();
    }
}
