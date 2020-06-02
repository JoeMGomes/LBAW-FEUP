@if(Auth::check() && Auth::user()->id == $question['owner'])
    <button type="button" class="btn text-secondary" data-toggle="modal" data-target="#edit{{$question['id']}}">
        <a href="#" class=" text-black"><i class="fa fa-edit"></i> Edit</a>
    </button>

    <div class="modal fade" id="edit{{$question['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered vh-100" ole="document">
            <div class="text-left rounded bg-mygrey d-flex flex-column modal-content px-4 py-4">
                <form class="d-flex flex-column " action="/post/edit" method="POST">
                    @csrf
                    <input name="questionID" class="form-control" value="{{$question['id']}}" hidden>
                    
                    <label> Title
                    <input name="title" class="form-control" value="{{$question['title']}}" required></label>
                    <label> Description
                    <textarea class=" MDE"  name="text_body"  required>{{$question['text']}}</textarea></label>
                    <button type="submit" onclick="" class="btn bg-myyellow rounded ml-auto mt-2">Edit Question</button>
                </form>
            </div>
        </div>
    </div>
@endif