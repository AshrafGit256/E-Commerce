<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\SubCategoryModel;
use App\Models\ProductColorModel;
use App\Models\ProductSizeModel;
use App\Models\ProductImageModel;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list()
    {
        $data['getRecord']= ProductModel::getRecord();
        $data['header_title'] = 'Product';
        return view('admin.product.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        // Correctly access the 'title' input from the request
        $title = trim($request->input('title'));
        $product = new ProductModel;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();

        $slug = Str::slug($title, "-");
        
        $checkSlug = ProductModel::checkSlug($slug);
        if(empty($checkSlug))
        {
            $product->slug = $slug;
            $product->save();
        }
        else
        {
            $new_slug = $slug.'-'.$product->id;
            $product->slug = $new_slug;
            $product->save();
        }

        // return redirect('admin/product/edit/'.$product->id);

        return redirect('admin/product/list')->with('Success', "Product  Successfully created");
    }

    public function edit($product_id)
    {
        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
        {
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getBrand'] =BrandModel::getRecordActive();
            $data['getColor'] =ColorModel::getRecordActive();
            $data['product'] = $product;
            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($product->category_id);
            $data['header_title'] = 'Edit Product';
            return view('admin.product.edit', $data);
        }
    }

    public function update($product_id, Request $request)
    {
        // dd($request->all());

        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
        {

            

            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            // $product->color_id = trim($request->color_id);
            $product->old_price = trim($request->old_price);
            $product->price = trim($request->price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additional_information = trim($request->additional_information);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = trim($request->status);
            $product->save();

            ProductColorModel::DeleteRecord($product->id);

            if(!empty($request->color_id))
            {
                foreach($request->color_id as $color_id)
                {
                    $color = new ProductColorModel;
                    $color->color_id = $color_id;
                    $color->product_id = $product->id;
                    $color->save();
                }
            }

            ProductSizeModel::DeleteRecord($product->id);

            if(!empty($request->size))
            {
                foreach($request->size as $size)
                {
                    if(!empty($request->size))
                    {
                        if(!empty($size['name']))
                        {
                            $saveSize = new ProductSizeModel;
                            $saveSize->name = $size['name'];
                            $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                            $saveSize->product_id = $product->id;
                            $saveSize->save();
                        }
                    }
                    
                }
            }

            if(!empty($request->file('image')))
            {
                foreach($request->file('image') as $value)
                {
                    if($value->isValid())
                    {
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id.Str::random(20);
                        $filename = strtolower($randomStr).'.'.$ext;
                        $value->move(public_path('upload/product/'), $filename);

                        $imageupload = new ProductImageModel;
                        $imageupload -> image_name = $filename;
                        $imageupload -> image_extension = $ext;
                        $imageupload -> product_id = $product_id;
                        $imageupload -> save();
                    }
                }
            }

            return redirect()->back()->with('Success', "Product successfully updated");
           
        }
        else
        {
            abort(404);
        }
    }

    public function delete($product_id)
{
    // Find the product by ID
    $product = ProductModel::find($product_id);

    if ($product) {
        // Delete associated images
        $images = ProductImageModel::where('product_id', $product_id)->get();
        foreach ($images as $image) {
            if (file_exists(public_path('upload/product/' . $image->image_name))) {
                unlink(public_path('upload/product/' . $image->image_name));
            }
            $image->delete();
        }

        // Delete associated colors
        ProductColorModel::where('product_id', $product_id)->delete();

        // Delete associated sizes
        ProductSizeModel::where('product_id', $product_id)->delete();

        // Delete the product itself
        $product->delete();

        return redirect()->back()->with('Success', "Product successfully deleted");
    } else {
        return redirect()->back()->with('Error', "Product not found");
    }
}


    public function image_delete($id)
    {
        $image =  ProductImageModel::getSingle($id);
        if(!empty($image->get_image()))
        {
            unlink('upload/product/' .$image->image_name);
        }
        $image->delete();

        return redirect()->back()->with('Success', "Product's Image successfully deleted");
    }

    public function product_image_sortable(Request $request)
    {
        if (!empty($request->photo_id)) {
            $i = 1;
            foreach ($request->photo_id as $photo_id) {
                $image = ProductImageModel::find($photo_id); // Use find() or your method if defined
    
                if ($image) { // Ensure the image exists
                    $image->order_by = $i; // Set the order
                    $image->save(); // Save changes
                    $i++; // Increment the order
                }
            }
        }
    
        return response()->json(['success' => true]); // Return JSON response
    }
    
}
