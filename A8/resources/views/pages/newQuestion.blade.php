@extends('layouts.default')

@section('title')
<title>GROW - New Post</title>
@endsection


@section('bodyTag')
<body class="container-fluid vh-100 m-0 p-0 bg-mygrey">
@endsection

@section('main')
<main id="main" class="ml-lg-auto col-lg-10 p-4">
    <div class="bg-white p-4  border col-lg-8 col-md-9 mx-auto ">
        <h1 class="text-center my-3">Don't be afraid to ask your question</h1>
        <div class="text-left ml-4 mt-4">
            <span class=""> Tips on getting good answers quickly: </span>
            <ul class="list-unstyled ml-3 mt-2">
                <li> <i class=" fa fa-check-circle text-mydarkgreen"></i> Make sure your question has not been asked already </li>
                <li> <i class=" fa fa-check-circle text-mydarkgreen"></i> Keep your question short and to the point </li>
                <li> <i class=" fa fa-check-circle text-mydarkgreen"></i> Double-check grammar and spelling </li>
            </ul>
        </div>
        <form class=" text-black d-flex flex-column" method="POST" action="{{ route('makeQuestion') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title" class="p-2 h4 text-left">What is your question?</label>
                <input id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="text_body" class="p-2 h4 text-left">Explain yourself a bit better</label>
                <textarea class="form-control QuestionMDE" id="text_body" name="text_body" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="category" class="p-2 h4 text-left">In which categories does your question fit in?
                    <small class="h6"> (Choose up to 5)</small>
                </label>
                <div class="flex-column"  id="categoryList">

                </div>
            </div>
            <div class="form-group">
                <input class="form-control categoryArray" autocomplete="off" list="tags" id="category" value="{{ old('category') }}">
                <datalist id="tags">

                </datalist>
            </div>
        
            <button type="submit" class="btn bg-mydarkgreen text-white mt-1 ml-auto">Submit</button>
        </form>
    </div>
</main>
@endsection