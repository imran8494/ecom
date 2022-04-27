@php
    use App\Models\Product;
@endphp
@extends('layouts.front_layouts.front_layout')
@section('content')

<section id="form"><!--form-->
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{Session::get('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
              {{Session::get('error')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form id="login_form" action="{{ route('user_login') }}" method="post">
                        {{-- <input type="text" required name="name" placeholder="Name" /> --}}
                        <input type="email" required name="email" placeholder="Email Address" />
                        <input type="password" required name="password" placeholder="Password" />
                        <div class="clearfix">
                            <span class="col-md-7">
                                <input type="checkbox" /*name="agree"*/ class="checkbox"> 
                                Keep me signed in 
                            </span>
                            <span><a class="col-md-5" href="{{ route('forgot_password') }}" >Forgot Password ?</a></span>
                        </div>
                            <p style="margin-left:-20px;" id="append"></p>

                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Forgot Password!</h2>
                    <form action="{{ route('forgot_password') }}" method="post">
                        
                        <input type="email" required name="email" id="email" placeholder="Email Address" />
                        
                        <button type="submit" required class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->






@endsection
