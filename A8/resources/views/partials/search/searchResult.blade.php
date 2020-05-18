<div class="border d-flex flex-column bg-light w-90 align-items-center py-3 mb-3">
    @include('partials.search.searchQuestion', $result)
    @isset($result['answer'])
        @include('partials.search.searchBestAnswer', $result)
    @endisset
</div>