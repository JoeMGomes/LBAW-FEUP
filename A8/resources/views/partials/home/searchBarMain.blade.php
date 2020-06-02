@section('main')
<main id="main"
    class="ml-sm-auto col-lg-10 px-4 text-center d-flex flex-column align-items-center justify-content-between">
    <div class="d-flex flex-column justify-content-between vh-100">
        <div class="m-5"></div>
        <div class=" m-md-5 m-sm-1 border bg-white p-md-5 p-sm-1 ">
            <label for="search" class="w-75 m-4">
                <h3>Adult life is hard. Hit us with your question!</h3>
            </label>

            @include('partials.searchBar')

            <span>Tip: Search with # to filter your results through categories</span>
            <ul class="my-3 m-1 mx-lg-auto col-lg-10 d-flex list-unstyled justify-content-around flex-wrap">
                <a href="{{url('search/%23Laundry')}}" class="tag mx-md-2 my-1 bg-myred">Laundry</a>
                <a href="{{url('search/%23Cooking')}}" class="tag mx-md-2 my-1 bg-myyellow">Cooking</a>
                <a href="{{url('search/%23Health')}}" class="tag mx-md-2 my-1 bg-mygreen">Health</a>
                <a href="{{url('search/%23Finances')}}" class="tag mx-md-2 my-1 bg-myred">Finances</a>
                <a href="{{url('search/%23Sexuality')}}" class="tag mx-md-2 my-1 bg-myyellow">Sexuality</a>
                <a href="{{url('search/%23Work')}}" class="tag mx-md-2 my-1 bg-mygreen">Work</a>
                <a href="{{url('search/%23Relationships')}}" class="tag mx-md-2 my-1 bg-myred">Relationships</a>
                <a href="{{url('search/%23Household')}}" class="tag mx-md-2 my-1 bg-myyellow">Household</a>
            </ul>
        </div>

        <a href="#popular"><i class="fa fa-angle-down fa-4x bg-white text-dark arrow rounded-circle mb-3"></i></a>
    </div>
    <div id="popular" class="vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="d-flex flex-column w-75 text-center border bg-white px-lg-5 py-3 py-sm-1 align-items-center">

            <h1 class="mb-3"><i class="fa fa-pagelines text-dark"></i>
                Popular questions
                <i class="fa fa-pagelines fa-flip-horizontal text-dark "></i>
            </h1>

            @foreach($posts as $post)
                @include('partials.home.popularPost', ['post' => $post])
            @endforeach
        </div>
    </div>

</main>
@endsection