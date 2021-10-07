@extends('layouts.app')

@section('registercss')
<link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 column1 d-flex justify-content-center align-items-center">
            <div class="conten text-center">
                <h3>Have an account?</h3>
                <a href="{{ asset('login') }}" class="btn btn-sm">Sign in</a>
                <br />
                <br />
                <img src="{{ asset('/images/svg/register.svg') }}" alt="login">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 column2 d-flex justify-content-center align-items-center">
            <div class="content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="text-center mb-5">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <h1 class="text-center">Sign up</h1>

                    <div class="md-form mt-0">
                        <input type="text" name="username" id="username" class="form-control">
                        <label for="username">Username</label>
                    </div>

                    <div class="md-form mt-0">
                        <input type="email" name="email" id="email" class="form-control">
                        <label for="email">E-mail</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" name="password" id="password" class="form-control">
                        <label for="password">Password</label>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" name="password_confirmation" id="confirmpassword" class="form-control">
                        <label for="confirmpassword">Confirm Password</label>
                    </div>
                    <!-- Sign up button -->
                    <div class="text-center">
                        <button class="btn" type="submit">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
