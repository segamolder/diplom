<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Widget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('canvas_image');
            $table->integer('bg_width');
            $table->integer('bg_height');
            $table->string('image_url');
            $table->integer('image_height');
            $table->integer('image_width');
            $table->integer('image_x');
            $table->integer('image_y');
            $table->string('text');
            $table->integer('text_x');
            $table->integer('text_y');
            $table->integer('text_width');
            $table->integer('text_height');
            $table->integer('text_size');
            $table->string('text_font');
            $table->string('input_text');
            $table->integer('input_x');
            $table->integer('input_y');
            $table->integer('input_width');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('active');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
