<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing unsigned big integer (id)
            $table->string('title', 255)->nullable(); // Title field
            $table->string('slug', 255)->nullable(); // Slug field
            $table->string('meta_title', 255)->nullable(); // Meta Title field
            $table->text('meta_description')->nullable(); // Meta Descriptions field
            $table->string('meta_keywords', 500)->nullable(); // Meta Keywords field
            $table->integer('total_views')->default(0);
            $table->tinyInteger('status')->default(0); // Status field
            $table->unsignedInteger('blog_category_id')->nullable(); // Blog Category ID field
            $table->string('image_name', 255)->nullable(); // Image Name field
            $table->text('short_description')->nullable(); // Short Descriptions field
            $table->longText('description')->nullable(); // Description field
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
        Schema::dropIfExists('blog');
    }
}
