<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('postcode');
            $table->string('pref');
            $table->string('city');
            $table->string('street');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_user_address');
    }
}
