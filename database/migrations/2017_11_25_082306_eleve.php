<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Eleve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('eleve', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('matricule');
            $table->string('last_name');
            $table->string('first_name');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')
                  ->references('id')
                  ->on('classe')
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
        Schema::table('eleve', function(Blueprint $table) {

          
            $table->dropForeign('eleve_classe_id_foreign');

        });
        Schema::drop('eleve');
    }
}
