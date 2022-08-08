<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowareyousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('howareyous', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 250);
            $table->longText('backimg')->nullable();
            $table->longText('description');
            $table->longText('link');
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
        Schema::dropIfExists('howareyous');
    }
}
