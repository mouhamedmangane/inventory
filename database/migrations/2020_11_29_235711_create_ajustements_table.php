<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('ajustements', function (Blueprint $table) {
            $table->id();
            $table->double('quantiteInitial', 15, 2);
            $table->double('quantiteFinal', 15, 2);
            $table->timestamps();

            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')
            ->onDelete('restrict')->onUpdate('restrict');


            });
        }
        
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('ajustements');
        }
    }
