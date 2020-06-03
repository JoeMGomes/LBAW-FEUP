@if(Auth::check() && Auth::user()->id == $comment['owner'])
    <button type="button" class="btn text-secondary" data-toggle="modal" data-target="#edit{{$comment['id']}}">
        <a href="#" class=" text-black"><i class="fa fa-edit"></i> Edit</a>
    </button>

    <div class="modal fade" id="edit{{$comment['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered vh-100" ole="document">
            <div class="text-left rounded bg-mygrey d-flex flex-column modal-content px-4 py-4">
                <form class="d-flex flex-column" action="/post/editComment" method="POST">
                    @csrf
                    <input name="commentID" class="form-control" value="{{$comment['id']}}" hidden>
                    <textarea class="form-control MDE "  name="text_body" rows="5" required>{{$comment['text']}}</textarea>
                    <button type="submit" onclick="" class="btn bg-myyellow rounded ml-auto mt-2">edit answer</button>
                </form>
            </div>
        </div>
    </div>
@endif