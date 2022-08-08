<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headerpages', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 200);
            $table->longText('description')->nullable();
            $table->char('page');
            $table->string('status')->nullable();
            $table->string('langues')->nullable();
            $table->string('level')->nullable();
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
        Schema::dropIfExists('headerpages');
    }
}
