@extends('layouts.auth')

@section('body')

<body class="bg-mydark text-center">
  <div class="h-100 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{ route('signup') }}"
      class="form-container p-3 rounded col-lg-4 col-md-6 col-10 bg-white my-auto">
      {{ csrf_field() }}
      <a href="mainPage.php">
        <img src="{{ asset('img/logo2.png') }}" class="register-logo my-3 " width="100px" alt="Company Logo">
      </a>
      <h3 class="mb-3 text-mydarkgreen">Sign up</h3>
      <div class="form-group">
        <label class="float-left" for="inputEmail">e-mail</label>
        <input type="email" id="inputEmail" class="form-control" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
        <span class="error">
          {{ $errors->first('email') }}
        </span>
        @endif
      </div>
      <div class="form-group">
        <label class="float-left" for="inputUsername">name</label>
        <input type="text" id="inputUsername" class="form-control" value="{{ old('name') }}" required>
        @if ($errors->has('name'))
        <span class="error">
          {{ $errors->first('name') }}
        </span>
        @endif
      </div>
      <div class="form-group">
        <label class="float-left" for="pass">password</label>
        <input type="password" id="pass" class="form-control" required>
        @if ($errors->has('password'))
        <span class="error">
          {{ $errors->first('password') }}
        </span>
        @endif
      </div>
      <div class="form-group">
        <label class="float-left" for="confirmPass">confirm password</label>
        <input type="password" id="confirmPass" class="form-control" required>
      </div>
      <button class="mb-4 btn btn-dark" type="submit" href="{{ route('signup') }}">Sign up</button>
      <div>
        <small class="justify-content-center">
          Already have an account?
          <a class="text-mydarkblue text-darkblueh" href="{{ route('login') }}">Log in</a>
        </small>
      </div>
    </form>
  </div>
</body>
@endsection
