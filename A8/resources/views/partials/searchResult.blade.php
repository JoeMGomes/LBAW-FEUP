<div class="border d-flex flex-column bg-light w-90 align-items-center py-3 mb-3">
    @include('partials.searchQuestion', $result)
    @isset($result['answer'])
        @include('partials.searchBestAnswer', $result)
    @endisset
</div>