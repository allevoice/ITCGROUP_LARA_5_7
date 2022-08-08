<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisors', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('imgprofile')->nullable();
            $table->longText('title');
            $table->longText('post');
            $table->longText('spost')->nullable();

            $table->longText('facelink')->nullable();
            $table->longText('facest')->nullable();

            $table->longText('inlink')->nullable();
            $table->longText('inst')->nullable();

            $table->longText('goopluslink')->nullable();
            $table->longText('gooplusst')->nullable();

            $table->longText('tweetlink')->nullable();
            $table->longText('tweetst')->nullable();

            $table->string('status')->nullable();
            $table->string('langues')->nullable();
            $table->string('iduser')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('advisors');
    }
}
