<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroitDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('droit_defaults', function (Blueprint $table) {
            $table->id();
            $table->boolean('c')->default(false);
            $table->boolean('r')->default(false);
            $table->boolean('u')->default(false);
            $table->boolean('d')->default(false);
            $table->boolean('co')->default(false);
            $table->boolean('ro')->default(false);
            $table->boolean('uo')->default(false);
            $table->boolean('do')->default(false);
            $table->string('role_id');
            $table->unsignedBigInteger('objet_id');
           
        
            $table->foreign('role_id')->references('role')->on('roles')->onDelete('cascade');
            $table->foreign('objet_id')->references('id')->on('objets')->onDelete('cascade');

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
        Schema::dropIfExists('droit_defaults');
        Schema::enableForeignKeyConstraints();
    }
}
