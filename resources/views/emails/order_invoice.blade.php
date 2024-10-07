@component('mail::message')

<h1 style="color: #333; font-size: 24px;">Order Invoice</h1>

<p style="font-size: 16px;">Dear {{ $order->first_name }},</p>
<p style="font-size: 16px;">
    Thank you for your recent purchase with <strong>E-Commerce</strong>. We are pleased to confirm your order. Please find the details of your order below.
</p>

<h3 style="font-size: 18px; color: #555; margin-top: 20px;">Order Details</h3>
<ul style="font-size: 16px; list-style: none; padding: 0;">
    <li><strong>Order Number:</strong> {{ $order->order_number }}</li>
    <li><strong>Date of Purchase:</strong> {{ $order->created_at ? $order->created_at->format('F j, Y, g:i A') : 'N/A' }}</li>
</ul>

<div style="margin: 20px 0;">
    <h2 style="font-size: 18px; color: #555; margin-bottom: 10px;">Invoice Details</h2>
    <table style="width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 16px;">
        <thead>
            <tr>
                <th style="padding: 12px; border: 1px solid #ddd; background-color: #f5f5f5; text-align: left;">Item</th>
                <th style="padding: 12px; border: 1px solid #ddd; background-color: #f5f5f5; text-align: left;">Quantity</th>
                <th style="padding: 12px; border: 1px solid #ddd; background-color: #f5f5f5; text-align: right;">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->getItem as $item)
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <b>{{ $item->getProduct->title }}</b> 
                    <br> 
                    Color : {{ $item->color_name }}
                    @if(!empty($item->size_name))
                    <br>
                    Size : {{ $item->size_name }}
                    <br>
                    Size Amount: ${{ number_format($item->size_amount, 2) }}
                    @endif
                </td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: left;">{{ $item->quantity }}</td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">${{ number_format($item->total_price, 2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" style="padding: 12px; border: 1px solid #ddd; text-align: right; font-weight: bold;">Total Amount:</td>
                <td style="padding: 12px; border: 1px solid #ddd; text-align: right; font-weight: bold;">${{ number_format($order->total_amount, 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<p>Shipping Name : <b>${ { $order->getShipping->name  }}</b></p>
<p>Shipping Amount : <b>${ { number_format($order->shipping_amount, 2) }}</b></p>

@if(!empty($order->discount_code))
<p>Discount Code : <b>${ { $order->discount_code  }}</p>
<p>Discount Amount : <b>${ { number_format($order->discount_amount, 2) }}</b></p>
@endif

<p>Total Amount : <b>${ { number_format($order->total_amount, 2) }}</b></p>

<p style="font-size: 16px;">Payment Method : <strong>{{ $order->payment_method }}</strong></p>

<p style="font-size: 16px;">
    If you have any questions about your order, feel free to reach us at <a href="mailto:support@example.com" style="color: #007bff;">support@example.com</a>.
</p>

<p style="font-size: 16px;">Thank you for choosing <strong>{{ config('app.name') }}</strong>!</p>

<br>
Thanks,<br>
<strong>{{ config('app.name') }}</strong>

@endcomponent
