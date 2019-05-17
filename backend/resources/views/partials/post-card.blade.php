<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-9">
                <div class="row title-row">
                    <div class="col-12">
                        <h5><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h5>
                    </div>
                </div>
                <div class="row description-row">
                    <div class="col-12">
                        <p class="card-text"> {{ $post->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <img src="{{ asset('storage/' . $post->image) }}" style="width:100%;">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('blog.tag', $post->category->id) }}" class="badge badge-primary">
                    {{ $post->category->name }}
                </a>
                <span class="middot-divider"></span>
                {{ $post->created_at->format('d/m/Y') }}
                <span class="middot-divider"></span>
                4 min
            </div>
        </div>
    </div>
</div>