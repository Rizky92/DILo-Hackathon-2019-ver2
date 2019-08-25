<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->date('tgl_lahir');
            $table->enum('jk', ['male','female']);
            $table->text('alamat');
            $table->string('tel')->unique();
            $table->string('email')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('email')->references('email')->on('client_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client_profiles');
    }
}
