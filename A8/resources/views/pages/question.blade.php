@extends('layouts.default')

@section('title')
<title>GROW - Post</title>
@endsection

@section('bodyTag')
<body class="container-fluid vh-100 m-0 p-0 bg-mygrey">
@endsection

@section('main')
@include('partials.navBarTop')
<main id="main" class="ml-auto col-lg-10 px-md-5 mb-3">
    <div class="py-4 px-5 border bg-white">
        <!-- Question -->
        <div class=" d-flex mb-3 ">
            <div class="flex-column d-none d-md-flex ">
                <img src="{{ asset('img/'.$question['photo_url']) }}" class="rounded-img " alt="User Photo" />
                <small class="text-center mt-2">{{$question['name']}}</small>
            </div>
            <div class="ml-4">
                <h1> <small>(<u>Edited</u>)</small> {{$question['title']}}</h1>
                <p class="text-justified ">
                    {{$question['text']}}
                </p>
                <div class="d-flex row align-items-end justify-content-between">
                    <div class="col-lg-8">
                        @foreach($question['categories'] as $category)
                            @include('partials.question.tag', $category)
                        @endforeach
                    </div>
                    <div class="text-right col-lg-4 text-nowrap">
                        <small> Asked on {{date('M d, Y @ H:i ', strtotime($question['date']))}} </small>
                        @include('partials.report')
                    </div>
                </div>
            </div>
        </div>
        @isset($question['best_answer_info'])
            @include('partials.question.bestAnswer', ['answer' => $question['best_answer_info']])
        @endisset
        @foreach($answers as $answer)
            @include('partials.question.answer', $answer)
        @endforeach
    </div>
</main>
@endsection