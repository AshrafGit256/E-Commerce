<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeSetting; // Adjust the model namespace if necessary

class HomeSettingSeeder extends Seeder
{
    public function run()
    {
        HomeSetting::create([
            'trendy_product_title' => 'Latest Trends',
            'shop_by_category_title' => 'Shop by Categories',
            'recent_arrival_title' => 'Recent Arrivals',
            'blog_title' => 'Latest Blogs',
            'payment_delivery_title' => 'Payment & Delivery',
            'payment_delivery_description' => 'We offer various payment methods.',
            'payment_delivery_image' => 'path/to/image.jpg', // Replace with actual image path
            'refund_title' => 'Refund Policy',
            'refund_description' => 'Our refund policy is simple and transparent.',
            'refund_image' => 'path/to/refund-image.jpg', // Replace with actual image path
            'support_title' => 'Customer Support',
            'support_description' => 'Contact our support team for assistance.',
            'support_image' => 'path/to/support-image.jpg', // Replace with actual image path
            'signup_title' => 'Join Us Now',
            'signup_description' => 'Sign up to get exclusive offers and updates.',
            'signup_image' => 'path/to/signup-image.jpg', // Replace with actual image path
        ]);
    }
}
