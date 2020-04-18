<form action="/search" class="form input-group mb-0">
@isset($search[0])
    <input id="search" value="{{ $search[0] }}" class="form-control rounded border-dark border-3 ml-3" type="text"
            placeholder="How do I do my taxes">
@else
    <input id="search" value="" class="form-control rounded border-dark border-3 ml-3" type="text"
            placeholder="How do I do my taxes">
@endisset
    <div class="input-group-append">
        <button class="btn" type="submit">
            <i class="fa fa-search fa-lg"></i>
        </button>
    </div>

</form>