<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
// use Darryldecode\Cart\Facades\CartFacade as Cart; // Correctly import the Cart facade

class PaymentController extends Controller
{
    public function cart(Request $request)
    {
        dd(Cart::getContent());
    }

    public function add_to_cart(Request $request)
    {
        $getProduct = ProductModel::getSingle($request->product_id);
        $total = $getProduct->price;

        if(!empty($request->size_id))
        {
            $size_id = $request->size_id;
            $getSize = ProductSizeModel::getSingle($size_id);

            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total = $total + $size_price;
        }
        else
        {
            $size_id = 0;
        }

        $color_id = !empty($request->color_id) ? $request->color_id : 0;

        Cart::add([
            'id' => $getProduct->id,
            'name' => 'Product',
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => array(
                'size_id' => $size_id,
                'color_id' => $color_id,
            ),
            
        ]);

        
        return redirect()->back();
    }
}
