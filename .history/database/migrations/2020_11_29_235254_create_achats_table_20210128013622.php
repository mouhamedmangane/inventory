<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->string('numeroAchat', 100);
            $table->double('montantTotal', 15, 2);
            $table->boolean('complet')->nullable()->default(false);
            $table->unsignedBigInteger('client_id')->nullable()->default(NULL);
            $table->unsignedBigInteger('user_id');

            
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
        Schema::dropIfExists('achats');
    }
}
