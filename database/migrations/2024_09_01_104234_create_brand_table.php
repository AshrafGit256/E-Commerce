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
        Schema::create('brand', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('created_by');
            $table->boolean('is_delete')->default(0);
            $table->timestamps();
    
            $table->foreign('created_by')->references('id')->on('users');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('brand');
    }
    
};
