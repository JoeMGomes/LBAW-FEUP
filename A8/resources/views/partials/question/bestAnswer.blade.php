<div class="d-flex align-items-center w-100">
    <div class="ml-lg-5 mr-1 text-center flex-column">
        <i class="fa fa-angle-up fa-2x text-mygreen"></i>
        <div>{{$answer['votes']}}</div>
        <i class=" fa fa-angle-down fa-2x text-myblue "></i>
    </div>
    <div class="border w-100 d-flex flex-column mx-lg-4 px-3 py-3">
        <span class="text-danger text-nowrap"> <i class="fa fa-heart"></i> Best Answer!</span>
        <p class="text-justify">
            {{$answer['text']}}
        </p>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="flex-column align-items-center mr-3">
                <span class="text-nowrap">
                    <img src="{{asset('img/'.$answer['photo_url'])}}" class="reply-img mr-2" alt="User Photo" />
                    &#8212 {{$answer['name']}}
                </span>
                <small class="small"> {{$answer['score']}} points | Member since {{date('M Y', strtotime($answer['membership_date']))}}</small>
            </div>
            <div>
                <small> Replied on {{date('M d, Y @ H:i',strtotime($answer['date']))}} </small>
                @include('partials.report')
            </div>
        </div>
    </div>
</div>
@foreach($answer['comments'] as $comment)
    @include('partials.question.comment', $comment)
@endforeach