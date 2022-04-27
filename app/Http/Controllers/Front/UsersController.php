<?php

namespace App\Http\Controllers\Front;
// use App\Helpers\UserSystemInfoHelper;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use DB;
class UsersController extends Controller
{
    //
    public function login_register()
    {
        // $getip = UserSystemInfoHelper::get_ip();

        // $ip = '24.156.99.202';

        // $data = \Location::get($ip);

        return view('front.users.login_register');
    }

    public function register_user_submit(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $user_count = User::where('email',$request->email)->count();
        if ($user_count > 0) {
            $message = "Email already exists.";
            session::flash('error',$message);
            return redirect()->back();
        }else{
             // echo 'asdfdd';die;
             DB::table('users')->insert([
                 'name' => $request->name,
                 'mobile' => $request->mobile,
                 'email' => $request->email,
                 'password' => bcrypt($request->password),
                 'status' => 1,
             ]);
 
             if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                 return redirect('/');
             }

        }
    }

    public function user_logout()
    {
        Auth::logout();
        return redirect('/');
    }

    

}
