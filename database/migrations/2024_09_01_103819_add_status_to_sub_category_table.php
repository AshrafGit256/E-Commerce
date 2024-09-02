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
        Schema::table('sub_category', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->after('slug');
        });
    }

    public function down()
    {
        Schema::table('sub_category', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

};
