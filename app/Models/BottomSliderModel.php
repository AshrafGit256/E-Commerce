<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottomSliderModel extends Model
{
    use HasFactory;

    protected $table = 'bottom_slider';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getRecord()
    {
        return self::select('bottom_slider.*')
                    ->where('bottom_slider.is_delete', '=', 0)
                    ->orderBy('bottom_slider.id', 'desc')
                    ->paginate(10);
    }

    public static function getRecordActive()
    {
        return self::select('bottom_slider.*')
                    ->where('bottom_slider.is_delete', '=', 0)
                    ->where('bottom_slider.status', '=', 0)
                    ->orderBy('bottom_slider.id', 'asc')
                    ->get();
    }

    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('upload/bottom_slider/' .$this->image_name))
        {
            return url('upload/bottom_slider/' .$this->image_name);
        }
        else
        {
            return "";
        }
    }
    
}
