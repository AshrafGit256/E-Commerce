<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('page')->insert([
            ['name' => 'home', 'slug' => 'home'],
            ['name' => 'about', 'slug' => 'about'],
            ['name' => 'faq', 'slug' => 'faq'],
            ['name' => 'contact', 'slug' => 'contact'],
            ['name' => 'payment-method', 'slug' => 'payment-method'],
            ['name' => 'money-back-guarantee', 'slug' => 'money-back-guarantee'],
            ['name' => 'return', 'slug' => 'return'],
            ['name' => 'shipping', 'slug' => 'shipping'],
            ['name' => 'terms-condition', 'slug' => 'terms-condition'],
            ['name' => 'privacy-policy', 'slug' => 'privacy-policy'],
        ]);
    }
}
