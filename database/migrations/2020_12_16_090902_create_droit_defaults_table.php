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
            $table->boolean('ao')->default(false);
            $table->boolean('do')->default(false);
            $table->boolean('mo')->default(false);
            $table->boolean('ame')->default(false);
            $table->boolean('dme')->default(false);
            $table->boolean('mme')->default(false);
            $table->boolean('open')->default(false);
            $table->string('role_name');
            $table->string('object_name');    
            
            $table->foreign('role_name')->references('role')->on('roles')->onDelete('cascade');
            $table->foreign('object_name')->references('object')->on('ensembles')->onDelete('cascade');
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
    }
}
