<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    public static function getSingle($id)
    {
        return Self::find($id);
    }

    public static function getSingleSlug($slug)
    {
        return Self::where('slug', '=', $slug)
                    ->where('category.status', '=', 0)
                    ->where('category.is_delete', '=', 0)
                    ->first();
    }

    public static function getRecord()
    {
        return self::select('category.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', '=', 'category.created_by')
                    ->where('category.is_delete', '=', 0)
                    ->orderBy('category.id', 'desc')
                    ->get();
    }

    public static function getRecordActive()
    {
        return self::select('category.*')
                    ->join('users', 'users.id', '=', 'category.created_by')
                    ->where('category.is_delete', '=', 0)
                    ->where('category.status', '=', 0)
                    ->orderBy('category.name', 'asc')
                    ->get();
    }

    public static function getRecordMenu()
    {
        return self::select('category.*')
                    ->join('users', 'users.id', '=', 'category.created_by')
                    ->where('category.is_delete', '=', 0)
                    ->where('category.status', '=', 0)
                    ->get();
    }

    public function getSubCategory()
    {
        return $this->hasMany(SubCategoryModel::class, "category_id")
                    ->where('sub_category.status', '=', 0)
                    ->where('sub_category.is_delete', '=', 0);
    }
}
