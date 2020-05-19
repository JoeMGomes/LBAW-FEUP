<div class="d-flex align-items-center mt-1 w-100">
    <div class="rounded-img  d-none d-lg-block"> </div>
    <div class="rounded-img"> </div>
    <div class="border w-100 d-flex flex-column mx-lg-4 px-3 py-3">
        <p class="text-justify">
            {{$comment['text']}}
        </p>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="flex-column align-items-center mr-3">
                <span class="text-nowrap">
                    <img src="{{asset('img/'.$comment['photo_url'])}}" class="comment-img mr-2" alt="User Photo" />
                    &#8212 {{$comment['name']}}
                </span>
                <small class="small"> {{$comment['score']}} points | Member since {{date('M Y', strtotime($comment['membership_date']))}}</small>
            </div>
            <div>
                <small> Comented on {{date('M d, Y @ H:i ',strtotime($comment['date']))}}</small>
                @include('partials.report')
            </div>
        </div>
    </div>
</div>