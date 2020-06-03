@extends('layouts.default')

@section('title')
<title>GROW</title>
@endsection

@section('bodyTag')
<body style="background-image: url('{{ asset('img/pattern.png') }}');">
@endsection

@section('main')
@include('partials.menuBtnHome')

@include('partials.home.searchBarMain')
@endsection