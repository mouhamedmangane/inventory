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
            $table->string('numero', 100)->unique()->default(NULL);
            $table->text('note')->nullable();
            $table->timestamps();


            $table->unsignedBigInteger('done_by_user')->default(1);//Auth::user()->id) par defaut user connecté
            $table->foreign('done_by_user')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');
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
