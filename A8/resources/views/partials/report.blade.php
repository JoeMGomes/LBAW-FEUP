@if (!Auth::guard('admin')->check())
<button type="button" class="btn text-secondary" data-toggle="modal" data-target="#report">
    <a href="#" class=" text-black"><i class="fa fa-flag"></i> Report</a>
</button>

<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" ole="document">
        <div class="text-left rounded bg-mygrey d-flex flex-column p-5 modal-content">
            <h3 class="">What is wrong?</h3>
            <form class="d-flex flex-column align-items-start" method="POST" action="{{route('makeReport')}}">
                @csrf
                <input hidden name="postID" value="{{$id}}" <label><input type="radio" id="language" name="reportType"
                    value="IP"> Innapropriate
                language</label>
                <label><input type="radio" id="offensive" name="reportType" value="OTO"> Offensive
                    towards
                    others</label>
                <label><input type="radio" id="mis" name="reportType" value="MIS">Spreading Misinformation</label>
                <label><input type="radio" id="spam" name="reportType" value="SPM"> Spam</label>
                <label><input type="radio" id="other" name="reportType" value="OTHER"> Other</label>
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