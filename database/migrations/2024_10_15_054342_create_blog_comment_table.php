<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comment', function (Blueprint $table) {
            $table->id(); // id field (auto-incrementing)
            $table->integer('user_id')->nullable(); // user_id field (nullable integer)
            $table->integer('blog_id')->nullable(); // blog_id field (nullable integer)
            $table->text('comment')->nullable(); // comment field (nullable text)
            $table->dateTime('created_at')->nullable(); // created_at field (nullable datetime)
            $table->dateTime('updated_at')->nullable(); // updated_at field (nullable datetime)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comment');
    }
}
