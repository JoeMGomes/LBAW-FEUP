
@if(Auth::check())
@if($question['bookmarked'])
<div  id="bookmarked">
    <button type="button" class="btn text-black" onclick="deleteBookmark({{$question['id']}})">
       <i class="fa fa-bookmark"></i> Bookmarked!
    </button>
</div>

<div class="d-none" id="bookmark">
    <button type="button" class="btn text-black" onclick="addBookmark({{$question['id']}})">
       <i class="fa fa-bookmark-o"></i> Bookmark
    </button>
</div>
@else
<div  class="d-none" id="bookmarked">
    <button  type="button" class="btn  text-black" onclick="deleteBookmark({{$question['id']}})">
        <i class="fa fa-bookmark"></i> Bookmarked!
    </button>
</div>

<div id="bookmark">
    <button type="button" class="btn  text-black" onclick="addBookmark({{$question['id']}})">
        <i class="fa fa-bookmark-o"></i> Bookmark
    </button>
</div>
@endif
@endif
