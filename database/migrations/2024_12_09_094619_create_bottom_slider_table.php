<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bottom_slider', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->string('sub_title', 255)->nullable(); // Subtitle field
            $table->string('title', 255)->nullable(); // Title field
            $table->string('image_name', 255)->nullable(); // Image name field
            $table->string('button_name', 255)->nullable(); // Button name field
            $table->string('button_link', 255)->nullable(); // Button link field
            $table->timestamps(); // Created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bottom_slider');
    }
};
