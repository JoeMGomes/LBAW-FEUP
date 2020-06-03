
@if(Auth::check())
@if($question['bookmarked'])
<div  id="bookmarked">
    <button type="button" class="btn text-secondary" onclick="deleteBookmark({{$question['id']}})">
        <a href="#" class=" text-black"><i class="fa fa-bookmark"></i> Bookmarked!</a>
    </button>
</div>

<div class="d-none" id="bookmark">
    <button type="button" class="btn text-secondary" onclick="addBookmark({{$question['id']}})">
        <a href="#" class=" text-black"><i class="fa fa-bookmark-o"></i> Bookmark</a>
    </button>
</div>
@else
<div  class="d-none" id="bookmarked">
    <button  type="button" class="btn text-secondary" onclick="deleteBookmark({{$question['id']}})">
        <a href="#" class=" text-black"><i class="fa fa-bookmark"></i> Bookmarked!</a>
    </button>
</div>

<div id="bookmark">
    <button type="button" class="btn text-secondary" onclick="addBookmark({{$question['id']}})">
        <a href="#" class=" text-black"><i class="fa fa-bookmark-o"></i> Bookmark</a>
    </button>
</div>
@endif
@endif
