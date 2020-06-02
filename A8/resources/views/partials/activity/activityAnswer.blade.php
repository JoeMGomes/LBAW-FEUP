<p class="h6 my-3"> <i class="fa fa-calendar fa-1x mr-2"> </i> {{date('M d, Y', strtotime($post['date']))}}</p>

<div class="border d-flex flex-column bg-light mb-3">
    <div class="d-flex m-0">
        <div class="row w-100 px-3 ml-2 py-1">
            <div class="d-flex w-100 align-items-center">
                <span class="px-2">You helped someone and gained<b>  {{$post['votes']}}</b> points!</span>´
                @include('partials.question.edit', ['answer' => $post])
                @include('partials.question.deleteAnswer',  ['answer' => $post])
            </div>
            <div class=" d-flex w-100 border bg-white mx-4 align-items-center">
                <div class="d-flex flex-column px-4 justify-content-center align-items-center">
                    <i class=" fa fa-angle-up fa-2x text-mydark"></i>
                    {{$post['votes']}}
                    <i class=" fa fa-angle-down fa-2x text-mydark "></i>
                </div>
                <p class="pt-3">
                    <a class="text-black" href="{{ url('post/'.$post['parent']) }}">
                        {{$post['text']}}
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>