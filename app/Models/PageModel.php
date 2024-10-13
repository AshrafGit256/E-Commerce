<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    use HasFactory;

    protected $table = 'page';

    public static function getSingle($id)
    {
        return self::find($id);
    }

    public static function getSlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }

    public static function getRecord()
    {
        return self::select('page.*')
                    ->get();
    }

    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('upload/page/' .$this->image_name))
        {
            return url('upload/page/' .$this->image_name);
        }
        else
        {
            return "";
        }
    }
}
