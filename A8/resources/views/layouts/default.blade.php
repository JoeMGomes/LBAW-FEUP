<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/customStyles.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/logo2.png" />
    <title>GROW</title>

    <!-- Javascript -->
    <script src="{{asset('js/bootstrap.min.js')}}" defer></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}" defer></script>
</head>
<body style="background-image: url('{{ asset('img/pattern.png') }}');">

    <!------- 
    NORMAL VERSION 
    -------->
    <nav class="sidebar-lg d-none d-lg-block col-lg-2 ">
        <div
            class="h-100 mh-100 text-center text-white d-flex flex-column align-items-center justify-content-between flex-shrink-0">
            <div class="mh-50">
                <a href="{{route('home')}}">
                    <img src="{{ asset('img/logo.png') }}" class="register-logo mb-5" width="100px" alt="Company Logo">
                </a>
                <a class="w-100 bg-myyellow bg-myyellowh btn rounded large mb-3 text-nowrap px-1"
                    style="font-weight: 700; font-size: 1.2em;" href="{{ route('newQuestion')}}">Post a Question</a>
                <div class="bg-dark w-100 rounded py-2 overflow-hidden mb-3">
                    <a href="#categories" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle m-5 text-white bg-transparent">Categories</a>
                    <ul class="collapse list-unstyled bg-transparent " id="categories">
                        <hr class="my-1 m-0 " style="height: 2px; background-color: #2c2c2c">
                        <li><a class="scroll-link text-white" class="" href="">Laundry</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Cooking</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Health</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Sexuality</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Finances</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Work</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Relationships</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Household</a></li>
                    </ul>
                </div>
            </div>
            @if (Auth::check())
            <div class="d-flex flex-column pb-3 align-items-center w-100">
                <img src="{{asset('img/default.jpg')}}" class="rounded-img " alt="">
                <!-- <h5 class="pt-2 text-white">ADMINISTRATOR</h5> -->
                <h5 class="pt-2 text-white">{{ Auth::user()->name }}</h5>
                <span class="text-white">{{ Auth::user()->score }} points</span>
                <ul class="list-unstyled d-flex flex-column align-items-center mt-5 mb-3">
                    <li><a class="text-white" href="#NOT_IMPLEMENTED">View Activity</a></li>
                    <li><a class="notifications-buttom btn"
                            onclick="open_notifications()">Notifications</a>
                            @include('partials.notificationPopUp')
                    </li>
                    <!-- <li><a class="text-white" href="adminCatMan.php">New Category</a></li> -->
                    <!-- <li><a class="text-white" href="adminRepMan.php">Manage Reports</a></li> -->
                    <li><a class="text-white" href="NOT_IMPLEMENTED">Settings</a></li>
                </ul>
                <button class="btn btn-secondary mb-3 w-100" onclick="document.location='{{route('logout')}}'">Sign
                    out</button>
                <a class="small text-white" href="">About</a>
            </div>
            @else
            <div class=" pb-3 nav flex-column w-100">
                <a class="w-100  btn btn-light mb-2" href="{{ route('signup') }}">Sign up</a>
                <a class="btn btn-secondary mb-5" href="{{ route('login') }}">Log in</a>
                <a class="small text-white" href="{{ route('about') }}">About</a>
            </div>
            @endif

        </div>
    </nav>

    <!--------
    MOBILE VERSION
    -------->

    <div class="overlay d-lg-none"></div>

    <nav class="sidebar d-lg-none d-flex flex-column justify-content-between align-items-center">
        <div class="fixed-box d-flex flex-column align-items-center justify-content-center">
            <a class="fixed-btn dismiss d-flex flex-column justify-content-center align-items-center p-0" href="#">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-light text-dark btn-customized-3 fixed-btn d-flex flex-column justify-content-center align-items-center p-0"
                href="#" role="button" style="position:relative;top:10px">
                <i class="fa fa-arrow-up "></i>
            </a>
        </div>
        <div class="sidebar-header text-center text-white ">
            <div>
                <a href="{{ route('home')}}">
                    <img src="{{asset('img/logo.png')}}" class="register-logo mb-4" width="100px" alt="Company Logo">
                </a>

                <a class="w-100 bg-myyellow btn rounded large mb-3 text-nowrap px-1"
                    style="font-weight: 700; font-size: 1.2em;" href="{{ route('newQuestion')}}">Post a Question</a>
                <div class="bg-dark rounded py-2 overflow-auto mb-3" style="max-height: 150px">
                    <a href="#categories" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle my-5 text-white bg-transparent">Categories</a>
                    <ul class="collapse list-unstyled bg-transparent m-0 " id="categories">
                        <hr class="my-1 m-0 " style="height: 2px; background-color: #2c2c2c">
                        <li><a class="scroll-link text-white" class="" href="">Laundry</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Cooking</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Health</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Sexuality</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Finances</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Work</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Relationships</a></li>
                        <li><a class="scroll-link text-white" class="" href="">Household</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @if (Auth::check())
        <div class="w-100 text-center d-flex flex-column align-items-center">
            <div class="d-flex flex-column align-items-center w-100">
                <img src="{{asset('david.jpg')}}" class="rounded-img " alt="">
                <h5 class="pt-2 text-white">David Dinis</h5>
                <span class="text-white">2309 points</span>
                <ul class="list-unstyled d-flex flex-column align-items-center mt-3 mb-3">
                    <li><a class="text-white" href="NOT IMPLEMENTED">View Activity</a></li>
                    <li><a class="notifications-buttom"
                            onclick="open_notifications()">Notifications</a>
                            @include('partials.notificationPopUp')
                    </li>
                    <li><a class="text-white" href="#NOT_IMPLEMENTED">Settings</a></li>
                </ul>
            <button class="btn btn-secondary mb-2 w-100" onclick="document.location='{{route('logout')}}'">Sign
                    out</button>
            </div>

        @else
        <div class="w-100 text-center d-flex flex-column align-items-center">
            <div class="nav flex-column w-100">
                <a class="w-100  btn btn-light mb-2" href="{{ route('signup')}}">Sign up</a>
                <a class="btn btn-secondary mb-2" href="{{ route('login')}}">Log in</a>
            </div>
        @endif

                <!-- <div class="position-absolute mx-auto d-flex flex-column align-items-middle" style="bottom: 0; "> -->

                <a class="small text-white text-center " href="{{ route('about')}}">About</a>
            </div>
    </nav>
    @yield('main')
</body>
</html>