@if(Auth::check() && Auth::user()->id == $answer['owner'])
<form class="btn text-secondary"  action="/deleteAnswer" method="POST" >
    @csrf
    <input name="answerID"  value="{{$answer['id']}}" hidden>
    <input name="owner"  value="{{$answer['owner']}}" hidden>
    <button type="submit" class="btn text-secondary" >

        <a  class="text-black"><i class="fa fa-trash"></i> Delete </a>
    </button>
</form>


@endif