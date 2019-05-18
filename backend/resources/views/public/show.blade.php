@extends('layouts.public')

@section('title')
{{ $post->title . ' - ' . config('app.name') }}
@endsection

@section('css')
<style>
.all-post-content {
    max-width: 740px;
}
.author-row img {
    width: 50px;
    border-radius: 50%;

}
.middot-divider {
    padding-right: .3em;
    padding-left: .3em;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.54);
}
.middot-divider::after {
    content: '\00B7';
}
.content-row {
    font-size: 18px;
    line-height: 1.58;
}
.post-img-row img {
    width: 100%;
}
</style>
@endsection

@section('content')
<div class="all-post-content mx-auto">
    <div class="row">
        <div class="col-12">
            <h2>{{ $post->title }}</h2>
        </div>
    </div>
    <div class="row pb-2">
        <div class="col-12">
            <h3 class="text-secondary">{{ $post->description }}</h3>
        </div>
    </div>
    <div class="row author-row">
        <div class="col-12 d-flex flex-row">
            <div>
                <img src="{{ Gravatar::src($post->user->email) }}" alt="" class="avatar avatar-sm">
            </div>
            <div>
                <div class="row pl-2">
                    <div class="col-12">
                        {{ $post->user->name }}
                    </div>
                    <div class="col-12 text-secondary">
                        <a href="{{ route('blog.category', $post->category->id) }}" class="badge badge-primary">
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
    </div>
    <div class="row post-img-row py-4">
        <div class="col-12">
            <img src="{{ asset('storage/' . $post->image) }}">
        </div>
    </div>
    
    <div class="row content-row pb-2">
        <div class="col-12">
            {!! $post->content !!}
        </div>
    </div>
    
    <div class="row pb-4">
        <div class="col-12">
        @foreach ($post->tags as $tag)
            <a href="{{ route('blog.tag', $tag->id) }}" class="badge badge-dark">
                {{ $tag->name }}
            </a>
        @endforeach
        </div>
    </div>
    
    <hr>
    
    <div id="disqus_thread"></div>
</div>

<script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
        this.page.url = '{{ config("app.url") }}/blog/posts/{{ $post->id }}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://personal-blog-9xt1wuj2hs.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            
@endsection

                