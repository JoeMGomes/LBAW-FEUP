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
        <h2 class="px-3 pt-3">Activity Page</h2>

        <div class="px-3 d-flex align-items-center">
            <a class="text-black mr-3 activity-button" href="{{url('activity')}}">
                @if($content ==  'All')
                <span class="text-mydarkblue">
                    All
                </span>
                @else  All
                @endif
            </a>
            <div style="border-left:1px solid rgb(71, 71, 71);height:15px"></div>
            <a class="text-black mx-3 activity-button" href="{{url('activity/questions')}}">
                @if($content ==  'Questions')
                <span class="text-mydarkblue">
                    Questions
                </span>
                @else  Questions
                @endif
            </a>
            <div style="border-left:1px solid #000;height:15px"></div>
            <a class="text-black mx-3 activity-button" href="{{url('activity/answers')}}">
                @if($content ==  'Answers')
                <span class="text-mydarkblue">
                Answer
                </span>
                @else  Answer
                @endif
            </a>
            <div style="border-left:1px solid #000;height:15px"></div>
            <a class="text-black mx-3 activity-button" href="{{url('activity/comments')}}">
                @if($content ==  'Comments')
                <span class="text-mydarkblue">
                Comments
                </span>
                @else  Comments
                @endif
            </a>
        </div>

   

<div class="px-3">
        @if (!$posts)
            <p class="my-4">You have no recent activity! Get started by looking into some <a href="/#popular">popular questions</a>!</p>
        @endif
        @foreach($posts as $post)
            @if($post['type']==1)
                @include('partials.activity.activityQuestion', ['post'=>$post])
            @endif
            @if($post['type']==2)
                @include('partials.activity.activityAnswer', ['post'=>$post])
            @endif
            @if($post['type']==3)
                @include('partials.activity.activityComment', ['post'=>$post])
            @endif
        @endforeach
    </div>

    </main>
@endsection