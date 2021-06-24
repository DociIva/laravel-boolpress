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
   
            //FK POST (ID DEL POST)
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');


            //FK TAGS (ID DEL TAG)
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');

            
            //$table->timestamps();
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