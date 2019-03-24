<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bulletin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('bulletin', function (Blueprint $table) {
            $table->increments('id');
            $table->date('year');
            $table->string('decision');
            $table->string('book');
            $table->integer('eleve_id')->unsigned();
            $table->foreign('eleve_id')
                  ->references('id')
                  ->on('eleve')
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
        Schema::table('bulletin', function(Blueprint $table) {
          
            $table->dropForeign('bulletin_eleve_id_foreign');

        });
    }
}
