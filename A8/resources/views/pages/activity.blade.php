@extends('layouts.default')

@section('title')
<title>Activity</title>
@endsection

@section('bodyTag')
<body class=" vh-100 m-0 p-0">
@endsection


@section('main')
@include('partials.navBarTop')
    <main id="main" class="ml-lg-auto col-lg-10  ">
        <h2 class="p-4">Activity Page</h2>


        @foreach($posts as $post)
            @if($post['type']==1)
                @include('partials.activity.activityQuestion', $post)
            @endif
            @if($post['type']==2)
                @include('partials.activity.activityAnswer', $post)
            @endif
            @if($post['type']==3)
                @include('partials.activity.activityComment', $post)
            @endif
        @endforeach

    </main>
@endsection