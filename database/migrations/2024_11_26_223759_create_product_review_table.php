<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_review', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('product_id')->nullable(); // Foreign key to products table
            $table->unsignedBigInteger('order_id')->nullable();   // Foreign key to orders table
            $table->unsignedBigInteger('user_id')->nullable();    // Foreign key to users table
            $table->integer('rating')->default(0);                // Rating with default value 0
            $table->text('review')->nullable();                   // Review text, nullable
            $table->timestamps();                                // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_review');
    }
}
