<div class="row">
    <div class="col-12">
        <h6>Search</h6>
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

<div class="row">
    <div class="col-12">
        <h1>Categories</h1>
        <hr>
    </div>
    <div class="col-12">
        <ul>
            @foreach($categories as $category)
            <li>
                <a href="{{ route('blog.category', $category->id) }}">
                    {{ $category->name }}
                </a>
            </li>    
            @endforeach
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h1>Tags</h1>
        <hr>
    </div>
    <div class="col-12">
        <ul>
            @foreach($tags as $tag)
            <li>
                <a href="{{ route('blog.tag', $tag->id) }}">
                    {{ $tag->name }}
                </a>
            </li>    
            @endforeach
        </ul>
    </div>
</div>