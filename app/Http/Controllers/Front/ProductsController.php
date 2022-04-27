<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;
use App\Mail\OrderedMail;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\DeliveryAddress;
use App\Models\Country;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Cart;
use Session;
use Auth;
use DB;

class ProductsController extends Controller
{
    //
    public function listing(Request $request)
    {
        Paginator::useBootstrap();
        if ($request->ajax()) {
            $data =$request->all();
                // echo "<pre>";print_r($data);die;
            $url = $request['url'];   
            $url_count = Category::where(['url'=>$url,'status'=>1])->count();
            if ($url_count>0) {
                // echo "category exists";
                $cat_details = Category::category_details($url);
                // echo "<pre>";print_r($cat_details);
                $cat_products = Product::with('brands')->whereIn('category_id',$cat_details['catIds'])->where('status',1);
                // echo "<pre>";print_r($cat_products);die;

                // filters 
                if (isset($data['fabric']) && !empty($data['fabric'])) {
                    $cat_products->whereIn('products.fabric',$data['fabric']);
                }
                if (isset($data['sleeve']) && !empty($data['sleeve'])) {
                    $cat_products->whereIn('products.sleeve',$data['sleeve']);
                }
                if (isset($data['pattern']) && !empty($data['pattern'])) {
                    $cat_products->whereIn('products.pattern',$data['pattern']);
                }
                if (isset($data['fit']) && !empty($data['fit'])) {
                    $cat_products->whereIn('products.fit',$data['fit']);
                }
                if (isset($data['occasion']) && !empty($data['occasion'])) {
                    $cat_products->whereIn('products.occasion',$data['occasion']);
                }

                if (isset($data['sort']) && !empty($data['sort'])) {
                    if ($data['sort'] == "latest_products") {
                        $cat_products->orderBy('id','Desc');
                    }else if ($data['sort'] == "product_a_z") {
                        $cat_products->orderBy('product_name','Asc');
                    }else if ($data['sort'] == "product_z_a") {
                        $cat_products->orderBy('product_name','Desc');
                    }else if ($data['sort'] == "lowest_price") {
                        $cat_products->orderBy('product_price','Asc');
                    }else if ($data['sort'] == "highest_price") {
                        $cat_products->orderBy('product_price','Desc');
                    }
                }else{
                    $cat_products->orderBy('id','Desc');
                }
                $cat_products = $cat_products->paginate(6);
                // echo "<pre>";print_r($cat_products);die;

                return view('front.product.ajax_filter_products')->with(compact('cat_details','cat_products','url'));
    
            }else{
                abort(404);
            }



        }else{
            $url = Route::getFacadeRoot()->current()->uri();
            $url_count = Category::where(['url'=>$url,'status'=>1])->count();
            if ($url_count>0) {
                // echo "category exists";
                $cat_details = Category::category_details($url);
                // echo "<pre>";print_r($cat_details);
                $cat_products = Product::with('brands')->whereIn('category_id',$cat_details['catIds'])->where('status',1);
                // echo "<pre>";print_r($cat_products);die;
                $cat_products = $cat_products->paginate(6);

                // product filters
                $product_filter = Product::product_filters();
                $fabric = $product_filter['fabric'];
                $sleeve = $product_filter['sleeve'];
                $pattern = $product_filter['pattern'];
                $fit = $product_filter['fit'];
                $occasion = $product_filter['occasion'];
                $page_name = "listing";


                return view('front.product.listing')->with(compact('cat_details','cat_products','url','fabric','pattern','sleeve','fit','occasion','page_name'));
    
            }else{
                abort(404);
            }
        } 
    }

    public function product_details($id, $product_name){
        $product_details = Product::with(['category','attributes'=>function($query){ $query->where('status',1);},'multiple_images','brands'])->find($id)->toArray();
        $mlt_img_arr = array_chunk($product_details['multiple_images'],3);
        $items_available = ProductAttribute::where('product_id',$id)->sum('stock');
        // echo "<pre>";print_r($product_details);die;

        $related_products = Product::where('category_id',$product_details['category_id'])->where('id','!=',$id)->inRandomOrder()->get()->toArray();
        // echo "<pre>";print_r($related_products);die;
        $rel_pr_arr_chnk = array_chunk($related_products,3);
        // echo "<pre>";print_r($rel_pr_arr_chnk);die;

        return view('front.product.product_details')->with(compact('product_details','mlt_img_arr','items_available','rel_pr_arr_chnk'));
    }

    public function get_price(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $att_price = ProductAttribute::find($data['att_id']);
            $get_pr_att_price = Product::attr_discounted_price($att_price->product_id,$att_price->id);
            // echo "<pre>";print_r($get_pr_att_price);die;

            return $get_pr_att_price;
        }
    }

    public function add_to_cart(Request $request)
    {
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        $product_qty = ProductAttribute::where(['product_id'=>$data['product_id'],'id'=>$data['size']])->first();
        // check quantity is available or not
        if ($data['size']== 'Select Size') {
            $message = "Please select product size.";
            session::flash('error_message',$message);   
            return redirect()->back();
        }
        if ($product_qty['stock']<$data['quantity']) {
            $message = "Required quantity is not available.";
            session::flash('error_message',$message);
            return redirect()->back();
        }

       $session_id = Session::get('session_id');
       if (empty($session_id)) {
           $session_id = Session::getId();
           Session::put('session_id',$session_id);
       }
        // echo $session_id;die;

    //    Cart::insert(['session_id'=>$session_id,'product_id'=>$data['product_id'],'size_attr_id'=>$data['size'],'quantity'=>$data['quantity']]);
if (Auth::check()) {
    $pr_cart = Cart::where(['user_id'=>Auth::user()->id,'product_id'=>$data['product_id'],'size_attr_id'=>$data['size']])->count();
}else{
    $pr_cart = Cart::where(['session_id'=>$session_id,'product_id'=>$data['product_id'],'size_attr_id'=>$data['size']])->count();
}
    //    echo $pr_cart;die;
        if ($pr_cart > 0) {
            $message = "Product is already available in cart, go for checkout.";
                    session::flash('error_message',$message);
                    return redirect()->back();
        }

        if (Auth::guard('customer')->check()) {
           $user_id = Auth::guard('customer')->user()->id;
        }else{
            $user_id = 0;
        }

       $data = new Cart();
       $data->session_id = $session_id;
       $data->user_id = $user_id;
       $data->product_id = $request->product_id;
       $data->size_attr_id = $request->size;
       $data->quantity = $request->quantity;
       $data->status = 1;
       $data->save();

       session::flash('success',"Product added to cart.");
       return redirect()->back();

    }

    public function cart()
    {
        $cart_items = Cart::cart_items();
        // echo "<pre>";print_r($cart_items);die;
        $count = Cart::where('user_id',Auth::guard('customer')->user()->id)->count();
        if ($count ==0) {
           Session::forget('coupon_amount');
        }
        return view('front.product.carts')->with(compact('cart_items'));
    }

    public function update_cart(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $cart_qty = Cart::find($data['cartid']);
            // echo "<pre>";print_r($cart_qty);die;

            $available_quantity = ProductAttribute::select('stock')->where(['product_id'=>$cart_qty['product_id'],'id'=>$cart_qty['size_attr_id']])->first()->toArray();
            // echo "<pre>";print_r($available_quantity);die;

            if ($available_quantity['stock']<$data['new_qty']) {
            $cart_items = Cart::cart_items();
                
                return response()->json([
                    'status'=>false,
                    'message'=>'Product Stock is not available.',
                    'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
                ]);
            }
            $available_count = ProductAttribute::where(['product_id'=>$cart_qty['product_id'],'id'=>$cart_qty['size_attr_id']])->count();
            if ($available_count==0) {
                return response()->json([
                    'status'=>false,
                    'message'=>'Product Size is not available.',
                    'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
                ]);
            }

            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['new_qty']]);
            $cart_items = Cart::cart_items();
            // return $cart_items;
            $total_cart_items= total_cart_items();
            return response()->json([
                'status'=>true,
                'total_cart_items'=>$total_cart_items,
                'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
            ]);

        }
    }

    public function delete_pr_cart(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            Cart::find($request->cartid)->delete();
            $cart_items = Cart::cart_items();
            $total_cart_items= total_cart_items();

            return response()->json([
                'total_cart_items'=>$total_cart_items,
                'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
            ]);
        }
    }

    public function check_coupon(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $count = Coupon::where('coupon_code',$request->code_input)->count();
        $cart_items = Cart::cart_items();
        $total_cart_items= total_cart_items();
        // echo "<pre>";print_r($cart_items);die;

        if ($count == 0) {
            Session::forget('coupon_code');
            Session::forget('coupon_amount');
           return response()->json([
               'status'=>false,
               'total_cart_items'=>$total_cart_items,
               'message'=>'This coupon is not valid',
               'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
           ]);
        }else{
            
            $coupon = Coupon::where('coupon_code',$request->code_input)->first();
            // check coupon status
            if ($coupon->status == 0) {
                $message = "This coupon is not active.";
            }
            // check coupon validity
            $current_date = date('Y-m-d');
            if ($coupon->expiry_date<$current_date) {
                Session::forget('coupon_code');
                Session::forget('coupon_amount');

                $message = "This coupons expiry date is over";
            }

            // dd($coupon->coupon_type);
            if ($coupon->coupon_type == "Single Times") {
                $order_count = Order::where(['coupon_code'=> $request->code_input,'user_id'=> Auth::guard('customer')->user()->id])->count(); 
                if ($order_count>=1) {
                    $message = "You have already used this coupon.";
                }
            }

            $categories = explode(',',$coupon->categories);

            if (!empty($coupon->users)) {        

                $users = explode(',',$coupon->users);
                foreach ($users as $key => $value) {
                    $user_id = Customer::where('email',$value)->first()->toArray();
                    $user_id[] = $user_id['id'];
                }
            }
            $total_amount = 0;
            foreach ($cart_items as $key => $value) {
                if (!in_array($value['products']['category_id'],$categories)) {
                    $message = "This coupon code is not for one of the selected products.";
                 }
            if (!empty($coupon->users)) {        

                if (!in_array($value['user_id'],$user_id)) {
                   $message = "This coupon code is not for you.";
                }
            }
                $attr_price = Product::attr_discounted_price($value['product_id'],$value['size_attr_id']);
                // echo "<pre>";print_r($attr_price);die;
                $total_amount = $total_amount + ($attr_price['disc_price']*$value['quantity']);

                // echo $total_amount;
            }
            

            if (isset($message)) {
                return response()->json([
                    'status'=>false,
                    'total_cart_items'=>$total_cart_items,
                    'message'=>$message,
                    'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
                ]);
            }else{

                if ($coupon->amount_type == "Fixed") {
                    $coupon_amount = $coupon->amount;
                } else {
                    $coupon_amount = $total_amount * ($coupon->amount/100);
                }
                // echo $coupon_amount;

                $grand_total = $total_amount - $coupon_amount;
                Session::put('coupon_amount',$coupon_amount);
                Session::put('coupon_code',$request->code_input);

                $message = "Coupon code successfully applied. You are availing discount!";
             
                return response()->json([
                    'status'=>false,
                    'total_cart_items'=>$total_cart_items,
                    'message'=>$message,
                    'coupon_amount'=>$coupon_amount,
                    'grand_total'=>$grand_total,
                    'view'=>(String)View::make('front.product.cart_items')->with(compact('cart_items'))
                ]);
                
            }

        }

    }

    public function checkout(Request $request,$id=null)
    {
        if (request()->isMethod('post')) {
            // echo Session::get('total_amount');
            // dd($request->all());

            if (empty($request->address_id)) {
                $message = "Please select delivery address!";
                session::flash('error',$message);
                return redirect()->back();
            }

            if (empty($request->payment_gateway)) {
                $message = "Please select payment method!";
                session::flash('error',$message);
                return redirect()->back();
            }

            if ($request->payment_gateway == "COD") {
                $payment_method = "COD";
            }else{
                $payment_method = "Prepaid";
                // session::flash('error','Comming soon');
                // return redirect()->back();
            }
// get delivery address
            $delivery_address = DeliveryAddress::where('id',$request->address_id)->first();
            // dd($delivery_address);

            // dd($shipping_charge->shipping_charges);
            $cart_items = Cart::cart_items();
            
            $total_price = 0;
            $total_weight = 0;
            foreach ($cart_items as $item)
            {
                $discount_dtls = Product::attr_discounted_price($item['products_attribute']['product_id'], $item['products_attribute']['id']);
                $total_price = $total_price + $item['quantity'] * $discount_dtls['disc_price'];
                $total_weight = $total_weight + $item['products']['product_weight'];
                
            }
            $shipping_charge = shipping_charge($total_weight,$delivery_address->country);

            $total_amount = $total_price + $shipping_charge - Session::get('coupon_amount');
// dd($total_amount);
            Session::put('total_amount',$total_amount);

            DB::beginTransaction();

            $order = new Order();
            $order->user_id = Auth::guard('customer')->user()->id;
            $order->name = $delivery_address->name;
            $order->address= $delivery_address->address;
            $order->city= $delivery_address->city;
            $order->state= $delivery_address->state;
            $order->country= $delivery_address->country;
            $order->pincode= $delivery_address->pincode;
            $order->mobile= $delivery_address->mobile;
            $order->email= Auth::guard('customer')->user()->email;
            $order->shipping_charges= $shipping_charge;
            $order->coupon_code= Session::get('coupon_code');
            $order->coupon_amount= Session::get('coupon_amount');
            $order->order_status= "New";
            $order->payment_method= $payment_method;
            $order->payment_gateway= $request->payment_gateway;
            $order->grand_total= Session::get('total_amount');
            // dd($order);
            $order->save();

            $last_insert_id = $order->id;

// get user cart details
            $cart_items = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
            // dd($cart_items);

            foreach ($cart_items as $key => $value) {
                $orders_product = new OrdersProduct();
                $orders_product->order_id = $last_insert_id;
                $orders_product->user_id = Auth::guard('customer')->user()->id;
// get product details
                $product_dtls = Product::where('id',$value->product_id)->first();
                // dd($product_details);
                $orders_product->product_id = $value->product_id;
                $orders_product->product_code = $product_dtls->product_code;
                $orders_product->product_name = $product_dtls->product_name;
                $orders_product->product_color = $product_dtls->product_color;
// get product attribute details
                $pro_attr_dtls = ProductAttribute::where('id',$value->size_attr_id)->first();
                // dd($pro_attr_dtls);
                $orders_product->product_size = $pro_attr_dtls->size;
// get discounted attribute price 
                $get_discounted_attr_price = Product::attr_discounted_price($value->product_id,$value->size_attr_id);

                $orders_product->product_price = $get_discounted_attr_price['disc_price'];
                $orders_product->product_qty = $value->quantity;
                $orders_product->save();


            }
            Session::put('order_id',$last_insert_id);

            DB::commit();


            if ($request->payment_gateway == "COD") {
                // $payment_method = "COD";
                
                $order_dtls = Order::with('order_details')->where('id',$last_insert_id)->first();
                $details = [
                    'email'=>Auth::guard('customer')->user()->email,
                    'name'=>Auth::guard('customer')->user()->name,
                    'order_id'=>$last_insert_id,
                    'order_dtls'=>$order_dtls,
                ];
                
// dd($order_dtls->mobile);
// nexmo api for sms
                // Nexmo::message()->send([
                //     'to'=>'88'.$order_dtls->mobile,
                //     'from'=>'8801687663654',
                //     'text'=>'Dear Customer, Your order #'.$last_insert_id.' has been successfully placed with our ecom website. We will intimate you once your order is shipped.',
                // ]);
// dd($details);
                Mail::to(Auth::guard('customer')->user()->email)->send(new OrderedMail($details));
                return redirect('/thanks');

            }else{
                $payment_method = "Prepaid";
                // session::flash('error','Prepaid method comming soon');
                // return redirect()->back();
                return view('front.sslcommerz.sslcommerze_btn');
            }



        }

        // if ($id==0) {
           
        // }

        $cart_items = Cart::cart_items();
        if (empty($cart_items)) {
            session::flash('error','Shopping cart is empty. Please add products to checkout.');
            return redirect()->back();
        }
        
        $total_price = 0;
        $total_weight = 0;
        foreach ($cart_items as $item)
        {
            // dd($item);
            $discount_dtls = Product::attr_discounted_price($item['products_attribute']['product_id'], $item['products_attribute']['id']);
            $total_price = $total_price + $item['quantity'] * $discount_dtls['disc_price'];
            $total_weight = $total_weight + $item['products']['product_weight'];
        }
        // dd($total_weight);
        $delivery_address = DeliveryAddress::where('user_id',Auth::guard('customer')->user()->id)->get();
        foreach ($delivery_address as $key => $value) {
            $shipping_c = shipping_charge($total_weight,$value->country);
            // dd($shipping_c);
            $delivery_address[$key]['shipping_charge'] = $shipping_c;
        }
        // dd($delivery_address);
        // dd(Auth::guard('customer')->user()->id);  
        return view('front.product.checkout')->with(compact('delivery_address','cart_items','total_price'));
    }

    public function add_delivery_address()
    {
        $country = Country::get();
        return view('front.product.add_delivery_address')->with(compact('country'));
    }

    public function submit_delivery_address(Request $request)
    {
        // dd($request->all());

        $rules = [
            'name'=> 'required|regex:/^[\pL\s\-]+$/u',
            'address'=> 'required',
            'city'=> 'required|regex:/^[\pL\s\-]+$/u',
            'state'=> 'required|regex:/^[\pL\s\-]+$/u',
            'country'=> 'required',
            'pincode'=> 'required|numeric|digits:6',
            'mobile'=> 'required|numeric|digits:11',
        ];

        $this->validate($request,$rules);

        $data = new DeliveryAddress();
        $data->user_id = Auth::guard('customer')->user()->id;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->country = $request->country;
        $data->pincode = $request->pincode;
        $data->mobile = $request->mobile;
        $data->save();
        session::flash('success','Delivery address added successfully');
        return redirect('/checkout');

    }

    public function edit_delivery_address($id)
    {
        $address = DeliveryAddress::find($id);
        $country = Country::get();
        return view('front.product.edit_delivery_address')->with(compact('address','country'));
    }

    public function update_delivery_address(Request $request,$id)
    {

        $rules = [
            'name'=> 'required|regex:/^[\pL\s\-]+$/u',
            'address'=> 'required',
            'city'=> 'required|regex:/^[\pL\s\-]+$/u',
            'state'=> 'required|regex:/^[\pL\s\-]+$/u',
            'country'=> 'required',
            'pincode'=> 'required|numeric|digits:6',
            'mobile'=> 'required|numeric|digits:11',
        ];

        $this->validate($request,$rules);

        $data = DeliveryAddress::find($id);
        $data->user_id = Auth::guard('customer')->user()->id;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->country = $request->country;
        $data->pincode = $request->pincode;
        $data->mobile = $request->mobile;
        $data->save();
        session::flash('success','Delivery address updated successfully');
        return redirect('/checkout');

    }

    public function delete_delivery_address($id)
    {
        DeliveryAddress::find($id)->delete();
        session::flash('success','Delivery address deleted successfully.');
        return redirect()->back();
    }

    public function thanks()
    {
        if (Session::has('order_id')) {
            Cart::where('user_id',Auth::guard('customer')->user()->id)->delete();
            return view('front.product.thanks');
        } else {
            $count = Cart::where('user_id',Auth::guard('customer')->user()->id)->count();
            if ($count==0) {
                Session::forget('coupon_amount');
            }
            return redirect('/cart');
        }
        
    }

}
