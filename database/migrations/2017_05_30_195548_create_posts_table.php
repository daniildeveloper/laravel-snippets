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
            $table->increments('id');
            $table->integer("author_id")->default(1);
            $table->text("content");
            $table->string("title");
            $table->string("status")->default("publish");
            $table->string("slug");
            $table->integer("parent_id")->nullable();
            $table->string("link")->unique();
            $table->string("type")->default("post");
            $table->string("mime_type")->nullable();
            $table->string("featured_media");
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
