<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Absence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('absence', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('year');
            $table->integer('absence');
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
        Schema::table('absence', function(Blueprint $table) {
          
            $table->dropForeign('absence_eleve_id_foreign');

        });
    }
}
