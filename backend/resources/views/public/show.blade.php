@extends('layouts.public')

@section('title')
{{ $post->title . ' - ' . config('app.name') }}
@endsection

@section('css')
<style>
.all-post-content {
    max-width: calc(740px + 4rem);
}
.author-row img {
    width: 50px;
    border-radius: 50%;
}
.post-username-col, .post-details-col {
    height: 25px;
    line-height: 25px;
}
.content-row {
    font-size: 18px;
    line-height: 1.58;
}
.post-img-row img {
    width: 100%;
}
.card {
    padding: 2rem;
}
@media screen and (max-width: 575px) {
    .card {
        padding: 1rem;
    }
}
blockquote{
  font-style: italic;
  color: #555555;
  padding: 1.25em 30px 1.2em 44px;
  border-left: 8px solid #78C0A8 ;
  position: relative;
  background: #EDEDED;
}
blockquote::before{
  font-family: Arial;
  content: "\201C";
  color: #78C0A8;
  font-size: 4em;
  position: absolute;
  left: 5px;
  top: -10px;
}
blockquote p {
  color: #333333;
  margin: 0;
}
</style>
@endsection

@section('content')
<div class="all-post-content mx-auto">
    <div class="card">
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
                        <div class="col-12 post-username-col">
                            {{ $post->user->name }}
                        </div>
                        <div class="col-12 text-secondary post-details-col">
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
        
        <div class="row">
            <div class="col-12">
            @foreach ($post->tags as $tag)
                <a href="{{ route('public.tag', $tag->id) }}" class="badge badge-tag">
                    {{ $tag->name }}
                </a>
            @endforeach
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="card pt-1 pb-0">
        <div id="disqus_thread"></div>
    </div>
</div>

<script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
        this.page.url = '{{ config("app.url") }}/posts/{{ $post->id }}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '{{ config("services.disqus.url") }}';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            
@endsection

                