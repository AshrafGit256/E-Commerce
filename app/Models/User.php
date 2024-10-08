<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getTotalCustomer()
    {
      return self::select('id')
                ->where('is_admin', '=', 0)
                ->where('is_delete', '=', 0)
                ->count();
    }

    static public function getTotalTodayCustomer()
    {
      return self::select('id')
                ->where('is_admin', '=', 0)
                ->where('is_delete', '=', 0)
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->count();
    }

    static public function getTotalCustomerMonth($start_date, $end_date)
    {
      return self::select('id')
                ->where('is_admin', '=', 0)
                ->where('is_delete', '=', 0)
                ->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->count();
    }
    
    public static function getAdmin() 
    {
        return User::select('users.*')
                       -> where('is_admin', '=', 1)
                       -> where('is_delete', '=', 0)
                       -> orderby('id' , 'desc')
                       ->get();
    }

    public static function getCustomer() 
    {
        $return = User::select('users.*');
                  if(!empty(Request::get('id')))
                  {
                    $return = $return->where('id', '=', Request::get('id'));
                  }

                  if(!empty(Request::get('name')))
                  {
                    $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                  }

                  if(!empty(Request::get('email')))
                  {
                    $return = $return->where('email', 'like', '%'.Request::get('email').'%');
                  }

                  if(!empty(Request::get('from_date')))
                  {
                    $return = $return->whereDate('created_at', '>=', Request::get('from_date'));
                  }

                  if(!empty(Request::get('to_date')))
                  {
                    $return = $return->whereDate('created_at', '<=', Request::get('to_date'));
                  }

        $return = $return-> where('is_admin', '=', 0)
                       -> where('is_delete', '=', 0)
                       -> orderby('id' , 'desc')
                       ->paginate(20);
                return $return;
    }

    public static function getSingle($id)
    {
        return User::find($id);
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('public/assets/images/team/'.$this->profile_pic))
        {
            return url('public/assets/images/team/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }
    
    public static function checkEmail($email)
    {
        return User::select('users.*')
                       -> where('email', '=', $email)
                       ->first();
    }
}

