<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('postTitle');
            $table->mediumText('postText');
            $table->string("slug")->unique();

            $table->unsignedBigInteger("user_id"); //foreign key
            $table->foreign('user_id') //user_id è una foreign key
                ->references('id') //user_id fa riferimento alla colonna id
                ->on('users'); //la colonna id è la medesima presente in users

            /* Metodo corto */
            $table->foreignId('category_id')
                ->nullable()
                ->constrained();

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
        Schema::dropIfExists('posts');
    }
}
