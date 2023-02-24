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
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-b-20">
                                <div class="col-xs-12">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="email" required="" name="email" value="{{ old('email') }}" required autofocus placeholder="Email address">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-b-20">
                                <div class="col-xs-12">
                                    <!-- <a href="{{ route('password.request') }}" class="text-muted pull-right font-14">Forgot your password?</a> -->
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-b-30">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox5" type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox5">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>
            <!-- end wrapper -->
        </div>
    </div>
</div>
@endsection