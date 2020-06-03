@extends('layouts.default')

@section('title')
<title>GROW - Bookmarks</title>
@endsection

@section('bodyTag')
<body class="container-fluid vh-100 p-0 m-0">
    @endsection

@section('main')
@include('partials.menuBtnHome')

<div class="py-2"></div>
@include('partials.search.searchMain', $results)
@endsection
