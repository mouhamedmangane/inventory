<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::disableForeignKeyConstraints();
       
        Schema::create('objets', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom');
            $table->timestamps();
        });
    }

    public function definition()
    {
        return [
            'nom' => $this->faker->name,
        ];
    }

    /**
     * Reverse the migrations.
     *  
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objets');
        Schema::enableForeignKeyConstraints();
    }
}
