<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_setting', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('website_name', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('logo', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('favicon', 255)->nullable(); // VARCHAR, 255, NULL
            $table->text('footer_description')->nullable(); // TEXT, NULL
            $table->string('footer_payment_icon', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('address', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('working_hours', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('phone')->nullable(); // VARCHAR, 255, NULL
            $table->string('phone_two', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('submit_email', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('email', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('email_two', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('facebook_link', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('twitter_link', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('instagram_link', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('youtube_link', 255)->nullable(); // VARCHAR, 255, NULL
            $table->string('pinterest_link', 255)->nullable(); // VARCHAR, 255, NULL
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
        Schema::dropIfExists('system_setting');
    }
}
