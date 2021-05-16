<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::disableForeignKeyConstraints();
       Schema::create('contact', function (Blueprint $table) {
           $table->id();
           $table->string('nom', 250);
           $table->string('email', 100);
           $table->double('compte', 15, 2);
           $table->string('ncni', 50);
           $table->string('photo', 250);

           $table->unsignedBigInteger('telephone_id_1')->nullable()->unique();
           $table->foreign('telephone_id_1')
           ->references('id')
           ->on('telephones')
           ->onDelete('cascade')
           ->onUpdate('cascade');
           
           $table->unsignedBigInteger('telephone_id_2')->nullable()->unique();
           $table->foreign('telephone_id_2')
           ->references('id')
           ->on('telephones')
           ->onDelete('cascade')
           ->onUpdate('cascade');

           $table->boolean('is_client');
           $table->boolean('is_fournisseur');
           $table->boolean('archiver');

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
       Schema::dropIfExists('clients');
   }
}
