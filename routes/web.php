<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Category;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// Admin routes
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    // all admin routes are here
    Route::match(['get','post'],'/','AdminController@login');
    
    Route::group(['middleware'=>['admin']],function(){

        Route::get('dashboard','AdminController@dashboard')->name('dashboard');
        Route::get('logout','AdminController@logout')->name('admin_logout');
        Route::get('settings','AdminController@settings')->name('settings');
        Route::post('admin_update_password','AdminController@chkCurrentPassword')->name('admin_update_password');
        Route::post('admins_update_password','AdminController@updateCurrentPassword')->name('admins_update_password');
        Route::match(['get','post'],'admin_details_update','AdminController@admin_details_update')->name('admin_details_update');
        // sections
        Route::get('sections','SectionController@index')->name('section');
        Route::get('add-sections','SectionController@add_section')->name('add_section');
        Route::post('submit-add-section','SectionController@submit_add_section')->name('submit_add_section');
        Route::post('update_section_status','SectionController@update_section_status')->name('update_section_status');
        Route::get('edit-section/{id}','SectionController@edit_section')->name('edit_section');
        Route::post('submit-edit-section/{id}','SectionController@submit_edit_section')->name('submit_edit_section');
        Route::get('delete-section/{id}','SectionController@delete_section')->name('delete_section');
                // brands
        Route::get('brands','BrandsController@index')->name('brands');
        Route::get('add-brands','BrandsController@add_brand')->name('add_brand');
        Route::post('submit-add-brand','BrandsController@submit_add_brand')->name('submit_add_brand');
        Route::post('update_brand_status','BrandsController@update_brand_status')->name('update_brand_status');
        Route::get('edit-brand/{id}','BrandsController@edit_brand')->name('edit_brand');
        Route::post('submit-edit-brand/{id}','BrandsController@submit_edit_brand')->name('submit_edit_brand');
        Route::get('delete-brand/{id}','BrandsController@deletebrand')->name('delete_brand');


        // categories
        Route::get('categories','CategoryController@category')->name('category');
        Route::post('update_category_status','CategoryController@update_category_status')->name('update_category_status');
        Route::get('add-category','CategoryController@add_edit_category')->name('add_category');
        // Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@add_edit_category')->name('add_edit_category');
        Route::post('add-category','CategoryController@add_edit_category')->name('add_category');
        Route::get('edit-category/{id}','CategoryController@add_edit_category')->name('edit_category');
        Route::post('edit-category/{id}','CategoryController@add_edit_category')->name('edit_category');
        Route::post('append-category-level','CategoryController@appendCategoryLevel')->name('append_category_level');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');
        Route::get('delete-category/{id}','CategoryController@deleteCategory')->name('delete_category');
        // Products route here
        Route::get('products','ProductsController@products')->name('products');
        Route::post('update_product_status','ProductsController@update_product_status')->name('update_product_status');
        Route::get('delete-product/{id}','ProductsController@deleteProduct')->name('delete_product');
        Route::get('add-product','ProductsController@addEditProduct')->name('add_product');
        Route::post('add-product','ProductsController@addEditProduct')->name('add_product');
        Route::get('edit-product/{id}','ProductsController@addEditProduct')->name('get_edit_product');
        Route::post('edit-product/{id}','ProductsController@addEditProduct')->name('edit_product');
        // Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');

        // products attributes
        Route::get('product-attributes/{id}','ProductsController@product_attributes')->name('product_attributes');
        Route::post('submit-product-attribute/{id}','ProductsController@submit_product_attribute')->name('submit_product_attribute');
        Route::post('update_product_attribute','ProductsController@update_product_attribute')->name('update_product_attribute');
        Route::post('update_product_attribute_status','ProductsController@update_product_attribute_status')->name('update_product_attribute_status');
        Route::get('delete-product-attribute/{id}','ProductsController@deleteProductAttribute')->name('delete_product_attribute');
        
        // product images
        Route::get('product_images/{id}','ProductsController@product_images')->name('product_images');
        Route::post('submit_product_images/{id}','ProductsController@submit_product_images')->name('submit_product_images');
        Route::post('update_product_images','ProductsController@update_product_images')->name('update_product_images');
        Route::post('update_product_images_status','ProductsController@update_product_images_status')->name('update_product_images_status');
        Route::get('delete-product-images/{id}','ProductsController@deleteProductimages')->name('delete_product_images');

        // Coupons
        Route::resource('coupons', 'CouponsController');
        Route::post('/update_coupons/{id}','CouponsController@update')->name('update_coupons');
        Route::get('/delete_coupons/{id}','CouponsController@destroy')->name('delete_coupons');
        Route::post('/update_coupon_status','CouponsController@update_coupon_status')->name('update_coupon_status');

        // orders
        Route::get('customer-orders','OrdersController@orders')->name('customer_orders');
        Route::get('order-details/{id}','OrdersController@order_details')->name('customer_order_details');
        Route::post('update_order_status/{id}','OrdersController@update_order_status')->name('update_order_status');
        Route::get('order-invoice/{id}','OrdersController@order_invoice')->name('order_invoice');
        Route::get('order-invoice_pdf/{id}','OrdersController@order_invoice_pdf')->name('order_invoice_pdf');

        // shipping charges
        Route::get('shipping_charges','ShippingChargesController@shipping_charges')->name('shipping_charges');
        Route::post('/update_shipping_charges_status','ShippingChargesController@update_shipping_charges_status')->name('update_shipping_charges_status');
        Route::get('shipping_charges_edit/{id}','ShippingChargesController@shipping_charges_edit')->name('shipping_charges_edit');
        Route::post('ship_charge_edit/{id}','ShippingChargesController@ship_charge_edit')->name('ship_charge_edit');
        
    });

});
// Front routes
Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::get('/','IndexController@index')->name('home');
    // Route::get('/{url}','ProductsController@listing')->name('url');
    $cat_url = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
    // echo "<pre>";print_r($cat_url);die;
    foreach ($cat_url as $url) {
            Route::match(['get','post'],'/'.$url,'ProductsController@listing')->name('url');
    }
    Route::get('/product-details/{id}/{product_name}','ProductsController@product_details')->name('product_details');

    Route::post('/get-price','ProductsController@get_price')->name('get_price');

    Route::post('/add_to_cart','ProductsController@add_to_cart')->name('add_to_cart');


    Route::get('/login-register','UsersController@login_register')->name('login_register');

    Route::post('/update_cart','ProductsController@update_cart')->name('update_cart');

    Route::post('/delete_pr_cart','ProductsController@delete_pr_cart')->name('delete_pr_cart');

    Route::post('/register_user_submit','CustomersController@register_user_submit')->name('register_user_submit');

    Route::get('/user_logout','CustomersController@user_logout')->name('user_logout');

    Route::match(['get','post'],'/check_email','CustomersController@check_email')->name('check_email');

    Route::post('/user_login','CustomersController@user_login')->name('user_login');

    Route::any('/confirm_account/{code}','CustomersController@confirm_account')->name('confirm_account');

    Route::any('/forgot_password','CustomersController@forgot_password')->name('forgot_password');

    Route::group(['middleware'=>'customer'],function(){

        Route::get('/cart','ProductsController@cart')->name('cart');

        Route::get('/my_account','CustomersController@my_account')->name('my_account');

        Route::post('/update_account/{id}','CustomersController@update_account')->name('update_account');
    
        Route::post('/check_current_password','CustomersController@check_current_password')->name('check_current_password');
    
        Route::post('/update_password','CustomersController@update_password')->name('update_password');

        Route::post('/check_coupon','ProductsController@check_coupon')->name('check_coupon');

        Route::any('/checkout','ProductsController@checkout')->name('checkout');

        Route::get('add_delivery_address','ProductsController@add_delivery_address')->name('add_delivery_address');

        Route::post('submit_delivery_address','ProductsController@submit_delivery_address')->name('submit_delivery_address');

        Route::get('edit-delivery-address/{id}','ProductsController@edit_delivery_address')->name('edit_delivery_address');

        Route::post('update_delivery_address/{id}','ProductsController@update_delivery_address')->name('update_delivery_address');
        
        Route::get('delete_delivery_address/{id}','ProductsController@delete_delivery_address')->name('delete_delivery_address');
    
        Route::get('thanks','ProductsController@thanks')->name('thanks');

        Route::get('orders','OrdersController@orders')->name('orders');

        Route::get('order-details/{id}','OrdersController@order_details')->name('order_details');

        // SSLCOMMERZ Start
        Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout')->name('example1');
        Route::get('/example2','SslCommerzPaymentController@exampleHostedCheckout')->name('example2');
    
        Route::post('/pay','SslCommerzPaymentController@index');
        Route::post('/pay-via-ajax','SslCommerzPaymentController@payViaAjax');
    
        Route::post('/success','SslCommerzPaymentController@success');
        Route::post('/fail','SslCommerzPaymentController@fail');
        Route::post('/cancel','SslCommerzPaymentController@cancel');
    
        Route::post('/ipn', 'SslCommerzPaymentController@ipn');
        //SSLCOMMERZ END
    });



        

    
});




