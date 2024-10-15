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
        Schema::create('notification', function (Blueprint $table) {
            $table->id(); // Equivalent to $table->bigIncrements('id')
            $table->integer('user_id')->nullable();
            $table->string('url', 255)->nullable();
            $table->string('message', 255)->nullable();
            $table->tinyInteger('is_read')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
