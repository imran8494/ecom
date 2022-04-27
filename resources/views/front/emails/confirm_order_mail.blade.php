<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce Website</title>
</head>

<body>
    <tr>
        <td><img src="{{ asset('images/admin_images/logo.png') }}"></td>
        
    </tr>
    <tr>
        <td>Hello, {{ $details['name'] }} </td>
    </tr> <br>
    <tr>
        <td>Thank you for shopping with us. Your order details are as below:-</td>
    </tr> <br>
    <tr>
        <td>Order no: {{ $details['order_id'] }}</td>
    </tr> <br>

    <table width="95%" cellpaddin="5" cellspacing="5" bgcolor="#f7f4f4">
        <tr bgcolor="#cccccc">
            <td>Product Name</td>
            <td>Product Code</td>
            <td>Product Size</td>
            <td>Product Color</td>
            <td>Product Quantity</td>
            <td>Product Price</td>
        </tr>
        @foreach ($details['order_dtls']->order_details as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->product_size }}</td>
                <td>{{ $product->product_color }}</td>
                <td>{{ $product->product_qty }}</td>
                <td>{{ $product->product_price }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="5" align="right">Shipping Charges :</td>
            <td>$ {{ $details['order_dtls']->shipping_charges }}</td>
        </tr>
        <tr>
            <td colspan="5" align="right">Coupon Discount :</td>
            <td>
                @if ($details['order_dtls']->coupon_amount > 0)
                    $ {{ $details['order_dtls']->coupon_amount }}
                @else
                    $ 0
                @endif


            </td>
        </tr>
        <tr>
            <td colspan="5" align="right">Grand Total :</td>
            <td>$ {{ $details['order_dtls']->grand_total }}</td>
        </tr>
    </table>
    <table>
        <h4>Delivery Address</h4>
        <tr>
            <td>{{ $details['order_dtls']->name }}</td>
        </tr>
        <tr>
            <td>{{ $details['order_dtls']->address }}</td>
        </tr>
        <tr>
            <td>{{ $details['order_dtls']->city }}</td>
        </tr>
        <tr>
            <td>{{ $details['order_dtls']->state }}</td>
        </tr>
        <tr>
            <td>{{ $details['order_dtls']->country }}</td>
        </tr>
        <tr>
            <td>{{ $details['order_dtls']->pincode }}</td>
        </tr>
        <tr>
            <td>{{ $details['order_dtls']->mobile }}</td>
        </tr>
    </table>
    <p> For any queries you can contact with use.</p>
    <h4>Thanks & Regards</h4>
    <p>Ecommerce website team.</p>
</body>

</html>
