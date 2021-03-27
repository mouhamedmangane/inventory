<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleObjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_objets', function (Blueprint $table) {
            $table->id();

            $table->boolean('ao')->default(false);
            $table->boolean('do')->default(false);
            $table->boolean('mo')->default(false);
            $table->boolean('ame')->default(false);
            $table->boolean('dme')->default(false);
            $table->boolean('mme')->default(false);
            $table->boolean('open')->default(false);

            $table->unsignedBigInteger('role_id');
            $table->string('objet_id');


            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('role_objets');
    }
}
