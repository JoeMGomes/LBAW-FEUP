<div class="border d-flex flex-column bg-light w-90 align-items-center py-3 mb-3">
    @include('partials.search.searchQuestion', $result)
    @if (isset($result['answer']) && !$result['areported'])
        @include('partials.search.searchBestAnswer', $result)
    @endif
</div>