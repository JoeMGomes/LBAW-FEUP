@if($questionOwner && Auth::user()->id != $answer['owner'])
    <button type="button" class="btn text-secondary" onclick="chooseBestAnswer({{$answer['id']}}, {{$answer['parent']}})">
        <a href="#" class=" text-black"><i class="fa fa-heart"></i> Choose as Best Answer</a>
    </button>
@endif