<div class="d-flex pl-4 pr-4 w-100">
    <div class="flex-column d-none d-md-flex ">
        <img src="{{asset('img/'.$result['qphoto'])}}" class="rounded-img " alt="User Photo" />
        <small class="text-center mt-2">{{$result['qname']}}</small>
    </div>
    <div class="ml-4 w-100">
        <a class="text-black" href="{{ url('post/'.$result['id']) }}">
            <h3 class="mb-3">{{$result['title']}}</h3>
        </a>
        <p class="text-justified ">
            {{$result['text_body']}}
        </p>
        <div class="d-flex row align-items-end justify-content-end">
            <div class="text-right text-nowrap">
                <small> Asked on {{date('M d, Y @ H:i ', strtotime($result['qdate']))}} </small>
            </div>
        </div>
    </div>
</div>