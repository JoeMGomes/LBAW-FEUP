<main id="main" class="ml-lg-auto col-lg-10 align-right  ">
    <div class=" ml-lg-auto w-100 pb-0">
        <div class="ml-1 d-flex align-items-center justify-content-between mb-3">
            @if (Route::current()->getName() === 'bookmarks')
                <h2 class="px-3 pt-3">Bookmarks</h2>
                @else
                <span class="pl-4 ml-4 text-nowrap"> {{count($results)}} results found </span>
            @endif
            
        </div>
        @if (!$results)
        @if (Route::current()->getName() === 'bookmarks')
        <p class="my-4">You have no bookmarked posts! Get started by looking into some <a href="/#popular">popular
                questions</a>!</p>
        @elseif (Route::current()->getName() === 'search')
        <p class="my-4">There are no avilable results about this topic. Try asking about it in a different way!</p>
        @endif
        @endif
        @foreach($results as $result)
        @include('partials.search.searchResult', $result)
        @endforeach


    </div>
</main>