<div class="card border-dark mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ Gravatar::src($post->user->email) }}" alt="" class="avatar avatar-sm" style="width:100%">
                    </div>
                    <div class="col-9">
                        {{ $post->user->name }}
                    </div>
                </div>
            </div>
            <div class="col-9">
                <h5><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('storage/' . $post->image) }}" style="width:100%;">
            </div>
            <div class="col-9">
                <p class="card-text"> {{ $post->description }}</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        [{{ $post->category->name }}]
        @foreach ($post->tags as $tag)
        <a href="{{ route('blog.tag', $tag->id) }}" class="badge badge-dark">
            {{ $tag->name }}
        </a>
        @endforeach
    </div>
</div>