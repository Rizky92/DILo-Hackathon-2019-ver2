<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourismEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->integer('tourism_event_cat_id')->unsigned();
            $table->string('event_holder_name', 100);
            $table->string('event_holder_tel')->unique(25);
            $table->string('event_holder_email')->unique();
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('quota');
            $table->integer('tourism_dest_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tourism_event_cat_id')->references('id')->on('tourism_event_categories');
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
        Schema::drop('tourism_events');
    }
}
