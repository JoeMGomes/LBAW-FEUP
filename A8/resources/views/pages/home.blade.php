@extends('layouts.default')

@section('title')
<title>GROW</title>
@endsection

@section('bodyTag')
<body style="background-image: url('{{ asset('img/pattern.png') }}');">
@endsection

@include('partials.menuBtnHome')

@include('partials.home.searchBarMain')
