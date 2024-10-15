<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSettingTable extends Migration
{
    public function up()
    {
        Schema::create('home_setting', function (Blueprint $table) {
            $table->id();
            $table->string('trendy_product_title', 255)->nullable();
            $table->string('shop_by_category_title', 255)->nullable();
            $table->string('recent_arrival_title', 255)->nullable();
            $table->string('blog_title', 255)->nullable();
            $table->string('payment_delivery_title', 255)->nullable();
            $table->text('payment_delivery_description')->nullable();
            $table->string('payment_delivery_image', 255)->nullable();
            $table->string('refund_title', 255)->nullable();
            $table->text('refund_description')->nullable();
            $table->string('refund_image', 255)->nullable();
            $table->string('support_title', 255)->nullable();
            $table->text('support_description')->nullable();
            $table->string('support_image', 255)->nullable();
            $table->string('signup_title', 255)->nullable();
            $table->text('signup_description')->nullable();
            $table->string('signup_image', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_setting');
    }
}
