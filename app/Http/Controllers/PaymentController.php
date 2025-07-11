<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\ProductSizeModel;
use App\Models\DiscountCodeModel;
use App\Models\ShippingChargeModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\NotificationModel;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;



class PaymentController extends Controller
{
    public function apply_discount_code(Request $request)
    {
        $getDiscount = DiscountCodeModel::CheckDiscount($request->discount_code);
        $total = Cart::getSubTotal();

        if (!empty($getDiscount)) {
            $total = Cart::getSubTotal();
            if ($getDiscount->type == 'Amount') {
                $discount_amount = $getDiscount->percent_amount;
                $payable_total = $total - $discount_amount;
            } else {
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total = $total - $discount_amount;
            }

            $json = [
                'status' => true,
                'discount_amount' => number_format($discount_amount, 2),
                'payable_total' => number_format($payable_total, 2),
                'message' => "Success"
            ];
        } else {
            $json = [
                'status' => false,
                'discount_amount' => 0.00,
                'payable_total' => number_format($total, 2),
                'message' => "Discount code not found"
            ];
        }

        return response()->json($json);
    }

    public function checkout(Request $request)
    {
        $data = [
            'meta_title' => 'Checkout',
            'meta_description' => '',
            'meta_keywords' => '',
            'getShippingCharge' => ShippingChargeModel::getRecordActive()
        ];

        return view('payment.checkout', $data);
    }

    public function cart(Request $request)
    {
        $data = [
            'meta_title' => 'Cart',
            'meta_description' => '',
            'meta_keywords' => ''
        ];

        return view('payment.cart', $data);
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
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

        
        return redirect()->back()->with('success', "{$getProduct->title} Successfully Added To Cart");
    }

    public function update_cart(Request $request)
    {
        foreach ($request->cart as $cart) {
            Cart::update($cart['id'], [
                'quantity' => [
                    'relative' => false,
                    'value' => $cart['qty']
                ]
            ]);
        }

        return redirect()->back();
    }

    public function place_order(Request $request)
{
    $validate = 0;
    $message = '';
    $user_id = null; 

    // Check if the user already exists
    $existingUser = User::where('email', $request->email)->first();

    if ($existingUser) {
        $user_id = $existingUser->id;
    } 
    else if ($request->is_create) 
    {
        // Create a new user if not found
        $save = new User;
        $save->name = trim($request->first_name) . ' ' . trim($request->last_name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->save();

        $user_id = $save->id;
    }

    // Validate that user_id exists
    if (!$user_id) {
        return response()->json([
            'status' => false,
            'message' => "User information is missing. Please register or provide a valid email."
        ]);
    }

    // Create Order
    $order = new OrderModel;
    $order->user_id = $user_id;

    $getShipping = ShippingChargeModel::getsingle($request->shipping);
    $payable_total = Cart::getSubTotal();
    $discount_amount = 0;
    $discount_code = '';

    if (!empty($request->discount_code)) {
        $getDiscount = DiscountCodeModel::CheckDiscount($request->discount_code);
        if (!empty($getDiscount)) {
            $discount_code = $request->discount_code;
            $discount_amount = ($getDiscount->type == 'Amount')
                ? $getDiscount->percent_amount
                : ($payable_total * $getDiscount->percent_amount) / 100;
            $payable_total -= $discount_amount;
        }
    }

    $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
    $total_amount = $payable_total + $shipping_amount;

    // Fill order details
    $order->order_number = mt_rand(100000000, 999999999);
    $order->first_name = trim($request->first_name);
    $order->last_name = trim($request->last_name);
    $order->company_name = trim($request->company_name);
    $order->country = trim($request->country);
    $order->address_one = trim($request->address_one);
    $order->address_two = trim($request->address_two);
    $order->city = trim($request->city);
    $order->state = trim($request->state);
    $order->postcode = trim($request->postcode);
    $order->phone = trim($request->phone);
    $order->email = trim($request->email);
    $order->note = trim($request->note);
    $order->discount_amount = trim($discount_amount);
    $order->discount_code = trim($discount_code);
    $order->shipping_id = trim($request->shipping);
    $order->shipping_amount = trim($shipping_amount);
    $order->total_amount = trim($total_amount);
    $order->payment_method = trim($request->payment_method);
    $order->save();

    // Save order items
    foreach (Cart::getContent() as $cart) {
        $order_item = new OrderItemModel;
        $order_item->order_id = $order->id;
        $order_item->product_id = $cart->id;
        $order_item->quantity = $cart->quantity;
        $order_item->price = $cart->price;

        if (!empty($cart->attributes->color_id)) {
            $getColor = ColorModel::getSingle($cart->attributes->color_id);
            $order_item->color_name = $getColor->name;
        }

        if (!empty($cart->attributes->size_id)) {
            $getSize = ProductSizeModel::getSingle($cart->attributes->size_id);
            $order_item->size_name = $getSize->name;
            $order_item->size_amount = $getSize->price;
        }

        $order_item->total_price = $cart->price * $cart->quantity;
        $order_item->save();
    }

    return response()->json([
        'status' => true,
        'message' => "Order successfully placed",
        'redirect' => url('checkout/payment?order_id=' . base64_encode($order->id))
    ]);
}


    public function checkout_payment(Request $request)
    {
        if(!empty(Cart::getSubTotal()) && !empty($request->order_id))
        {
            $order_id = base64_decode($request->order_id);
            $getOrder = OrderModel::getSingle($order_id);
            
            if(!empty($getOrder))
            {
                if($getOrder->payment_method == 'cash')
                {
                    $getOrder->is_payment = 1;
                    $getOrder->save();

                   try
                   {
                        Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));
                   }
                   catch (\Exception $e)
                   {

                   }

                    $user_id = 1;
                    $url = url('admin/order/detail/'.$getOrder->id);
                    $message = "New Order Placed #".$getOrder->order_number;

                    NotificationModel::insertRecord($user_id, $url, $message);
                    
                    Cart::clear();

                    return redirect('cart')->with('success', "Order successfully placed");
                }
                else if($getOrder->payment_method == 'paypal')
                {
                    
                }
                else if($getOrder->payment_method == 'stripe')
                {
                    
                }
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            abort(404);
        }
    }
}