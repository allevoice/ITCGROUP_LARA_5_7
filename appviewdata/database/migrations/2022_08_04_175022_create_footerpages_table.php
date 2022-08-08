<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footerpages', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('adresse')->nullable();
            $table->longText('address_2')->nullable();
            $table->longText('town')->nullable();
            $table->longText('states')->nullable();
            $table->longText('zipcode')->nullable();
            $table->longText('email')->nullable();
            $table->longText('email_2')->nullable();
            $table->longText('phone_1')->nullable();
            $table->longText('phone_2')->nullable();
            $table->longText('phone_3')->nullable();
            $table->longText('maplink')->nullable();

            $table->longText('facelink')->nullable();
            $table->longText('facest')->nullable();

            $table->longText('inlink')->nullable();
            $table->longText('inst')->nullable();

            $table->longText('instalink')->nullable();
            $table->longText('instast')->nullable();

            $table->longText('goopluslink')->nullable();
            $table->longText('gooplusst')->nullable();

            $table->longText('tweetlink')->nullable();
            $table->longText('tweetst')->nullable();

            $table->string('status')->nullable();
            $table->string('langues')->nullable();
            $table->string('iduser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footerpages');
    }
}
