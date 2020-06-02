@if (Auth::check() && Auth::user()->id == $question['owner'] || Auth::guard('admin')->check())
    <form action="/deleteQuestion" method="post" onsubmit=" return confirm('Are you sure you want to delete this question? This action is permanent') && confirm('Are you really sure?');">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$question['id']}}">
        <button type=submit  class="btn "> <i class="fa fa-trash"></i> Delete</button>
    </form>
@endif