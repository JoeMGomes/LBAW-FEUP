@extends('layouts.default')

@section('title')
<title>GROW - Search Results</title>
@endsection

@section('bodyTag')
<body class="container-fluid vh-100 p-0 m-0">
@endsection

@section('main')
        @include('partials.navBarTop', $search)
        @include('partials.search.searchMain', $results)
@endsection