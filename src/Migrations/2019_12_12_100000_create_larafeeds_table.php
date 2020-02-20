<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaraFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('larafeeds', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->text('message');
            $table->string('screenshot', 100)->nullable();
            $table->string('ip', 100)->nullable();
            $table->string('uri', 100)->nullable();
            $table->string('browser', 100)->nullable();
            $table->string('os', 100)->nullable();
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
        Schema::dropIfExists('larafeeds');
    }
}
