@if(Auth::check() && Auth::user()->id == $answer['owner'])
    <button type="button" class="btn text-secondary" data-toggle="modal" data-target="#report">
        <a href="#" class=" text-black"><i class="fa fa-edit"></i> Edit</a>
    </button>

    <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" ole="document">
            <div class="text-left rounded bg-mygrey d-flex flex-column p-5 modal-content">
                <h3 class="">What is wrong?</h3>
                <form class="d-flex flex-column align-items-start">
                    <label><input type="radio" id="language" name="report" value="IP"> Innapropriate
                        language</label>
                    <label><input type="radio" id="offensive" name="report" value="OTO"> Offensive
                        towards
                        others</label>
                    <label><input type="radio" id="other" name="report" value="OTHER"> Other</label>
                    <div class="d-flex flex-column w-100">
                        <label>Describe the problem</label>
                        <textarea rows="2" class="form-control rounded border resize-none"></textarea>
                    </div>
                    <button type="submit" class="btn bg-myyellow rounded ml-auto mt-4">Send Report</button>
                </form>
            </div>
        </div>
    </div>
@endif