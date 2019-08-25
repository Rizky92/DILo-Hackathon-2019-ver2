<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_user_id')->unsigned();
            $table->integer('tourism_serv_prod_id')->unsigned();
            $table->time('time');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_user_id')->references('id')->on('client_users');
            $table->foreign('tourism_serv_prod_id')->references('id')->on('tourism_serv_prods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client_transactions');
    }
}
