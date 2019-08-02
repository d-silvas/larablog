<div class="row py-2 mx-0">
    <div class="col-12 px-0">
        <form action="" method="GET" class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search"
                value="{{ request()->query('search') }}"
                >
            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </form>
    </div>
</div>

<div class="row py-2 mx-0">
    <div class="col-12 px-0">
        <h4>Categories</h4>
        <hr>
    </div>
    <div class="col-12 px-0">
    @foreach($categories as $category)
        <a href="{{ route('public.category', $category->id) }}" class="badge badge-primary">
            {{ $category->name }} ({{ $category->postsPublished->count() }})
        </a>
    @endforeach
    </div>
</div>

<div class="row py-2 mx-0">
    <div class="col-12 px-0">
        <h4>Tags</h4>
        <hr>
    </div>
    <div class="col-12 px-0">
    @foreach($tags as $tag)
        <a href="{{ route('public.tag', $tag->id) }}" class="badge badge-tag">
            {{ $tag->name }} ({{ $tag->postsPublished->count() }})
        </a>
    @endforeach
    </div>
</div>