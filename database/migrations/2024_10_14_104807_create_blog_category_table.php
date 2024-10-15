<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing unsigned big integer (id)
            $table->string('name', 255)->nullable(); // Name field
            $table->string('slug', 255)->nullable(); 
            $table->string('meta_title', 255)->nullable(); // Meta Title field
            $table->text('meta_description')->nullable(); // Meta Descriptions field
            $table->string('meta_keywords', 500)->nullable(); // Meta Keywords field
            $table->tinyInteger('status')->default(0); // Status field
            $table->tinyInteger('is_delete')->default(0); // Is Delete field
            $table->timestamps(); // Creates created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_category');
    }
}
