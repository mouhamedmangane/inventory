<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiqueUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('boutique_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boutique_id');

            $table->foreign('boutique_id')->references('id')->on('boutiques')->onDelete('restrict');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

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
        Schema::dropIfExists('boutique_users');
        Schema::enableForeignKeyConstraints();

    }
}
