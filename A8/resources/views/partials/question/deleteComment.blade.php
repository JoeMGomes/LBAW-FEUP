@if(Auth::check() && Auth::user()->id == $comment['owner'] || Auth::guard('admin')->check())
<form   action="/deleteComment" method="POST" >
    @csrf
    <input name="commentID"  value="{{$comment['id']}}" hidden>
    <input name="owner"  value="{{$comment['owner']}}" hidden>
    <button type="submit" class="btn" >

        <a  class="text-black"><i class="fa fa-trash"></i> Delete</a>
    </button>
</form>


@endif