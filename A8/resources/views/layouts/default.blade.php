<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/customStyles.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo2.png')}}" />
    @yield('title')

    <!-- Javascript -->
    <script src="{{asset('js/bootstrap.min.js')}}" defer></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}" defer></script>
</head>

@yield('bodyTag')

<!--------ONLY ONE VERSION-------->
<nav class="sidebar d-flex flex-column d-lg-block col-lg-2 justify-content-between align-items-center active h-100">
    <div class="d-flex flex-column justify-content-between align-items-center h-100">
    <div class="fixed-box d-flex d-lg-none flex-column align-items-center justify-content-center">
        <a class="fixed-btn dismiss d-flex flex-column justify-content-center align-items-center p-0" href="#">
            <i class="fa fa-arrow-left"></i>
        </a>
        <a class="btn btn-light text-dark btn-customized-3 fixed-btn d-flex flex-column justify-content-center align-items-center p-0 to-top"
            href="#" role="button" style="position:relative;top:10px">
            <i class="fa fa-arrow-up "></i>
        </a>
    </div>
    <div class="sidebar-header text-center text-white">
        <div>
            <a href="{{ route('home')}}">
                <img src="{{asset('img/logo.png')}}" class="register-logo mb-4" width="100px" alt="Company Logo">
            </a>
            @auth('admin')
            @else
            <a class="w-100 bg-myyellow btn rounded large mb-3 text-nowrap px-1"
                style="font-weight: 700; font-size: 1.2em;" href="{{ route('newQuestion')}}">Post a Question</a>
            <div class="bg-dark rounded py-2 overflow-auto mb-3" style="max-height: 150px">
                <a href="#categories" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle my-5 text-white bg-transparent">Categories</a>
                <ul class="collapse list-unstyled bg-transparent m-0 " id="categories">
                    <hr class="my-1 m-0 " style="height: 2px; background-color: #2c2c2c">
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Laundry')}}">Laundry</a></li>
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Cooking')}}">Cooking</a></li>
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Health')}}">Health</a></li>
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Sexuality')}}">Sexuality</a>
                    </li>
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Finances')}}">Finances</a>
                    </li>
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Work')}}">Work</a></li>
                    <li><a class="scroll-link text-white" class=""
                            href="{{url('search/%23Relationships')}}">Relationships</a></li>
                    <li><a class="scroll-link text-white" class="" href="{{url('search/%23Household')}}">Household</a>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
    <div class="w-100 text-center d-flex flex-column align-items-center align-text-bottom ">
        @if (Auth::check())
        <div class="d-flex flex-column align-items-center w-100" ">
            <img src="{{asset('img/'.Auth::user()->photo_url)}}" class="rounded-img " alt="">
            <h5 class="pt-2 text-white">{{Auth::user()->name}}</h5>
            <span class="text-white">{{Auth::user()->score}} points</span>
            <ul class="list-unstyled d-flex flex-column align-items-center mt-3 mb-3">
                <li><a class="text-white" href="NOT IMPLEMENTED">View Activity</a></li>
                <li><a class="notifications-buttom" onclick="open_notifications()">Notifications</a>
                    @include('partials.notificationPopUp')
                </li>
                <li><a class="text-white" href="{{route('settings')}}">Settings</a></li>
            </ul>
            <button class="btn btn-secondary mb-2 w-100" onclick="document.location='{{route('logout')}}'">Sign
                out</button>
        </div>

        @elseif (Auth::guard('admin')->check())
        <div class="d-flex flex-column align-items-center w-100">

            <img src="{{asset('img/adminImage.jpg')}}" class="rounded-img " alt="">
            <h5 class="pt-2 text-white">{{ Auth::guard('admin')->user()->name }}</h5>
            <ul class="list-unstyled d-flex flex-column align-items-center mt-3 mb-3">
                <li><a class="text-white" href="{{route('showRepMan')}}">Report Management</a></li>
                <li><a class="text-white" href="{{route('showCatMan')}}">Category Management</a></li>
                <li><a class="text-white" href="{{route('settings')}}">Settings</a></li>
            </ul>
            <button class="btn btn-secondary mb-3 w-100" onclick="document.location='{{route('logoutAdmin')}}'">Sign
                out</button>
        </div>
        @else
        <div class="w-100 text-center d-flex flex-column align-items-bottom">
            <div class="nav flex-column w-100">
                <a class="w-100  btn btn-light mb-2" href="{{ route('signup')}}">Sign up</a>
                <a class="btn btn-secondary mb-2" href="{{ route('login')}}">Log in</a>
            </div>
            <a class="small text-white text-center " href="{{ route('about')}}">About</a>
        </div>
        @endif
    </div></div>
</nav>
@if(session()->has('successMessage'))
<button id="message" class="float-right m-2 alert alert-success" style="z-index:999" onclick="hideMessage(this)"">
            {{ session()->get('successMessage') }}
        </button>
        @endif
        @if(session()->has('errorMessage'))
        <button id=" message" class="float-right m-2 alert alert-danger " style="z-index:999"
    onclick="hideMessage(this)">
    {{ session()->get('errorMessage') }}
</button>
@endif
@yield('main')
</body>

</html>