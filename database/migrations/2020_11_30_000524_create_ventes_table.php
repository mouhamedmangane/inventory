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
            $table->boolean('oneSaveComplet')->nullable()->default(true);
            $table->string('notes',100)->nullable();

            $table->unsignedBigInteger('client_id')->nullable()->default(NULL);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');

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
       Schema::dropIfExists('ventes');
       Schema::enableForeignKeyConstraints();
    }
}
