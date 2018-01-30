<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Account extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // to create an account 
         Schema::create('account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment');
            $table->string('amount_paid');
            $table->string('fees'); // the tuitions fees of the student
            $table->integer('trimestre');
            $table->date('year');
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
       

        Schema::table('account', function(Blueprint $table) {

          
            $table->dropForeign('account_eleve_id_foreign');

        });
        Schema::drop('account');
    }
}
