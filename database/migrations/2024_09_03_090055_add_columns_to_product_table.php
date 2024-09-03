<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductTable extends Migration
{
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            // Add new columns
            $table->unsignedBigInteger('sub_category_id')->nullable()->after('category_id');
            $table->unsignedBigInteger('brand_id')->nullable()->after('sub_category_id');
            $table->decimal('old_price', 8, 2)->nullable()->after('brand_id');
            $table->text('short_description')->nullable()->after('old_price');
            $table->text('additional_information')->nullable()->after('short_description');
            $table->text('shipping_returns')->nullable()->after('additional_information');
            
            // Optionally, add foreign key constraints if needed
            // $table->foreign('sub_category_id')->references('id')->on('sub_category')->onDelete('set null');
            // $table->foreign('brand_id')->references('id')->on('brand')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn('sub_category_id');
            $table->dropColumn('brand_id');
            $table->dropColumn('old_price');
            $table->dropColumn('short_description');
            $table->dropColumn('additional_information');
            $table->dropColumn('shipping_returns');
            
            // Optionally, drop foreign key constraints if they were added
            // $table->dropForeign(['sub_category_id']);
            // $table->dropForeign(['brand_id']);
        });
    }
}
