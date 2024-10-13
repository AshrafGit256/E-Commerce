<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('image_name', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->timestamps(); // created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('page');
    }
}

