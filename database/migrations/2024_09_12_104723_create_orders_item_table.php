<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_item', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable(); // Foreign key to the orders table
            $table->integer('product_id')->unsigned()->nullable(); // Foreign key to the products table
            $table->integer('quantity')->default(0); // Quantity of the product
            $table->string('price', 25)->default('0')->nullable();
            $table->string('color_name')->nullable(); // Color of the product
            $table->string('size_name')->nullable(); // Size of the product
            $table->string('size_amount')->default(0); // Quantity of the product
            $table->string('total_price', 25)->default('0');
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints (optional)
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_item');
    }
}
