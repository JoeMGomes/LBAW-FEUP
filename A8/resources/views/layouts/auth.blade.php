<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/customStyles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/global.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo2.png')}}" />
    @yield('title')

    <!-- Javascript -->
    <script src="{{ asset('js/bootstrap.min.js')}}" defer></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}" defer></script>
    {{-- Google API --}}
    <script src="{{ asset('js/googleAPI.js')}}" defer></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="526719259937-a82vp026vae9un5dfa4qg73244imrv0o.apps.googleusercontent.com">
    
</head>
@yield('body')

</html>