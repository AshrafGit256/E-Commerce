<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('email');
            $table->string('country')->nullable()->after('company_name');
            $table->string('address_one')->nullable()->after('country');
            $table->string('address_two')->nullable()->after('address_one');
            $table->string('city')->nullable()->after('address_two');
            $table->string('state')->nullable()->after('city');
            $table->string('postcode')->nullable()->after('state');
            $table->string('phone')->nullable()->after('postcode');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'country',
                'address_one',
                'address_two',
                'city',
                'state',
                'postcode',
                'phone',
            ]);
        });
    }
};
