@extends('layouts.app')

@section('title')
Homepage
@endsection

@section('homepagecss')
<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
@endsection

@section('content')
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent scrolling-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand">Versus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="basicExampleNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-center">
                        @if(Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <main class="text-center text-white">
            <h1 class="display-4">Grab your Team Now</h1>
            <h5>Look for a team and math with your opponent</h5>
            @if(Route::has('register'))
            <a class="btn" href="{{ route('register') }}">REGISTER</a>
            @endif
        </main>
    </div>
</header>

<section class="section1">
    <div class="container">
        <div class="card first-line">
            <div class="card second-line">
                <h5>MAKE YOUR OWN TEAM AND MAKE A MATCH WITH RANDOM TEAM</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto reprehenderit alias culpa enim sed explicabo omnis ullam. Totam, earum, excepturi ipsum quod iure molestiae perspiciatis error officia dolore soluta hic alias ipsam eum cumque? Veritatis repudiandae ad illum nostrum officia nihil maiores provident eos sit, id saepe recusandae quam! Quisquam?</p>
            </div>
        </div>
        <hr>
    </div>
</section>

<section class="section2">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card first-line">
            <div class="card second-line">
                <h5>Here are the multiplayer battle games</h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="images">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/lol.png') }}" alt="lol">
                </div>
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/dota.png') }}" alt="lol">
                </div>
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/ml.png') }}" alt="lol">
                </div>
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/lol-mobile.png') }}" alt="lol">
                </div>
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/aov.png') }}" alt="lol">
                </div>
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/valorant.png') }}" alt="lol">
                </div>
                <div class="col-lg-4 col-6">
                    <img class="img-fluid" src="{{ asset('images/vain-glory.png') }}" alt="lol">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-center font-weight-bold"> Ver<span>sus</span></h1>
                <form>
                    <div class="form-group">
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <div class="input-group-prepend">
                                <button class="btn btn-md btn-danger m-0 px-3 py-2 z-depth-0 waves-effect" type="button">SUBSCRIBE</button>
                            </div>
                        </div>
                    </div>
                </form>
                <h5 class="text-white text-center">Subscibe today to get the latest news & updates</h5>
            </div>
            <div class="col-lg-6">
                <h1 class="text-center text-white"> Follow us on</h1>
                <div class="follow mt-4 d-flex justify-content-center align-items-center">
                    <div class="icon">
                        <i class="fab fa-facebook text-white"></i>
                        <i class="fab fa-twitter text-white"></i>
                        <i class="fab fa-instagram text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="text-center text-white p-3">Versus 2020</footer>
@endsection
