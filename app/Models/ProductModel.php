<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';

    // Retrieve a single product by ID
    public static function getSingle($id)
    {
        return self::find($id);
    }

    // Retrieve paginated records with related user information
    public static function getRecord()
    {
        return self::select('product.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', '=', 'product.created_by')
                    ->where('product.is_delete', '=', 0)
                    ->orderBy('product.id', 'desc')
                    ->paginate(10);
    }

    // Retrieve products with various filters
    public static function getProduct($category_id = '', $subcategory_id = '')
    {
        $return = self::select('product.*', 'users.name as created_by_name', 
                               'category.name as category_name', 'category.slug as category_slug', 
                               'sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
                    ->join('users', 'users.id', '=', 'product.created_by')
                    ->join('category', 'category.id', '=', 'product.category_id')
                    ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id');

        if (!empty($category_id)) {
            $return = $return->where('product.category_id', '=', $category_id);
        }

        if (!empty($subcategory_id)) {
            $return = $return->where('product.sub_category_id', '=', $subcategory_id);
        }

        // Handle sub_category_id filter
        if (!empty(request()->get('sub_category_id'))) {
            $sub_category_id = rtrim(request()->get('sub_category_id'), ',');
            $sub_category_id_array = explode(",", $sub_category_id);
            $return = $return->whereIn('product.sub_category_id', $sub_category_id_array);
        }

        // Handle color_id filter
        if (!empty(request()->get('color_id'))) {
            $color_id = rtrim(request()->get('color_id'), ',');
            $color_id_array = explode(",", $color_id);
            $return = $return->join('product_color', 'product_color.product_id', '=', 'product.id')
                             ->whereIn('product_color.color_id', $color_id_array);
        }
        
        // Handle brand_id filter
        if (!empty(request()->get('brand_id'))) {
            $brand_id = rtrim(request()->get('brand_id'), ',');
            $brand_id_array = explode(",", $brand_id);
            $return = $return->whereIn('product.brand_id', $brand_id_array);
        }

        return $return->where('product.is_delete', '=', 0)
                      ->where('product.status', '=', 0)
                      ->groupBy('product.id')
                      ->orderBy('product.id', 'desc')
                      ->paginate(6);
    }

    // Retrieve the first image for a product
    public static function getImageSingle($product_id)
    {
        return ProductImageModel::where('product_id', '=', $product_id)
                                ->orderBy('order_by', 'asc')
                                ->first();
    }

    // Check if a slug exists
    public static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    // Relationships
    public function getColor()
    {
        return $this->hasMany(ProductColorModel::class, "product_id");
    }

    public function getSize()
    {
        return $this->hasMany(ProductSizeModel::class, "product_id");
    }

    public function getImage()
    {
        return $this->hasMany(ProductImageModel::class, 'product_id')->orderBy('order_by', 'asc');
    }
}
