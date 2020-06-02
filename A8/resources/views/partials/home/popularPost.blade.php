<div class="d-flex text-left w-75 align-items-center mb-2">
    <div class="flex-column d-none d-md-flex">
        <img src="{{asset('img/'.$post['photo_url'])}}" class="rounded-img" alt="User Photo" />
        <small class="text-center mt-2">{{$post['name']}}</small>
    </div>
    <div class="ml-4">
        <a class="text-black" href="questionPage.php">
            <h4 class="mb-3">{{$post['title']}}</h4>
        </a>
        <p class="text-justified">
            {{$post['text_body']}}
        </p>
    </div>
</div>