<p class="h6 my-3"> <i class="fa fa-calendar fa-1x mr-2"> </i> {{date('M d, Y', strtotime($post['date']))}}</p>
           
            <div class="border d-flex flex-column bg-light mb-3">
                <div class="d-flex m-0">
                    <div class="row px-3 ml-2 py-1">
                        <div class="d-flex align-items-center">
                            <span class="px-2">You wrote a comment!</span>
                            @include('partials.question.deleteComment',  ['comment' => $post])
                        </div>
                        <div class=" d-flex w-100 border bg-white mx-4 ">
                            <p class="pt-3 px-3 ">
                                {{$post['text']}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>