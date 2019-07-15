<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-3">
                <img src="{{ asset('storage/' . $post->image) }}" style="width:100%;">
            </div>
            <div class="col-12 col-sm-9 pt-2 pt-sm-0">
                <div class="row title-row">
                    <div class="col-12">
                        <h5>
                            <a href="{{ route('public.show', ['post' => $post->id, 'slug' => $post->slug]) }}">
                                {{ $post->title }}
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="row description-row">
                    <div class="col-12">
                        <p class="card-text"> {{ $post->description }}</p>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-12">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('public.tag', $tag->id) }}" class="badge badge-tag">
                                {{ $tag->name }} ({{ $tag->postsPublished->count() }})
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer px-3 py-1">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('public.category', $post->category->id) }}" class="badge badge-primary">
                    {{ $post->category->name }}
                </a>
                <span class="middot-divider"></span>
                {{ $post->published_at->format('d/m/Y') }}
                <span class="middot-divider"></span>
                4 min
            </div>
        </div>
    </div>
</div>