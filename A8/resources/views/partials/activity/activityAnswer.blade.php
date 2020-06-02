<p class="h6 my-3"> <i class="fa fa-calendar fa-1x"> </i> {{date('M d, Y', strtotime($post['date']))}}</p>

<div class="border d-flex flex-column bg-light mb-3">
    <div class="d-flex m-0">
        <div class="row w-100 px-3 ml-2 py-1">
            <div class="d-flex w-100">
                <span class="px-2">You helped someone and gained<b>  {{$post['votes']}}</b> points!</span>
                <i class="fa fa-pencil px-2"></i>
                <a href="#">Edit answer</a>
            </div>
            <div class=" d-flex w-100 border bg-white mx-4 ">
                <div class="d-flex flex-column px-4">
                    <i class=" fa fa-angle-up fa-2x text-mydark"></i>
                    <i>23</i>
                    <i class=" fa fa-angle-down fa-2x text-mydark "></i>
                </div>
                <p class="pt-3 pl-2 ">
                    Download more RAM?
                </p>
            </div>
        </div>
    </div>
</div>