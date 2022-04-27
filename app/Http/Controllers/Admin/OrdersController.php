<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use App\Mail\OrderStatusMail;
use Illuminate\Http\Request;
use App\Models\OrderStatus;
use App\Models\OrderStatusLog;
use App\Models\Customer;
use App\Models\Order;
use Session;
use Auth;
use PDF;
class OrdersController extends Controller
{
    public function orders()
    {

        $orders = Order::with('order_details')->orderBy('id','desc')->get();
        // dd($orders);
        return view('admin.orders.orders')->with(compact('orders'));
    }

    public function order_details($id)
    {
        $order = Order::with('order_details')->where('id',$id)->first();
        $user_details = Customer::where('id',$order->user_id)->first();
        $order_status = OrderStatus::where('status',1)->get();
        $order_status_logs = OrderStatusLog::where('order_id',$id)->get();
        // dd($order);

        return view('admin.orders.order_details')->with(compact('order','user_details','order_status','order_status_logs'));

    }

    public function update_order_status(Request $request, $id)
    {
        Order::where('id',$id)->update(['order_status'=>$request->order_status]);

        if (!empty($request->courier_name) && !empty($request->tracking_number)) {
            Order::where('id',$id)->update(['courier_name'=>$request->courier_name,'tracking_number'=>$request->tracking_number]);
        }

        $order_dtls = Order::with('order_details')->where('id',$id)->first();
        $user = Customer::select('email')->where('id',$order_dtls->user_id)->first();
        // dd($order_dtls);
        $details = [
            'email'=>$order_dtls->mobile,
            'name'=>$order_dtls->name,
            'order_id'=>$id,
            'order_status'=>$request->order_status,
            'order_dtls'=>$order_dtls,
        ];
        Mail::to($user->email)->send(new OrderStatusMail($details));
// dd($order_dtls->mobile);
        // Nexmo::message()->send([
        //     'to'=>'88'.$order_dtls->mobile,
        //     'from'=>'8801687663654',
        //     'text'=>'Dear Customer, Your order #'.$id.' status has been update to '.$request->order_status.' placed with our ecom website.',
        // ]);
// dd($details);

        $order_status_log = new OrderStatusLog();
        $order_status_log->order_id = $id;
        $order_status_log->order_status = $request->order_status;
        $order_status_log->save();


        session::flash('success','Order status updated successfully.');
        return redirect()->back();
    }

    public function order_invoice($id)
    {
        $order = Order::with('order_details')->where('id',$id)->first();
        $user_details = Customer::where('id',$order->user_id)->first();
        // $order_status = OrderStatus::where('status',1)->get();
        // $order_status_logs = OrderStatusLog::where('order_id',$id)->get();
        // dd($order);

        return view('admin.orders.order_invoice')->with(compact('order','user_details'))->with('sl',1);

    }

    public function order_invoice_pdf($id)
    {
        $order = Order::with('order_details')->where('id',$id)->first();
        $user_details = Customer::where('id',$order->user_id)->first();
        // $customPaper = array(0,0,720,1440);
        $pdf = PDF::loadView('admin.orders.order_invoice_pdf',compact('order','user_details'))->setPaper('A4', 'Portrait');

        return $pdf->download('order_invoice.pdf');

        // return view('admin.orders.order_invoice')->with(compact('order','user_details'))->with('sl',1);

    }

}
