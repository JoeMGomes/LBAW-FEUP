<div class="d-flex align-items-center w-100 ">
    <div class="border w-100 d-flex flex-column mx-4 px-3 py-3 bg-white">
        <span class="text-danger text-nowrap"> <i class="fa fa-heart"></i> Best Answer!</span>
        <p class="text-justify">
            {{$result['answer']}}
        </p>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="flex-column align-items-center mr-3">
                <span class="text-nowrap">
                    <img src="{{asset('img/'.$result['aphoto'])}}" class="reply-img mr-2" alt="User Photo" />
                    &#8212 {{$result['aname']}}
                </span>
                <small class="small"> {{$result['score']}} points | Member since {{date('M Y', strtotime($result['membership_date']))}}</small>
            </div>
            <div>
                <small> Replied on {{date('M d, Y @ H:i',strtotime($result['adate']))}} </small>
            </div>
        </div>
    </div>
</div>