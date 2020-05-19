
             <form method="POST" action="{{route('addAnswer')}}"> 
             {{csrf_field()}}
            <input name="question_id" type="hidden" id="question_id" value="{{$question_id}}" />
             <div class="d-flex align-items-center w-100 mb-5">
                <div class="rounded-img"> </div>
                <div class=" w-100 d-flex flex-column mx-4 px-3 py-3">
                    <div class="form-group">
                        <label for="description">Have an answer? Help {{$username}}!</label>
                        <textarea name="text_body" class="form-control" id="text_body" rows="5"></textarea>
                    </div>
                    <div class="flex-column align-items-center mr-3">
                        <span class="text-nowrap">
                            <img src="{{asset('img/'.Auth::user()->photo_url)}}" class="reply-img mr-2" alt="User Photo" />
                            &#8212 {{Auth::user()-> name}}
                        </span>
                        <small class="small"> {{Auth::user()-> score}} points | Member since {{date('M Y', strtotime(Auth::user()-> membership_date))}}</small>
                        <button class="btn btn-primary border-0 bg-mygreen bg-greenh float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div> 
            </form>