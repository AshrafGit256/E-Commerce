<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title', 255)->nullable(); // Title field
            $table->string('image_name', 255)->nullable(); // Image name field
            $table->string('button_name', 255)->nullable(); // Button name field
            $table->string('button_link', 255)->nullable(); // Button link field
            $table->tinyInteger('is_delete')->default(0); // Is delete field
            $table->tinyInteger('status')->default(0); // Is status field
            $table->timestamps(); // Created at and updated at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider');
    }
}
