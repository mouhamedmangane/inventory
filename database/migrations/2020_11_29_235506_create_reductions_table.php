<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('reductions', function (Blueprint $table) {
            $table->id();
            $table->string('reduction_name', 100)->nullable();
            $table->double('pourcentage',2,2)->unsigned()->nullable();
            $table->double('apartir', 15, 2);
            $table->string('unite', 50);
            $table->double('montant', 15, 2)->nullable();
            $table->boolean('etat')->default(true);
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            $table->string('type',50);
            $table->text('description')->nullable()->default('');


            $table->unsignedBigInteger('produit_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();


            $table->foreign('produit_id')
            ->references('id')
            ->on('produits')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('reductions');
    }
}
