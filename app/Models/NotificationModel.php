<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    use HasFactory;

    protected $table = 'notification';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function insertRecord($user_id, $url, $message)
    {
        $save = new NotificationModel;
        $save->user_id = $user_id;
        $save->url = $url;
        $save->message = $message;
        $save->save();
    }
    

}
