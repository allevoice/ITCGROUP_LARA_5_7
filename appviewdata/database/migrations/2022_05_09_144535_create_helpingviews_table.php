<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpingviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpingviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 250);
            $table->longText('backimghelp')->nullable();
            $table->longText('description', 250);
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
        Schema::dropIfExists('helpingviews');
    }
}
