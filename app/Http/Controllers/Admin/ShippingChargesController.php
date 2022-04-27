<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Session;

class ShippingChargesController extends Controller
{
    public function shipping_charges()
    {
        $shipp_charge = ShippingCharge::all();
        return view('admin.shipping.shipping_charges')->with(compact('shipp_charge'));
    }

    public function update_shipping_charges_status(Request $request)
    {
        $user = ShippingCharge::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Coupon status change successfully.']);
    }

    public function shipping_charges_edit($id)
    {
        $shipp_charge = ShippingCharge::where('id',$id)->first();

        return view('admin.shipping.shipping_charges_edit',compact('shipp_charge'));

    }

    public function ship_charge_edit(Request $request,$id)
    {
        ShippingCharge::where('id',$id)->update([
            '0_500g'=>$request['0_500g'],
            '501_1000g'=>$request['501_1000g'],
            '1001_2000g'=>$request['1001_2000g'],
            '2001_5000g'=>$request['2001_5000g'],
            'above_5000g'=>$request['above_5000g'],
        ]);
        session::flash('success','Shipping Charges Updated Successfully.');
        return redirect()->route('shipping_charges');
    }
}
