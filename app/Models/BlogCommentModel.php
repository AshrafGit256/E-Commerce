<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class BlogCommentModel extends Model
{
    use HasFactory;

    protected $table = 'blog_comment';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
