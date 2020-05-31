@extends('layouts.auth')

@section('title')
<title>GROW - Sign Up</title>
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
                          alt="Company Logo">
                  </a>
                  <h3 class="mb-3 text-mydarkgreen">Sign up</h3>
              <div>
                  <form method="POST" action="{{ route('signup') }}" class="">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="float-left" for="inputEmail">e-mail</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="error">
                          {{ $errors->first('email') }}
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="float-left" for="inputUsername">name</label>
                        <input type="text" name="name" id="inputUsername" class="form-control" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                        <span class="error">
                          {{ $errors->first('name') }}
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="float-left" for="password">password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @if ($errors->has('password'))
                        <span class="error">
                          {{ $errors->first('password') }}
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="float-left" for="password-confirm">confirm password</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
                      </div>
              <button class="btn btn-dark" type="submit" href="{{route('login')}}">Sign up</button>
              <hr class="my-4">
                      <div class="text-center mb-3">
                        <small class="justify-content-center">
                          Already have an account?
                          <a class="text-mydarkblue text-darkblueh" href="{{ route('login') }}">Log in</a>
                        </small>
                      </div>
              <button class="btn btn-lg btn-block btn-dark" type="submit"><i class="fa fa-google mr-2"></i> Sign up with Google</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection
