<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourismEventRundownsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_event_rundowns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourism_event_id')->unsigned();
            $table->string('name', 100);
            $table->time('time');
            $table->string('presenter', 100);
            $table->text('misc');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tourism_event_id')->references('id')->on('tourism_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tourism_event_rundowns');
    }
}
