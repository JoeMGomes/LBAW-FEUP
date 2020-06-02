  
   <form class="mr-4 ml-3" method="POST" action="{{route('addComment')}}"> 
   {{csrf_field()}}
   <input name="answer_id" type="hidden" id="answer" value="{{$answer}}" />
        <div class="d-flex align-items-center mr-5 mt-1 w-100">
            <div class="rounded-img"> </div>
            <div class="rounded-img"> </div>
            <div class="w-100 d-flex flex-column pt-3">
                    <div class="form-group">
                        <textarea name="comment_body" class="form-control MDE vh-50 " id="comment_body" placeholder="Write your comment here..." rows="1"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                            <button class="btn btn-primary border-0 bg-mygreen bg-greenh" type="submit">Submit</button>
                    </div>
                </div>
        </div>
    </form> 