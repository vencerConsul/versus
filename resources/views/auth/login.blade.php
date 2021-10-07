@extends('layouts.app')

@section('logincss')
<link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 column1 d-flex justify-content-center align-items-center">
            <div class="conten text-center">
                <h3>Have an account?</h3>
                <a href="{{ asset('register') }}" class="btn btn-sm">Sign up</a>
                <br />
                <br />
                <img src="{{ asset('/images/svg/register.svg') }}" alt="login">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 column2 d-flex justify-content-center align-items-center">
            <div class="content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center mb-5">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <h1 class="text-center">Sign up</h1>

                    <div class="md-form mt-0">
                        <input id="email" type="email" class="form-control text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        <label for="username">Username</label>
                    </div>

                    <div class="md-form mt-0">
                        <input id="password" type="password" class="form-control text-white @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        <label for="password">Password</label>
                    </div>
                    <!-- Sign up button -->
                    <div class="text-center">
                        <button class="btn" type="submit">Sign up</button>
                        <br />
                        <br />
                        @if (Route::has('password.request'))
                        <a class="text-white" href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
