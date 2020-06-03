@if (!Auth::guard('admin')->check() && Auth::check() && Auth::user()->id != $owner)
<button type="button" class="btn text-black" data-toggle="modal" data-target="#report{{$id}}">
    <i class="fa fa-flag"></i> Report
</button>

<div class="modal fade" id="report{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="text-left rounded bg-mygrey d-flex flex-column p-5 modal-content">
            <h3 class="">What is wrong?</h3>
            <form class="d-flex flex-column align-items-start" method="POST" action="{{route('makeReport')}}">
                @csrf
                <input hidden name="postID" value="{{$id}}">
                <label><input type="radio" name="reportType" value="IP"> Innapropriate
                    language</label>
                <label><input type="radio" name="reportType" value="OTO"> Offensive
                    towards others</label>
                <label><input type="radio" name="reportType" value="MIS">Spreading Misinformation</label>
                <label><input type="radio" name="reportType" value="SPM"> Spam</label>
                <label><input type="radio" name="reportType" value="OTHER"> Other</label>
                <div class="d-flex flex-column w-100">
                    <label>Describe the problem</label>
                    <textarea rows="2" name="offense" class="form-control rounded border resize-none"></textarea>
                </div>
                <button type="submit" class="btn bg-myyellow rounded ml-auto mt-4">Send Report</button>
            </form>
        </div>
    </div>
</div>
@endif