<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingChargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_charge', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->tinyInteger('status')
                  ->default(0)
                  ->comment('0: active, 1: inactive ');
            $table->tinyInteger('is_delete')
                  ->default(0)
                  ->comment('0: not deleted, 1: deleted');
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_code');
    }
}
