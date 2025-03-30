<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('in_stock')->default(0); // Quantity currently in stock
            $table->integer('out_of_stock')->default(0); // Quantity sold out
        });
    }

    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('in_stock');
            $table->dropColumn('out_of_stock');
        });
    }
};
