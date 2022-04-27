<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\Brand;
use Session;
use Image;

class ProductsController extends Controller
{
    //
    public function products()
    {
        Session::put('page','products');
        $products = Product::with(['category'=>function($query){
            $query->select('id','category_name')->where('status',1);
        },'section'=>function($query){
            $query->select('id','name')->where('status',1);
        }])->get();
        // $products = json_decode(json_encode($products));
        // echo "<pre>";print_r($products);die();

        return view('admin.products.products',compact('products'))->with('sl',1);
    }

    public function update_product_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // echo "<pre>";print_r($data);die();

            if($data['product_status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            Product::where('id',$data['product_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }

    public function deleteProduct($id)
    {
        $data = Product::where('id',$id)->first();

        if ($data->product_image !=null) {
            $img_path = 'images/product_images/'.$data->product_image;

            if (file_exists($img_path)) {
               unlink($img_path);
            }
        }
        
        $data->delete();

        Session::flash('success','Product Deleted Successfully!');
        return redirect()->back();
    }

    public function addEditProduct(Request $request, $id=null)
    {
        if ($id=="") {
            $title = "Add Product";
            $getdata = new Product;
            $message = 'Product added successfully.';
            // $categories = array();
            // $getdata =array();
        }else{
            $title = "Edit Product";
            $getdata = Product::find($id);
            $message = 'Product updated successfully.';

        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // $data = json_decode(json_encode($data));
            // echo "<pre>";print_r($data);die();

            $rules = [
                'category_id'=>'required',
                'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=>'required|regex:/^[\w-]*$/',
                'product_price'=>'required|numeric',
                'product_color'=>'required|regex:/^[\pL\s\-]+$/u',
            ];

            $this->validate($request, $rules);

            if (empty($data['is_featured'])) {
                $is_featured = "No";
            }else{
                $is_featured = "Yes";
            }

            if (empty($data['product_price'])) {
                $data['product_price'] = 0;
            }
            if (empty($data['product_weight'])) {
                $data['product_weight'] = 0;
            }
            if (empty($data['product_discount'])) {
                $data['product_discount'] = 0;
            }
            if (empty($data['description'])) {
                $data['description'] = "";
            }
            if (empty($data['wash_care'])) {
                $data['wash_care'] = "";
            }
            if (empty($data['meta_title'])) {
                $data['meta_title'] = "";
            }
            if (empty($data['meta_description'])) {
                $data['meta_description'] = "";
            }
            if (empty($data['meta_keywords'])) {
                $data['meta_keywords'] = "";
            }
            if (empty($data['description'])) {
                $data['description'] = "";
            }
            if (empty($data['fabric'])) {
                $data['fabric'] = "";
            }
            if (empty($data['sleeve'])) {
                $data['sleeve'] = "";
            }
            if (empty($data['fit'])) {
                $data['fit'] = "";
            }
            if (empty($data['occasion'])) {
                $data['occasion'] = "";
            }
            if (empty($data['pattern'])) {
                $data['pattern'] = "";
            }

            if ($request->hasFile('product_image')) {
                $img_tmp = $request->file('product_image');

                if ($img_tmp->isValid()) {
                    $img_name = $img_tmp->getClientOriginalName();
                    $img_name = explode('.', $img_name)[0];
                    // echo "<pre>";print_r($img_name);die();

                    $img_ext = $img_tmp->getClientOriginalExtension();
                    $imgName = $img_name.'-'.rand().'.'.$img_ext;
                    // dd($imgName);

                    $featured_images = 'images/product_images/featured_images/'.$imgName;
                    $tab = 'images/product_images/tab/'.$imgName;
                    $recommended = 'images/product_images/recommended/'.$imgName;
                    $details = 'images/product_images/details/'.$imgName;
                    $cart = 'images/product_images/cart/'.$imgName;
    


                    $lrg_img_path = 'images/product_images/large/'.$imgName;
                    $mdm_img_path = 'images/product_images/medium/'.$imgName;
                    $sm_img_path = 'images/product_images/small/'.$imgName;

                    Image::make($img_tmp)->resize(268,249)->save($featured_images);
                    Image::make($img_tmp)->resize(207,183)->save($tab);
                    Image::make($img_tmp)->resize(268,134)->save($recommended);
                    Image::make($img_tmp)->resize(266,381)->save($details);
                    Image::make($img_tmp)->resize(110,110)->save($cart);    

                    Image::make($img_tmp)->resize(1040,1200)->save($lrg_img_path);
                    Image::make($img_tmp)->resize(520,600)->save($mdm_img_path);
                    Image::make($img_tmp)->resize(260,300)->save($sm_img_path);
                    $getdata->product_image = $imgName;
                }
            }

            if ($request->hasFile('product_video')) {
                $video_tmp = $request->file('product_video');
                if ($video_tmp->isValid()) {
                    $video_name = $video_tmp->getClientOriginalName();
                    $video_name = explode('.', $video_name)[0];
                    $video_ext = $video_tmp->getClientOriginalExtension();
                    $videoName = $video_name.'-'.rand().'.'.$video_ext;
                    $video_path = 'videos/product_videos/';
                    $video_tmp->move($video_path,$videoName);

                    $getdata->product_video = $videoName;
                }
            }

            $categories = Category::find($data['category_id']);
            // dd($categories);
            $getdata->section_id = $categories['section_id'];
            $getdata->brand_id = $data['brand_id'];
            $getdata->category_id = $data['category_id'];
            $getdata->product_code = $data['product_code'];
            $getdata->product_name = $data['product_name'];
            $getdata->product_color = $data['product_color'];
            $getdata->product_price = $data['product_price'];
            $getdata->product_weight = $data['product_weight'];
            $getdata->product_discount = $data['product_discount'];
            $getdata->description = $data['description'];
            $getdata->fabric = $data['fabric'];
            $getdata->sleeve = $data['sleeve'];
            $getdata->pattern = $data['pattern'];
            $getdata->fit = $data['fit'];
            $getdata->occasion = $data['occasion'];
            $getdata->wash_care = $data['wash_care'];
            $getdata->meta_title = $data['meta_title'];
            $getdata->meta_description = $data['meta_description'];
            $getdata->meta_keywords = $data['meta_keywords'];
            $getdata->meta_keywords = $data['meta_keywords'];
            $getdata->is_featured = $is_featured;
            $getdata->status = 1;
            // dd($product);
            $getdata->save();
            session::flash('success',$message);
            return redirect('/admin/products');

        }

// product filters
        $product_filter = Product::product_filters();
        $fabric = $product_filter['fabric'];
        $sleeve = $product_filter['sleeve'];
        $pattern = $product_filter['pattern'];
        $fit = $product_filter['fit'];
        $occasion = $product_filter['occasion'];
// get section categories and subcategories 
        $categories = Section::with('categories')->get();
        $brands = Brand::select('id','brand_name')->where('status',1)->get();
        // $brands = json_decode(json_encode($brands),true);
        // echo "<pre>";print_r($brands); die();

        return view('admin.products.add_edit_product',compact('brands','getdata','title','fabric','pattern','sleeve','fit','occasion','categories','product'));
    }


    public function product_attributes($id)
    {
        $data = Product::select('id','product_name','product_code','product_color','product_image')->with('attributes')->find($id);
        // $data = json_decode(json_encode($data));
        // echo "<pre>";print_r($data);die;
        return view('admin.products.product_attributes',compact('data'))->with('sl',1);
    }


    public function submit_product_attribute(Request $request,$id)
    {
        $attr = $request->all();
        foreach ($attr['sku'] as $key => $value) {
            if (!empty($value)) {

                // check sku already exists or not
                $skucount = ProductAttribute::where(['product_id'=>$id,'sku'=>$value])->count();
                if ($skucount>0) {
                    session::flash('error_message','Sku already exists. Please add another sku.');
                    return redirect()->back();
                }
                // check size count
                $skucount = ProductAttribute::where(['product_id'=>$id,'size'=>$request->size[$key]])->count();
                if ($skucount>0) {
                    session::flash('error_message','Size already exists. Please add another size.');
                    return redirect()->back();
                }

                $data = new ProductAttribute();
                $data->product_id = $id;
                $data->size = $request->size[$key];
                $data->price = $request->price[$key];
                $data->stock = $request->stock[$key];
                $data->sku = $value;
                $data->status = 1;
                $data->save();
            }
            
        } 
        session::flash('success','Product attribure added successfully.');
        return redirect()->back();
        
    }

    public function update_product_attribute(Request $request)
    {
        foreach ($request->attribute_id as $key => $value) {
            ProductAttribute::where(['id'=>$request->attribute_id[$key]])->update(['price'=>$request->price[$key],'stock'=>$request->stock[$key]]);
        }
        session::flash('success','Attribute updated successfully.');
        return redirect()->back();
    }

    public function update_product_attribute_status(Request $request)
    {
        if ($request->ajax()) {
            // $data = $request->all();
            // return $data;die;
           if ($request->attribute_status == "Active") {
               $status = 0;
           }else{
               $status = 1;
           }

           ProductAttribute::where(['id'=>$request->attribute_id])->update(['status'=>$status]);

           return response()->json(['status'=>$status,'attribute_id'=>$request->attribute_id]);

        }
    }


    public function deleteProductAttribute($id)
    {
        ProductAttribute::find($id)->delete();
        session::flash('success','Product attribute deleted successfully.');
        return redirect()->back();
    }


    public function product_images($id)
    {
        $data = Product::select('id','product_name','product_code','product_color','product_image')->with('multiple_images')->find($id);
        // $data = json_decode(json_encode($data));
        // echo "<pre>";print_r($data);die;
        return view('admin.products.product_images',compact('data'))->with('sl',1);
    }


    public function submit_product_images(Request $request,$id)
    {
        // dd('adsfdsf');
        // $data = $request->all();

        

        if ($request->hasFile('images')) {

            foreach ($request->images as $key => $image) {
                $prd_image = new ProductImage();
                $image_tmp = Image::make($image);

                $ext = $image->getClientOriginalExtension();
                $image_name = rand(111,99999).time().'.'.$ext;

                $details_slider = 'images/product_images/details_slider/'.$image_name;
                $large_image_path = 'images/product_images/large/'.$image_name;
                $medium_image_path = 'images/product_images/medium/'.$image_name;
                $small_image_path = 'images/product_images/small/'.$image_name;

                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(85,84)->save($details_slider);
                Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(260,300)->save($small_image_path);
                $prd_image->images = $image_name;
                $prd_image->product_id = $id;
                $prd_image->status = 1;
                $prd_image->save();
            }

        }

        session::flash('success','Product image added successfully.');
        return redirect()->back();
    }

    public function update_product_images_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // echo "<pre>";print_r($data);die();

            if($data['images_status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            ProductImage::where('id',$data['images_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'images_id'=>$data['images_id']]);
        }
    }

    public function deleteProductimages($id)
    {
        $data = ProductImage::where('id',$id)->first();

        $small_image_path = 'images/product_images/small/';
        $medium_image_path = 'images/product_images/medium/';
        $large_image_path = 'images/product_images/large/';

        if (file_exists($small_image_path.$data->images)) {
            unlink($small_image_path.$data->images);
        }

        if (file_exists($medium_image_path.$data->images)) {
            unlink($medium_image_path.$data->images);
        }

        if (file_exists($large_image_path.$data->images)) {
            unlink($large_image_path.$data->images);
        }

        $data->delete();

        Session::flash('success','Product Images Deleted Successfully!');
        return redirect()->back();
    }

}
