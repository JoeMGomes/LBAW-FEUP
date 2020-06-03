@if($questionOwner && Auth::user()->id != $answer['owner'])
    <button type="button" class="btn text-black" onclick="chooseBestAnswer({{$answer['id']}}, {{$answer['parent']}})">
       <i class="fa fa-heart"></i> Choose as Best Answer
    </button>
@endif