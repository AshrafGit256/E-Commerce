<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();  // Primary key (id)
            $table->unsignedBigInteger('user_id')->nullable();  // Foreign key (user_id), nullable
            $table->string('name', 255)->nullable();  // Name (VARCHAR, 255), nullable
            $table->string('email', 255)->nullable();  // Email (VARCHAR, 255), nullable
            $table->string('phone', 255)->nullable();  // Phone (VARCHAR, 255), nullable
            $table->string('subject', 255)->nullable();  // Subject (VARCHAR, 255), nullable
            $table->text('message')->nullable();  // Message (TEXT), nullable
            $table->timestamps();  // created_at and updated_at (DATETIME), nullable by default

            // Foreign key relationship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Set user_id to null if user is deleted
        });
    }

    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key if the table is being dropped
        });

        Schema::dropIfExists('contact_us'); // Drop the table
    }
}

