<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderItemModel extends Model
{
    use HasFactory;

    protected $table = 'orders_item';

    public function getProduct()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public static function getReview($product_id, $order_id)
    {
        return ProductReviewModel::getReview($product_id, $order_id, Auth::user()->id);
    }

}
