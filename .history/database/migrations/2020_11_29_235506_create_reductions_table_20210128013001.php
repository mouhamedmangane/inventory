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
            $table->integer('pourcentage')->unsigned()->nullable();
            $table->double('apartir', 15, 2);
            $table->string('unite', 50);
            $table->double('montant', 15, 2)->nullable();
                
            $table->dateTime('expiration_date')->nullable();

            $table->unsignedBigInteger('produit_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();


            $table->foreign('produit_id')
            ->references('id')
            ->on('produits')
            ->onDelete('cascade')
            ->onUpdate('cascade');                  
            
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
