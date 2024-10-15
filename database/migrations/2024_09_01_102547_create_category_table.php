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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable(); // Added slug field
            $table->string('image_name', 255)->nullable(); // Added image_name field
            $table->string('button_name', 255)->nullable(); // Added button_name field
            $table->tinyInteger('is_home')->default(0); // Added is_home field
            $table->tinyInteger('is_menu')->default(0)->nullable(); // Added is_menu field
            $table->unsignedBigInteger('created_by');
            $table->boolean('is_delete')->default(0);
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
