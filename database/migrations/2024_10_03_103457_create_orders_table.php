<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('country');
            $table->string('address_one');
            $table->string('address_two')->nullable();
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->text('note')->nullable();
            $table->string('discount_code')->nullable();
            $table->decimal('discount_amount', 8, 2)->default(0);
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->decimal('shipping_amount', 8, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('payment_method')->nullable();
            
            // Status fields with comments
            $table->tinyInteger('status')->default(0)->comment('0: active, 1: inactive');
            $table->tinyInteger('is_delete')->default(0)->comment('0: not deleted, 1: deleted');
            $table->tinyInteger('is_payment')->default(0)->comment('0: not paid, 1: paid');
            
            $table->text('payment_data')->nullable();
            
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

