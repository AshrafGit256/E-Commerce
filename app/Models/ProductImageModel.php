<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public function get_image()
    {
        if(!empty($this->image_name) && file_exists('upload/product/' .$this->image_name))
        {
            return url('upload/product/' .$this->image_name);
        }
        else
        {
            return "";
        }
    }
}
