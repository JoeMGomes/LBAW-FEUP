@if(Auth::check() && Auth::user()->id == $comment['owner'] || Auth::guard('admin')->check())
<form   action="/deleteComment" method="POST" onsubmit=" return confirm('Are you sure you want to delete this comment? This action is permanent') && confirm('Are you really sure?');">
    @csrf
    <input name="commentID"  value="{{$comment['id']}}" hidden>
    <input name="owner"  value="{{$comment['owner']}}" hidden>
    <button type="submit" class="btn" >
<i class="fa fa-trash"></i> Delete
    </button>
</form>


@endif