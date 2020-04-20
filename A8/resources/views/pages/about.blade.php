@extends('layouts.default')

@section('bodyTag')
<body style="background-image: url('{{ asset('img/pattern.png') }}');">
@endsection

@section('main')
<main id="main" class="ml-sm-auto col-lg-10 px-4 d-flex flex-column align-items-center justify-content-between">
    <div class="d-flex flex-column m-md-5 m-sm-1 border bg-white p-md-5 p-sm-1 mw-75 mt-4 pt-4 px-2">
        <h1>About us</h1>
        <p>We are a group of students that made a website because our teachers told us to. <br>
            But since you're here, take a look at some posts and maybe Grow a little &semi;&#41; 
        </p>
        <div class="mw-50 mx-auto">
            <div class="d-flex justify-content-between align-items-center my-4">
                <img src="{{ asset('img/henriqueF.jpg') }}" class="rounded-img " alt="User Photo" />
                <label class="mx-3">Henrique Freitas</label>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <label class="mx-3">Rita Mota</label>
                <img src="{{ asset('img/rita.jpg') }}" class="rounded-img " alt="User Photo" />
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <img src="{{ asset('img/joseG.jpg') }}" class="rounded-img " alt="User Photo" />
                <label class="mx-3">José Gomes</label>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <label class="mx-3">David Dinis</label>
                <img src="{{ asset('img/david.jpg') }}" class="rounded-img " alt="User Photo" />
            </div>
        </div>
        <p class="align-self-center pt-2">Laboratório de Bases de Dados e Aplicações Web, 2019/20</p>
    </div>
</main>
@endsection