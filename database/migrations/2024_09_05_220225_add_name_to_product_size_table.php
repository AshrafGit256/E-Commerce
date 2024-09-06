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
        Schema::table('product_size', function (Blueprint $table) {
            $table->string('name')->after('id'); // You can adjust the 'after' position as needed
        });
    }

    public function down()
    {
        Schema::table('product_size', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

};
