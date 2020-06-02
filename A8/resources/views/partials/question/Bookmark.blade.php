@if(Auth::check() && Auth::user()->id == $question['owner'])

@if($question['bookmarked'])
<div id="bookmark">
    <button type="button" class="btn text-secondary" onclick="deleteBookmark(<?php echo $question['id'] ?>)">
        <a href="#" class=" text-black"><i class="fa fa-bookmark"></i> bookmarked!</a>
    </button>
</div>
@else
<div id="bookmark">
    <button type="button" class="btn text-secondary" onclick="addBookmark(<?php echo $question['id'] ?>)">
        <a href="#" class=" text-black"><i class="fa fa-bookmark-o"></i> bookmark</a>
    </button>
</div>
@endif
@endif
