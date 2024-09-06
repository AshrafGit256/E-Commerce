<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; // Correct import

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
    public static function getProduct($category_id = null, $subcategory_id = null, $product_id = null)
    {
        $query = self::select('product.*', 'users.name as created_by_name', 
                            'category.name as category_name', 'category.slug as category_slug', 
                            'sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
                    ->join('users', 'users.id', '=', 'product.created_by')
                    ->join('category', 'category.id', '=', 'product.category_id')
                    ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
                    ->where('product.is_delete', 0)
                    ->where('product.status', 0);

        // Filter by category_id if provided
        if (!empty($category_id)) {
            $query->where('product.category_id', $category_id);
        }

        // Filter by sub_category_id if provided
        if (!empty($subcategory_id)) {
            $query->where('product.sub_category_id', $subcategory_id);
        }

        // Use Request instance to get the query parameter
        $request = request(); // Get the current request instance

        if (!empty($request->get('sub_category_id'))) {
            $sub_category_id = rtrim($request->get('sub_category_id'), ',');
            $sub_category_id_array = explode(",", $sub_category_id);

            $query->whereIn('product.sub_category_id', $sub_category_id_array);
        } else {
            if (!empty($request->get('old_category_id'))) {
                $query->where('product.category_id', '=', $request->get('old_category_id'));
            }

            if (!empty($request->get('old_sub_category_id'))) {
                $query->where('product.sub_category_id', '=', $request->get('old_sub_category_id'));
            }
        }

        if (!empty($request->get('color_id'))) {
            $color_id = rtrim($request->get('color_id'), ',');
            $color_id_array = explode(",", $color_id);

            $query->join('product_color', 'product_color.product_id', '=', 'product.id')
                  ->whereIn('product_color.color_id', $color_id_array);
        }

        if (!empty($request->get('brand_id'))) {
            $brand_id = rtrim($request->get('brand_id'), ',');
            $brand_id_array = explode(",", $brand_id);

            $query->whereIn('product.brand_id', $brand_id_array);
        }

        if (!empty($request->get('start_price')) && !empty($request->get('end_price'))) {
            $start_price = str_replace('$', '', $request->get('start_price'));
            $end_price = str_replace('$', '', $request->get('end_price'));

            $query->where('product.price', '>=', $start_price)
                  ->where('product.price', '<=', $end_price);
        }

        if (!empty($request->get('q'))) {
            $query->where('product.title', 'like', '%'. $request->get('q') .'%');
        }

        return $query->groupBy('product.id')
                     ->orderBy('product.id', 'desc')
                     ->paginate(10);
    }

    public static function getRelatedProduct($product_id = '', $sub_category_id = '')
    {
        return self::select('product.*', 'users.name as created_by_name', 
                            'category.name as category_name', 'category.slug as category_slug', 
                            'sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
                    ->join('users', 'users.id', '=', 'product.created_by')
                    ->join('category', 'category.id', '=', 'product.category_id')
                    ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
                    ->where('product.id', '!=', $product_id)
                    ->where('product.sub_category_id', '=', $sub_category_id)
                    ->where('product.is_delete', '=', 0)
                    ->where('product.status', '=', 0)
                    ->groupBy('product.id')
                    ->orderBy('product.id', 'desc')
                    ->limit(10)
                    ->get();
    }

    // Retrieve the first image for a product
    public static function getImageSingle($product_id)
    {
        return ProductImageModel::where('product_id', '=', $product_id)
                                ->orderBy('order_by', 'asc')
                                ->first();
    }

    // Check if a slug exists
    public static function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
                    ->where('product.is_delete', '=', 0)
                    ->where('product.status', '=', 0)            
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

    public function getCategory() 
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function getSubCategory() 
    {
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id');
    }
}
