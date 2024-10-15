<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model
{
    use HasFactory;

    protected $table = 'partner';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getRecord()
    {
        return self::select('partner.*')
                    ->where('partner.is_delete', '=', 0)
                    ->orderBy('partner.id', 'desc')
                    ->paginate(10);
    }

    public static function getRecordActive()
    {
        return self::select('partner.*')
                    ->where('partner.is_delete', '=', 0)
                    ->where('partner.status', '=', 0)
                    ->orderBy('partner.id', 'asc')
                    ->get();
    }

    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('upload/partner/' .$this->image_name))
        {
            return url('upload/partner/' .$this->image_name);
        }
        else
        {
            return "";
        }
    }
    
}
