<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurcompagniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ourcompagnies', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('backimg')->nullable();
            $table->longText('description');
            $table->longText('link')->nullable();
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
        Schema::dropIfExists('ourcompagnies');
    }
}
