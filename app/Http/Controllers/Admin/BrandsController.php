<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use Validator;

class BrandsController extends Controller
{
    public function index()
    {  

        Session::put('page','brands');

        $data = Brand::get();

        // dd($data);die();
        return view('admin.brands.brands',compact('data'));
    }

    public function update_brand_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            // echo "<pre>";print_r($data);die();

            if($data['brand_status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
        }
    }

    public function add_brand()
    {
        return view('admin.brands.add_brands');
    }


    public function submit_add_brand(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'brand_name'=>'required',
        ]);

        if ($validator->passes()) {
            
        

        $data = new Brand();
        $data->brand_name = $request->brand_name;
        $data->status = $request->status;
        $data->save();

        return response()->json(['title'=>'Success','success_msg'=>'Brand submitted successfully.']);
        }
        return response()->json(['title'=>'Warning','error_msg'=>$validator->errors()->all()]);

    }

    public function edit_brand($id)
    {
        // dd($id);
        $data = Brand::find($id);
        return view('admin.brands.edit_brands', compact('data'));
    }

    public function submit_edit_brand(Request $request,$id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'brand_name' => 'required',
        ]);

        if ($validator->passes()) {
            $data = Brand::find($id);
            $data->brand_name = $request->brand_name;
            $data->status = $request->status;
            $data->save();

            return response()->json(['title'=>'Success', 'success_msg'=>'Brands updated successfully.']);

        }
        return response()->json(['title'=>'Warning', 'error_msg'=> $validator->errors()->all()]);


    }

    public function deletebrand($id)
    {
        $data = Brand::where('id',$id)->first();       

        $data->delete();

        session::flash('success','Brand Deleted Successfully!');
        return redirect()->back();
    }
}
