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
        Schema::table('color', function (Blueprint $table) {
            $table->string('code')->after('name');
        });
    }

    public function down()
    {
        Schema::table('color', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }

};
