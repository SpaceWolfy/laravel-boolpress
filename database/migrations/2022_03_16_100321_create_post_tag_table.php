<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id') //post_id è una foreign key
                ->references('id') //post_id fa riferimento alla colonna id
                ->on('posts'); //la colonna id è la medesima presente nella tabella posts su db

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id') //tag_id è una foreign key
                ->references('id') //tag_id fa riferimento alla colonna id
                ->on('tags'); //la colonna id è la medesima presente nella tabella tags su db

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
        Schema::dropIfExists('post_tag');
    }
}
