<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegistrationMail;
use App\Mail\VerifyRegisterMail;
use App\Mail\PasswordResetMail;
use App\Models\Customer;
use App\Models\Country;
use App\Models\Cart;
use Auth;
use Session;
use DB;
use Nexmo\Laravel\Facade\Nexmo;


class CustomersController extends Controller
{
    //
    public function register_user_submit(Request $request)
    {

        Session::forget('success');
        Session::forget('error');

        $data = $request->all();
        // dd($data);
        $user_count = Customer::where('email',$request->email)->count();
        if ($user_count > 0) {
            $message = "Email already exists.";
            session::flash('error',$message);
            return redirect()->back();
        }else{
             // echo 'asdfdd';die;
             DB::table('customers')->insert([
                 'name' => $request->name,
                 'mobile' => $request->mobile,
                 'email' => $request->email,
                 'password' => bcrypt($request->password),
                 'status' => 0,
             ]);
 
             $details = [
                 'title' => 'Ecommerece Website',
                 'email' => $request->email,
                 'name' => $request->name,
                 'code' => base64_encode($request->email),
             ];

             Mail::to($request->email)->send(new RegistrationMail($details));

            //  if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {

            //     if (!empty(Session::get('session_id'))) {
            //         $user_id = Auth::guard('customer')->user()->id;
            //         $session_id = Session::get('session_id');
            //         Cart::where('session_id',$session_id)->update(['user_id' => $user_id]);
            //     }

// send sms from Nexmo with Vonage API
                // Nexmo::message()->send([
                //     'to'=>'88'.$data['mobile'],
                //     'from'=>'8801687663654',
                //     'text'=>'Welcome to our ecommerce website'
                // ]);
// end send sms from nexmo 
            //     $details = [
            //         'email' => 'E-commerce website',
            //         'body' => 'This is the test mail from website'
            //     ];
            //     Mail::to($request->email)->send(new RegistrationMail($details));

            //     return redirect('/t-shirts');
            //  }

session::flash('success','Email has been send to your account, please verify your account.');
                return redirect()->back();


        }
    }

    public function user_logout()
    {
        session_unset();
        Auth::guard('customer')->logout();
        return redirect('/');
    }


    public function check_email(Request $request)
    {
        $email_count = Customer::where('email',$request->email)->count();

        if ($email_count>0) {
            return "false";
        }else{
            return "true";
        }

    }

    public function user_login(Request $request)
    {
        Session::forget('success');
        Session::forget('error');
        if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])) {

            $customer_status = Customer::where('email',$request->email)->first();
            if ($customer_status->status == 0) {
                Auth::guard('customer')->logout();
                Session::flash('error','Your account has not been activated yet! Please confirm your email to activate your account.');
                return redirect()->back();
            }

            if (!empty(Session::get('session_id'))) {
                $user_id = Auth::guard('customer')->user()->id;
                $session_id = Session::get('session_id');                    
                Cart::where('session_id',$session_id)->update(['user_id' => $user_id]);

            }


            return redirect('/cart');
        }else{
            $message = "Username or password does not match.";
            session::flash('error',$message);
            return redirect()->back();
        }

    }

    public function confirm_account($code)
    {
        // dd(base64_decode($code));
        $email = base64_decode($code);

        $user_count = Customer::where('email',$email)->count();
        if ($user_count>0) {
            $user_acc = Customer::where('email',$email)->first();
            if ($user_acc->status == 1) {
                Session::flash('error','Your account is already activated. Pleas login.');
                return redirect()->back();
            }else{
                Customer::where('email',$email)->update(['status'=>1]);

                $details = [
                    'title' => 'Ecommerce website confirmation',
                    'name' => $user_acc->name,
                    'mobile' => $user_acc->mobile,
                    'email' => $user_acc->email
                ];

                Mail::to($email)->send(new VerifyRegisterMail($details));
                session::flash('success','Your account has been activated. You can login now.');
                return redirect()->back();
            }
        }

    }

    public function forgot_password(Request $request)
    {

        if (request()->isMethod('post')) {
            // dd($request->all());

            $count = Customer::where('email',$request->email)->count();
            if ($count == 0) {
                $message = "This email is not registered yet.";
                Session::put('error',$message); 
                Session::forget('success');
                return redirect()->back();
            }

            $random_pass = str_random(8);
            $new_password = bcrypt($random_pass);
            Customer::where('email',$request->email)->update(['password'=>$new_password]);

            $user_name = Customer::where('email',$request->email)->first();

            $details = [
                'title' => 'Ecommerce Website Password Recovery',
                'name' => $user_name->name,
                'email' => $request->email,
                'password' => $random_pass,
            ];

            Mail::to($request->email)->send(new PasswordResetMail($details));
            $message = "Please check your email for new password";

            Session::flash('success',$message);
            // Session::forget('error');
            return redirect()->back();            

        }

        return view('front.users.forgot_password');
    }


    public function my_account()
    {
        $user = Auth::guard('customer')->user()->id;
        $country = Country::get();
        // dd($country);
        $user_details = Customer::where('id',$user)->first();
        return view('front.users.my_account')->with(compact('user_details','country'));
    }

    public function update_account(Request $request,$id)
    {
        // dd($request->all());

        $rules = [
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'mobile'=>'required',
            // 'address'=>'required',
        ];
        $custom_message = [
            'name.required' => 'Name field is required',
            'name.regex' => 'Valid name is required',
            'mobile.required' => 'Mobile field is required',
            // 'address.required' => 'Address field is required',
        ];
        $this->validate($request,$rules,$custom_message);

        $data = Customer::find($id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->country = $request->country;
        $data->pincode = $request->pincode;
        $data->mobile = $request->mobile;
        $data->save();

        Session::flash('success','Account updated successfully.');
        return redirect()->back();

        // $data->
    }

    public function check_current_password(Request $request)
    {
        // dd('asdfsdfd');
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        $user_id = Auth::guard('customer')->user()->id;
        $user_dtls = Customer::where('id',$user_id)->first();
        if (Hash::check($request->current_password,$user_dtls->password)) {
            return "true";
        }else{
            return "false";
        }

    }

    public function update_password(Request $request)
    {
        // dd('asdfsdfd');
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        $user_id = Auth::guard('customer')->user()->id;
        $user_dtls = Customer::where('id',$user_id)->first();
        if (Hash::check($request->current_password,$user_dtls->password)) {
            if ($request->new_password == $request->confirm_password) {
                $password = bcrypt($request->new_password);
                Customer::where('id',$user_id)->update(['password'=>$password]);
                session::flash('success','Password updated successfully');
                return redirect()->back();
            } else {
                session::flash('error','New password and confirm password have to be same.');
                return redirect()->back();
            }
            
        }else{
            session::flash('error','Current password is not correct');
                return redirect()->back();
        }

    }


    

}
