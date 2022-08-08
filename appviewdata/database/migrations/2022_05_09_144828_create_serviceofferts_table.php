<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceoffertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceofferts', function (Blueprint $table) {
            $table->increments('id');
            $table->char('codeservice', 200)->unique();
            $table->char('title', 200);
            $table->char('titleinfo', 250);
            $table->longText('description')->nullable();
            $table->longText('blueicone')->nullable();
            $table->longText('whiteicone')->nullable();
            $table->longText('img1')->nullable();
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
        Schema::dropIfExists('serviceofferts');
    }
}
