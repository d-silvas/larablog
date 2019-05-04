@extends('layouts.blog')

@section('title')
{{ $post->title . ' - ' . config('app.name') }}
@endsection

@section('content')

<img src="{{ asset('storage/' . $post->image) }}">

<h3>{{ $post->title }}</h3>
<hr>
<span>{{ $post->category->name }}</span> | 
<span>{{ $post->user->name }}</span>
<img src="{{ Gravatar::src($post->user->email) }}" alt="" class="avatar avatar-sm">
<br>
@foreach ($post->tags as $tag)
    <a href="{{ route('blog.tag', $tag->id) }}" class="badge badge-dark">
        {{ $tag->name }}
    </a>
@endforeach
<div class="py-2"></div>
<h4> {{ $post->description }}</h4>
<div class="py-2"></div>
{!! $post->content !!}

<div id="disqus_thread"></div>
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

                