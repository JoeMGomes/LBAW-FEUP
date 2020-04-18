<div class="d-flex pl-4 pr-4 w-100">
    <div class="flex-column d-none d-md-flex ">
        <img src="{{asset('img/david.jpg')}}" class="rounded-img " alt="User Photo" />
        <small class="text-center mt-2">David Dinis</small>
    </div>
    <div class="ml-4 w-100">
        <a class="text-black" href="#NOT_IMPLEMENTED">
            <h1 class="mb-3"> <small>(<u>Edited</u>)</small> {{$result['title']}}</h1>
        </a>
        <p class="text-justified ">
            {{$result['text_body']}}
        </p>
        <div class="d-flex row align-items-end justify-content-end">
            <div class="text-right col-lg-4">
                <small> Asked on June 16, 2015 </small>
                @include('partials.report')
            </div>
        </div>
    </div>
</div>