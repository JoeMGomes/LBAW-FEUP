@if (Auth::check() && Auth::user()->id == $question['owner'] || Auth::guard('admin')->check())
    <form action="/deleteQuestion" method="post">
        @csrf
        <input type="hidden" id="id" name="id" value="{{$question['id']}}">
        <button type=submit  class="btn "> <i class="fa fa-trash"></i> Delete</button>
    </form>
@endif