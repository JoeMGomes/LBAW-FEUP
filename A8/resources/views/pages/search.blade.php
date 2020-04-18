@extends('layouts.default')

@section('main')
        @include('partials.navBarTop', $search)
        @include('partials.searchMain', $results)
@endsection