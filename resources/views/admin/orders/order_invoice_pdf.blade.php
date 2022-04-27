<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 18cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

        #invoice {
                padding-right: 6px;
                border-right: 6px solid #0087C3;
                float: right;
            }


            .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

            .col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.Row {
    display: table;
    width: 100%; /*Optional*/
    table-layout: fixed; /*Optional*/
    border-spacing: 10px; /*Optional*/
}
.Column {
    display: table-cell;
    text-align: center;
    /* background-color: red; */
}
    </style>
</head>

<body>
    <div class="Row">
        <div class="Column">
            <p>
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
            </p>
            <p style="padding-left:20px;"> INVOICE # {{ $order->id }}</p>
        </div>
        <div class="Column">
            <h2 class="name">FAI LIMITED</h2>
            <div>17/A, Shantibah, Dhaka-1217</div>
            <div>01771045019</div>
            <div><a href="fai@ecom.com">fai@ecom.com</a></div>
        </div>
        <div class="Column">
            <img height="80px" src="{{ asset('images/logo2.png') }}">
        </div>
    </div>
    <main style="border-top: 1px solid #777777;">
    <div style="width: 100%; display: table;margin-top:15px;">
        <div style="display: table-row; height: 100px;margin-top:10px;">
            <div style="width: 50%; display: table-cell;padding-left: 6px;border-left: 6px solid #0087C3;">
                <div class="to">BILLING TO:</div>
                <h2 class="name">{{ $user_details->name }}</h2>
                <div class="address">@if ($user_details->address)
                    {{ $user_details->address }},
                @endif @if ($user_details->city){{ $user_details->city }},  @endif @if ($user_details->state){{ $user_details->state }}, @endif @if ($user_details->country){{ $user_details->country }}@endif</div>
                <div class="email"><a href="mailto:john@example.com">{{ $user_details->mobile }}</a></div>
            </div>
            <div style="display: table-cell; text-align:right;padding-right: 6px;
            border-right: 6px solid #0087C3;
            float: right;"> 
                <div class="to">SHIPPED TO:</div>
                <h2 class="name">{{ $order->name }}</h2>
                <div class="address">@if ($order->address)
                    {{ $order->address }},
                @endif @if ($order->city){{ $order->city }},  @endif @if ($order->state){{ $order->state }}, @endif @if ($order->country){{ $order->country }}@endif</div>
                <div class="email"><a href="mailto:john@example.com">{{ $order->mobile }}</a></div>
            </div>
        </div>
    </div>

    <div style="width: 100%; display: table;margin:15px 0 30px 0;">
        <div style="display: table-row; height: 100px;margin-top:10px;">
            <div style="width: 50%; display: table-cell;padding-left: 6px;border-left: 6px solid #0087C3;">
                <div class="to">PAYMENT METHOD:</div>
                <div class="date">{{ $order->payment_method }}</div>
            </div>
            <div style="display: table-cell; text-align:right;padding-right: 6px;
            border-right: 6px solid #0087C3;
            float: right;"> 
                <div>Orders Date:</div>
                <div>{{ date('j-F-Y',strtotime($order->created_at)) }}</div>
            </div>
        </div>
    </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="total">SL</th>
                    <th class="desc">DESCRIPTION</th>
                    <th class="unit"> PRICE</th>
                    <th class="qty">QUANTITY</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $subtotal = 0;
                    $sl = 1;
                @endphp
                @foreach ($order->order_details as $order_products)
                    
                <tr>
                    <td class="no">{{ $sl++ }}</td>
                    <td class="desc">
                        <h3>{{ $order_products->product_name }}</h3>
                        Product Code: {{ $order_products->product_code }} <br>
                        Product Color: {{ $order_products->product_color }} <br>
                        Product Size: {{ $order_products->product_size }} <br>
                    </td>
                    <td class="unit">$ {{ $order_products->product_price }}</td>
                    <td class="qty">{{ $order_products->product_qty }}</td>
                    <td class="total">$ {{ $order_products->product_price*$order_products->product_qty }}</td>
                </tr>
                @php
                    $subtotal = $subtotal + $order_products->product_price*$order_products->product_qty;
                @endphp
                
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>$ {{ $subtotal }}</td>
                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Shipping Charge</td>
                    <td>$ 0</td>
                </tr>
                @if ($order->coupon_amount>0)
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Coupon Amount</td>
                    <td>$ {{ $order->coupon_amount }}</td>
                </tr>
                    
                @endif
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>$ {{ $order->grand_total }}</td>
                </tr>
            </tfoot>
        </table>
        <img style="float: right;height:70px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
        <div id="thanks">Thank you! </div>
        
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
