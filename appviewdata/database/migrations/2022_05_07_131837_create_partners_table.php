<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlepartner', 250);
            $table->string('titleservices', 250);
            $table->longText('servicepartner', 250);
            $table->string('linkpartner')->nullable();
            $table->longText('backimgpartner')->nullable();
            $table->text('imgpartner')->nullable();
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
        Schema::dropIfExists('partners');
    }
}
