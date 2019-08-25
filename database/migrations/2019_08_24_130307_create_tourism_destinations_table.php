<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourismDestinationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->string('owner', 100);
            $table->integer('tourism_dest_cat_id')->unsigned();
            $table->text('address');
            $table->text('coords');
            $table->string('email')->unique();
            $table->string('tel')->unique(25);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tourism_dest_cat_id')->references('id')->on('tourism_dest_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tourism_destinations');
    }
}
