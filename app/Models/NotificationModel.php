<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    

    public static function getRecord()
    {
        return NotificationModel::where('user_id', '=', 1)
                        ->orderBy('id', 'desc')
                        ->paginate(20);
    }

    public static function getRecordUser($user_id)
    {
        return NotificationModel::where('user_id', '=', $user_id)
                        ->orderBy('id', 'desc')
                        ->paginate(20);
    }
    
    public static function getUnreadNotification()
    {
        return NotificationModel::where('is_read', '=', 0)
                        ->where('user_id', '=', 1)
                        ->orderBy('id', 'desc')
                        ->get();
    }

    public static function getUnreadNotificationCount($user_id)
    {
        return NotificationModel::where('is_read', '=', 0)
                        ->where('user_id', '=', $user_id)
                        ->orderBy('id', 'desc')
                        ->count();
    }

    public static function updateReadNotify($id)
    {
       $getRecord = NotificationModel::getSingle($id);
       if(!empty($getRecord))
       {
            $getRecord->is_read = 1;
            $getRecord->save();
       }
    }
    

}
