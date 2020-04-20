@extends('layouts.default')

@section('bodyTag')
<body class="container-fluid vh-100 p-0 m-0">
@endsection

@section('main')
        @include('partials.navBarTop', $search)
        @include('partials.searchMain', $results)
@endsection