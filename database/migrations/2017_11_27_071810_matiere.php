<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matiere extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intitule');
            $table->integer('note');
            $table->integer('note1');
            $table->integer('bulletin_id')->unsigned();
            $table->foreign('bulletin_id')
                  ->references('id')
                  ->on('bulletin')
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
         Schema::table('matiere', function(Blueprint $table) {
          
            $table->dropForeign('matiere_bulletin_id_foreign');

        });
    }
}
