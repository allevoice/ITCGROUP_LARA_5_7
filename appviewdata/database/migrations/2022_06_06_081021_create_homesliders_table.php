<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeslidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homesliders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 200);
            $table->longText('description')->nullable();
            $table->string('link')->nullable();
            $table->longText('logoview')->nullable();
            $table->longText('backimgview')->nullable();
            $table->string('status')->nullable();
            $table->string('langues')->nullable();
            $table->string('level')->nullable();
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
        Schema::dropIfExists('homesliders');
    }
}
