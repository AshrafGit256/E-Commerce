<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToCategoryTable extends Migration
{
    public function up()
    {
        Schema::table('category', function (Blueprint $table) {
            // Add the category_id column
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            
            // If you need to set up a foreign key constraint for category_id
            // $table->foreign('category_id')->references('id')->on('some_other_table')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('category', function (Blueprint $table) {
            // Drop the foreign key constraint if it was added
            // $table->dropForeign(['category_id']);
            
            // Drop the category_id column
            $table->dropColumn('category_id');
        });
    }
}
