<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientHistoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_user_id')->unsigned();
            $table->integer('tourism_dest_id')->unsigned();
            $table->time('time');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_user_id')->references('id')->on('client_users');
            $table->foreign('tourism_dest_id')->references('id')->on('tourism_destinations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client_histories');
    }
}
