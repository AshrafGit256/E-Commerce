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
        Schema::table('top_slider', function (Blueprint $table) {
            $table->tinyInteger('is_delete')->default(0)->after('button_link'); // Add 'is_delete' column
            $table->tinyInteger('status')->default(0)->after('is_delete'); // Add 'status' column
        });
    }

    public function down()
    {
        Schema::table('top_slider', function (Blueprint $table) {
            $table->dropColumn(['is_delete', 'status']); // Remove the added columns
        });
    }
};
