<main id="main" class="ml-lg-auto col-lg-10 align-right  ">
    <div class=" ml-lg-auto w-100 pb-0">
        <div class="ml-1 d-flex align-items-center justify-content-between mb-3">
            <div class="col-lg-5">
                <label for="sort" class="sorter-label "> Sorted by</label>
                <select id="sort" class=" custom-select col-5">
                    <option>Most answers</option>
                    <option>Most recent</option>
                </select>
            </div>
            <span class="pr-4 mr-4 text-nowrap"> {{count($results)}} results found </span>
        </div>
        @if (!$results)
        <p class="my-4">You have no bookmarked posts! Get started by looking into some <a href="/#popular">popular questions</a>!</p>
        @endif
        @foreach($results as $result)
            @include('partials.search.searchResult', $result)
        @endforeach


        </div>
</main>