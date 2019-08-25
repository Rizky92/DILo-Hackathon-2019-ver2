<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourismEmployeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tourism_dest_id')->unsigned();
            $table->string('nama', 100);
            $table->date('tgl_lahir');
            $table->enum('jk', ['male','female']);
            $table->text('alamat');
            $table->string('tel')->unique();
            $table->string('email')->unique();
            $table->string('jabatan');
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
        Schema::drop('tourism_employees');
    }
}
