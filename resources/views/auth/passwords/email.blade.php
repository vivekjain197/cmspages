@extends('layouts.login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="wrapper-page">
                <div class="m-t-40 card-box">
                    <div class="text-center">
                        <h2 style="background-color: #0055A0; padding: 5px;" class="text-uppercase m-t-0 m-b-30">
                        <a href="javascript:void(0)"  class="text-success">
                            <span><img src="{{ asset('images/logo.png') }}" alt="" height="60"></span>
                        </a>
                        </h2>
                        <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                    </div>
                    <div class="account-content">
                        <div class="text-center m-b-20">
                            <p class="text-muted m-b-0 line-h-24">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-b-20">
                                <div class="col-xs-12">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="email" value="{{ old('email') }}" name="email" required="" placeholder="Email address">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-custom btn-block" type="submit">Reset Password</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- end card-box-->
                <div class="row m-t-50">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">Back to <a href="{{ route('login')}}" class="text-dark m-l-5">Sign In</a></p>
                    </div>
                </div>
            </div>
            <!-- end wrapper -->
        </div>
    </div>
</div>
@endsection