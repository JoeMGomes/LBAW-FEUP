<div class="d-flex align-items-center ml-3 w-100">
    <div class="ml-5 pl-1 text-right flex-column">
        <div class="text-center">
        <div onclick="upvote( {{ $answer['id'] }} )"><i class="fa fa-angle-up fa-2x text-mygreen" ></i></div>
        <div  id="votes_answer{{$answer['id']}}">{{$answer['votes']}}</div>
        <div onclick="downvote({{ $answer['id'] }})"><i class=" fa fa-angle-down fa-2x text-myblue " ></i></div>
        </div>
    </div>
    <div class="border w-100 d-flex flex-column mx-lg-4 px-3 py-3">
        <span class="text-danger text-nowrap"> <i class="fa fa-heart"></i> Best Answer!</span>
        <p class="text-justify" id="post_text{{$answer['id']}}">
        @if ($answer['edited'])<small>(<u>Edited</u>)</small>@endif {{$answer['text']}}
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
                @include('partials.question.edit')
                @include('partials.report', ['id' => $answer['id']])
            </div>
        </div>
    </div>
</div>
@foreach($answer['comments'] as $comment)
    @include('partials.question.comment', $comment)
@endforeach