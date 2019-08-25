<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourismServProdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_serv_prods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourism_dest_id')->unsigned();
            $table->integer('tourism_serv_prod_cat_id')->unsigned();
            $table->string('name', 100);
            $table->integer('price');
            $table->boolean('is_available');
            $table->string('tel')->unique(25);
            $table->string('email')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tourism_dest_id')->references('id')->on('tourism_destinations');
            $table->foreign('tourism_serv_prod_cat_id')->references('id')->on('tourism_serv_prod_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tourism_serv_prods');
    }
}
