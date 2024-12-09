<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopSliderModel extends Model
{
    use HasFactory;

    protected $table = 'top_slider';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getRecord()
    {
        return self::select('top_slider.*')
                    ->where('top_slider.is_delete', '=', 0)
                    ->orderBy('top_slider.id', 'desc')
                    ->paginate(10);
    }

    public static function getRecordActive()
    {
        return self::select('top_slider.*')
                    ->where('top_slider.is_delete', '=', 0)
                    ->where('top_slider.status', '=', 0)
                    ->orderBy('top_slider.id', 'asc')
                    ->get();
    }

    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('upload/top_slider/' .$this->image_name))
        {
            return url('upload/top_slider/' .$this->image_name);
        }
        else
        {
            return "";
        }
    }
    
}
