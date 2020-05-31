@if(Auth::check() && Auth::user()->id == $comment['owner'])
<form class="btn text-secondary"  action="/deleteComment" method="POST" >
    @csrf
    <input name="commentID"  value="{{$comment['id']}}" hidden>
    <input name="owner"  value="{{$comment['owner']}}" hidden>
    <button type="submit" class="btn text-secondary" >

        <a  class="text-black"><i class="fa fa-trash"></i> Delete </a>
    </button>
</form>


@endif