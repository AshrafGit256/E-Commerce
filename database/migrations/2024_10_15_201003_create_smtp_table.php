<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp', function (Blueprint $table) {
            $table->id(); // Primary key (id)
            $table->string('name', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_mailer', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_host', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_port', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_username', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_password', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_encryption', 255)->nullable(); // VARCHAR(255), NULL
            $table->string('mail_from_address', 255)->nullable(); // VARCHAR(255), NULL
            $table->timestamp('created_at')->nullable(); // DATETIME, NULL
            $table->timestamp('updated_at')->nullable(); // DATETIME, NULL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smtp');
    }
}
