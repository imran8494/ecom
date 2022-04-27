<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Section;
use Session;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo "adsf";die;
        $coupon = Coupon::get();
        // dd($coupon);
        return view('admin.coupons.coupons')->with(compact('coupon'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = Customer::get();
        $categories = Section::with('categories')->get();
        return view('admin.coupons.add_coupons')->with(compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $rules =[
            'categories'=>'required',
            'coupon_option'=>'required',
            'coupon_type'=>'required',
            'amount_type'=>'required',
            'amount'=>'required|numeric',
            'expiry_date'=>'required'
        ];
        $message = [
            'categories.required'=>'Category field is required',
            'coupon_option.required'=>'Coupon option field is required',
            'coupon_type.required'=>'Coupon type field is required',
            'amount_type.required'=>'Amount type field is required',
            'amount.required'=>'Amount field is required',
            'amount.numeric'=>'Amount field has to be numeric',
            'expiry_date.required'=>'Expiry date field is required',
        ];

        $this->validate($request,$rules,$message);

        $users = ($request->users) ? implode(',',$request->users) :'';
        $categories = ($request->categories) ? implode(',',$request->categories) :'';
        $coupon_code = (isset($request->coupon_code))?$request->coupon_code:str_random(8);

    //    $coupon_code = str_random(8,$request->coupon_code);
    //    dd($coupon_code);
        $data = new Coupon();
        $data->coupon_option = $request->coupon_option;
        $data->coupon_code = $coupon_code;
        $data->coupon_type = $request->coupon_type;
        $data->amount_type = $request->amount_type;
        $data->amount = $request->amount;
        $data->categories = $categories;
        $data->users = $users;
        $data->expiry_date = $request->expiry_date;
        $data->status = 1;
        $data->save();

        $message = "Coupons added successfully.";
        session::flash('success',$message);
        return redirect('admin/coupons');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = Customer::get();
        $categories = Section::with('categories')->get();
        $coupons = Coupon::find($id);
        $coupons_category = explode(',',$coupons->categories);
        $coupons_users = explode(',',$coupons->users);
        return view('admin.coupons.edit_coupons')->with(compact('coupons','users','categories','coupons_category','coupons_users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rules =[
            'categories'=>'required',
            // 'coupon_option'=>'required',
            'coupon_type'=>'required',
            'amount_type'=>'required',
            'amount'=>'required|numeric',
            'expiry_date'=>'required'
        ];
        $message = [
            'categories.required'=>'Category field is required',
            // 'coupon_option.required'=>'Coupon option field is required',
            'coupon_type.required'=>'Coupon type field is required',
            'amount_type.required'=>'Amount type field is required',
            'amount.required'=>'Amount field is required',
            'amount.numeric'=>'Amount field has to be numeric',
            'expiry_date.required'=>'Expiry date field is required',
        ];

        $this->validate($request,$rules,$message);

        $users = ($request->users) ? implode(',',$request->users) :'';
        $categories = ($request->categories) ? implode(',',$request->categories) :'';
        // $coupon_code = (isset($request->coupon_code))?$request->coupon_code:str_random(8);

    //    $coupon_code = str_random(8,$request->coupon_code);
    //    dd($coupon_code);
        $data = Coupon::find($id);
        // $data->coupon_option = $request->coupon_option;
        // $data->coupon_code = $coupon_code;
        $data->coupon_type = $request->coupon_type;
        $data->amount_type = $request->amount_type;
        $data->amount = $request->amount;
        $data->categories = $categories;
        $data->users = $users;
        $data->expiry_date = $request->expiry_date;
        $data->status = 1;
        $data->save();

        $message = "Coupons updated successfully.";
        session::flash('success',$message);
        return redirect('admin/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Coupon::findOrFail($id);

        $student->delete();
        session::flash('success','Coupon deleted successfully.');
        return redirect()->back();
    }


    public function update_coupon_status(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $user = Coupon::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Coupon status change successfully.']);
    }

}
