<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            // Change 'sku' column type to integer
            $table->integer('sku')->change();
        });
    }

    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            // Revert 'sku' column type back to string
            $table->string('sku')->nullable()->change();
        });
    }
};
