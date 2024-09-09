<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public static function getAdmin() 
    {
        return User::select('users.*')
                       -> where('is_admin', '=', 1)
                       -> where('is_delete', '=', 0)
                       -> orderby('id' , 'desc')
                       ->get();
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

