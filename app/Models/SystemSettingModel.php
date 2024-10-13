<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSettingModel extends Model
{
    use HasFactory;

    protected $table = 'system_setting';

    public static function getSingle()
    {
        return self::find(1);
    }

    public function getLogo()
    {
        if(!empty($this->logo) && file_exists('upload/setting/' .$this->logo))
        {
            return url('upload/setting/' .$this->logo);
        }
        else
        {
            return "";
        }
    }

    public function getFavicon()
    {
        if(!empty($this->favicon) && file_exists('upload/setting/' .$this->favicon))
        {
            return url('upload/setting/' .$this->favicon);
        }
        else
        {
            return "";
        }
    }

    public function getFooterPaymentIcon()
    {
        if(!empty($this->footer_payment_icon) && file_exists('upload/setting/' .$this->footer_payment_icon))
        {
            return url('upload/setting/' .$this->footer_payment_icon);
        }
        else
        {
            return "";
        }
    }
}
