@if(Auth::check() && Auth::user()->id == $question['owner'])
    <button type="button" class="btn text-black" data-toggle="modal" data-target="#edit{{$question['id']}}">
       <i class="fa fa-edit"></i> Edit
    </button>

    <div class="modal fade" id="edit{{$question['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered vh-100">
            <div class="text-left rounded bg-mygrey d-flex flex-column modal-content px-4 py-4">
                <form class="d-flex flex-column " action="/post/editQuestion" method="POST">
                    @csrf
                    <input name="questionID" class="form-control" value="{{$question['id']}}" hidden>
                    
                    <label> Title
                    <input name="title" class="form-control" value="{{$question['title']}}" required></label>
                    <label> Description </label>
                    <textarea class=" MDE"  name="text_body"  required>{{$question['text']}}</textarea>
                    <button type="submit" onclick="" class="btn bg-myyellow rounded ml-auto mt-2">Edit Question</button>
                </form>
            </div>
        </div>
    </div>
@endif