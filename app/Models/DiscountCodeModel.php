<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCodeModel extends Model
{
    use HasFactory;

    protected $table = 'discount_code';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getRecord()
    {
        return self::select('discount_code.*')
                    ->where('discount_code.is_delete', '=', 0)
                    ->orderBy('discount_code.id', 'desc')
                    ->paginate(10);
    }

    static public function CheckDiscount($discount_code)
    {
        return self::select('discount_code.*')
                    ->where('discount_code.is_delete', '=', 0)
                    ->where('discount_code.status', '=', 0)
                    ->where('discount_code.name', '=', $discount_code)
                    ->where('discount_code.expire_date', '>=', date('Y-m-d'))
                    ->first();
    }
}
