@if(Auth::check() && Auth::user()->id == $answer['owner'] || Auth::guard('admin')->check())
<form   action="/deleteAnswer" method="POST" onsubmit=" return confirm('Are you sure you want to delete this answer? This action is permanent') && confirm('Are you really sure?');" >
    @csrf
    <input name="answerID"  value="{{$answer['id']}}" hidden>
    <input name="owner"  value="{{$answer['owner']}}" hidden>
    <button type="submit" class="btn" >

        <a  class="text-black"><i class="fa fa-trash"></i> Delete </a>
    </button>
</form>


@endif