<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = OrderModel::select('orders.*')
                 ->where('is_payment', '=', 1)
                 ->where('is_delete', '=', 0)
                 ->orderBy('id', 'desc')
                 ->paginate(30);

        return $return;
    }

    public function getShipping()
    {
        return $this->belongsTo(ShippingChargeModel::class, 'shipping_id');
    }

    public function getItem()
    {
        return $this->hasMany(OrderItemModel::class, 'order_id');
    }

}
