<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingChargeModel extends Model
{
    use HasFactory;

    protected $table = 'shipping_charge';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getRecord()
    {
        return self::select('shipping_charge.*')
                    ->where('shipping_charge.is_delete', '=', 0)
                    ->orderBy('shipping_charge.id', 'desc')
                    ->paginate(10);
    }

}
