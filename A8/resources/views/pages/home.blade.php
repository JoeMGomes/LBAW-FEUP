@extends('layouts.default')

@section('bodyTag')
<body style="background-image: url('{{ asset('img/pattern.png') }}');">
@endsection

@include('partials.menuBtnHome')

@include('partials.searchBarMain')
