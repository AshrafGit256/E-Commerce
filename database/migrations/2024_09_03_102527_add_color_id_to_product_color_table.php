<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColorIdToProductColorTable extends Migration
{
    public function up()
    {
        Schema::table('product_color', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->after('product_id'); // Assuming 'id' in 'colors' is 'unsignedBigInteger'
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_color', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropColumn('color_id');
        });
    }
}
