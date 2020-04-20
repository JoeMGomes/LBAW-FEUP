@extends('layouts.default')

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
        <form class=" text-black d-flex flex-column" method="POST" action="/post/newQuestion">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="title" class="p-2 h4 text-left">What is your question?</label>
                <input id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="text_body" class="p-2 h4 text-left">Explain yourself a bit better</label>
                <textarea class="form-control" id="text_body" name="text_body" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="category" class="p-2 h4 text-left">In which categories does your question fit in?
                    <small class="h6"> (Choose up to 5)</small>
                </label>
                <input class="form-control" list="tags" id="category" name="category">
                <datalist id="tags">

                  </datalist>
            </div>
            <div class="form-check pl-0 ">
                <!-- input id must be label "for" field -->
                <input type="checkbox" id="rel">
                <label for="rel" class="labelToCheck" onkeydown="">Relationship</label>

                <input type="checkbox" id="sex">
                <label for="sex" class="labelToCheck" >Sexuality</label>

                <input type="checkbox" id="cooking">
                <label for="cooking" class="labelToCheck" >Cooking</label>

                <input type="checkbox" id="health">
                <label for="health" class="labelToCheck" >Health</label>

            </div>
            <button type="submit" class="btn bg-mydarkgreen text-white mt-1 ml-auto">Submit</button>
        </form>
    </div>
</main>
@endsection