<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class BlogCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'blog_category';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getSingleSlug($slug)
    {
        return Self::where('slug', '=', $slug)
                    ->where('blog_category.status', '=', 0)
                    ->where('blog_category.is_delete', '=', 0)
                    ->first();
    }

    public static function getRecord()
    {
        return self::select('blog_category.*')
                    ->where('blog_category.is_delete', '=', 0)
                    ->orderBy('blog_category.id', 'desc')
                    ->get();
    }

    public static function getRecordActive()
    {
        return self::select('blog_category.*')
                    ->where('blog_category.is_delete', '=', 0)
                    ->where('blog_category.status', '=', 0)
                    ->orderBy('blog_category.name', 'asc')
                    ->get();
    }

    public static function getRecordActiveHome()
    {
        return self::select('blog_category.*')
                    ->where('blog_category.is_delete', '=', 0)
                    ->where('blog_category.is_home', '=', 1)
                    ->where('blog_category.status', '=', 0)
                    ->orderBy('blog_category.id', 'asc')
                    ->get();
    }

    public function getCountBlog($value='')
    {
        return $this->hasMany(BlogModel::class, 'blog_category_id')
                    ->where('blog.is_delete', '=', 0)
                    ->where('blog.status', '=', 0)
                    ->count();
    }
}
