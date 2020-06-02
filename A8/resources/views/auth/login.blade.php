@extends('layouts.auth')

@section('title')
<title>GROW - Login</title>
@endsection

@section('body')

<body class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-10 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
                <div class="text-center">
                    <a href="{{route('home')}}">
                        <img src="{{ asset('img/logo2.png') }}" class="register-logo my-3 " tabindex="1" width="100px"
                            alt="Grow Logo">
                    </a>
                    <h3 class="mb-3 text-mydarkblue">Log in</h3>
                <div>
                    <form method="POST" action="{{ route('login') }}" class="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="float-left" for="inputEmail">e-mail</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" value="{{ old('email') }}"
                                required autofocus>
                            @if ($errors->has('email'))
                            <span class="error">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="float-left" for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control" value="{{ old('passowrd') }}" required="">
                            @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                <button class="btn btn-dark" type="submit" href="{{route('login')}}">Log in</button>
                <hr class="my-4">
                        <div class="text-center mb-3">
                            <small>
                                Don't have an account?
                                <a class="text-mydarkgreen text-darkgreenh" href="{{ route('signup') }}">Sign up</a>
                            </small>
                        </div>
                    </form>
                <a href="{{url('/googleOAuth')}}"><button class="btn btn-lg btn-block btn-dark" ><i class="fa fa-google mr-2"></i> Sign in with Google</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
@endsection
