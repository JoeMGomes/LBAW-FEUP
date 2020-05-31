@if(Auth::check() && Auth::user()->id == $answer['owner'])
    <button type="button" class="btn text-secondary" data-toggle="modal" data-target="#edit{{$answer['id']}}">
        <a href="#" class=" text-black"><i class="fa fa-edit"></i> Edit</a>
    </button>

    <div class="modal fade" id="edit{{$answer['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered vh-100" ole="document">
            <div class="text-left rounded bg-mygrey d-flex flex-column modal-content px-4 py-4">
                <form class="d-flex flex-column align-items-start" action="/post/edit" method="POST">
                    @csrf
                    <input name="answerID" class="form-control" value="{{$answer['id']}}" hidden>
                    <textarea class="form-control MDE "  name="text_body" rows="5" required>{{$answer['text']}}</textarea>
                    <button type="submit" onclick="" class="btn bg-myyellow rounded ml-auto mt-2">edit answer</button>
                </form>
            </div>
        </div>
    </div>
@endif