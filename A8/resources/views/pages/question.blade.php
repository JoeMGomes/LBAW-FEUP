@extends('layouts.default')

@section('title')
<title>GROW - {{$question['title']}}</title>
@endsection

@section('bodyTag')
<body class="container-fluid vh-100 m-0 p-0 bg-mygrey">
@endsection

@section('main')
@include('partials.navBarTop')
<main id="main" class="ml-auto col-lg-10 pr-md-5 mb-3">
    <div class="py-4 px-4 border bg-white">
        <!-- Question -->
        <div class=" d-flex mb-3 mr-5 ml-3">
            <div class="flex-column d-none d-md-flex ">
                <img src="{{ asset('img/'.$question['photo_url']) }}" class="rounded-img " alt="User Photo" />
                <small class="text-center mt-2">{{$question['name']}}</small>
            </div>
            <div class="w-100 ml-4">
                 <h1>
                    {{-- <small>(<u>Edited</u>) </small>  --}}
                    {{$question['title']}}
                </h1> 
                <p class="text-justified">
                    {!! Illuminate\Mail\Markdown::parse(nl2br(e($question['text']))) !!}
                </p>
                <div class="d-flex row align-items-end justify-content-between">
                    <div class="ml-2 pl-1">
                        @foreach($question['categories'] as $category)
                            @include('partials.question.tag', $category)
                        @endforeach
                    </div>
                    <div class="text-right text-nowrap d-flex">
                        <small class="my-auto"> Asked on {{date('M d, Y @ H:i ', strtotime($question['date']))}} </small>
                        @include('partials.question.deleteQuestion')
                        @include('partials.report', ['id' => $question['id']])
                    </div>
                </div>
            </div>
        </div>


        @isset($question['best_answer_info'])
            @include('partials.question.bestAnswer', ['answer' => $question['best_answer_info']])
        @endisset


        @if(Auth::check())
            @if($question['owner'] != Auth::user()->id)
                @include('partials.question.answerInput', ['username' => $question['name'], 'question_id' =>$question['id']])
            @endif
        @endif

        @php
        {{ $questionOwner = Auth::check() && Auth::user()->id == $question['owner'];}}
        @endphp

        @foreach($answers as $answer)
            @include('partials.question.answer', $answer)
        @endforeach
    </div>
</main>
@endsection