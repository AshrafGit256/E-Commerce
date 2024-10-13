<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getRecord()
    {
        $return =  self::select('contact_us.*');

        if(!empty(Request::get('id')))
        {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if(!empty(Request::get('name')))
        {
            $return = $return->where('name', 'like', '%'.Request::get('name').'%');
        }

        if(!empty(Request::get('subject')))
        {
            $return = $return->where('subject', 'like', '%'.Request::get('subject').'%');
        }

        if(!empty(Request::get('phone')))
        {
            $return = $return->where('phone', 'like', '%'.Request::get('phone').'%');
        }

        if(!empty(Request::get('email')))
        {
            $return = $return->where('email', 'like', '%'.Request::get('email').'%');
        }
        
        $return = $return->orderBy('contact_us.id', 'desc')
                ->paginate(10);
        return $return;
    }
    
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
