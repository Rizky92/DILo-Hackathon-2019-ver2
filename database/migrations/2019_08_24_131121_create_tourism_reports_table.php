<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourismReportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourism_dest_id')->unsigned();
            $table->integer('target');
            $table->integer('num_of_res');
            $table->integer('num_of_visits');
            $table->integer('income');
            $table->integer('costs');
            $table->integer('profit');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('tourism_reports');
    }
}
