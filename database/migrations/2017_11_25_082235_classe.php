<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Classe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // to create a class
         Schema::create('classe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->string('module');
            $table->string('category');
            $table->date('start_of_module');
            $table->integer('amount');
            $table->date('year');
            
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // to delete a class

        Schema::drop('classe');
    }
}
