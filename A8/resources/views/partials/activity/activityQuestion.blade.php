<p class="h6 my-3"> <i class="fa fa-calendar fa-1x mr-2"> </i>  {{date('M d, Y', strtotime($post['date']))}}</p>
<div class="border w-100 bg-light">
    <div class="d-flex w-100">
        <div class="row w-100 px-3 ml-2 py-1 flex-column">
            <div class="d-flex w-100 align-items-center">
                <span>You asked a question!</span>
                @include('partials.question.deleteQuestion',  ['question' => $post])
            </div>
            <div class="mb-3">
                <h5 class=" ">
                    <a class="text-black" href="{{ url('post/'.$post['id']) }}">
                    {{$post['title']}}
                    </a>
                </h5>
                <span> {{$post['text']}}</span>
            </div>
            <div class="d-flex w-50 border bg-white mx-4 ">
                <div class="pt-2 ">
                    <span class="px-3  text-danger text-nowrap">
                        <i class="fa fa-heart "></i>
                        Best Answer!</span>
                        <p class="pt-2 px-3">
                            You can take things and not pay if you want
                        </p>
                    </div>
                </div>
            </div>
    </div>
</div>