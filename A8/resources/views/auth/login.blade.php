@extends('layouts.auth')

@section('body')

<body class="bg-mydark text-center">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <form method="POST" action="{{ route('login') }}"
            class="form-container p-3 rounded bg-white my-auto col-lg-4 col-md-6 col-10">
            {{ csrf_field() }}
            <a href="mainPage.php">
                <img src="{{ asset('img/logo2.png') }}" class="register-logo my-3 " tabindex="1" width="100px"
                    alt="Company Logo">
            </a>
            <h3 class="mb-3 text-mydarkblue">Log in</h3>
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
        <button class="mb-4 btn btn-dark" type="submit" href="{{route('login')}}">Log in</button>
            <div>
                <small class="justify-content-center">
                    Don't have an account?
                    <a class="text-mydarkgreen text-darkgreenh" href="{{ route('signup') }}">Sign up</a>
                </small>
            </div>
        </form>
    </div>
</body>
@endsection
