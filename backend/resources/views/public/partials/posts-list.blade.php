    @forelse($posts as $post)
    <div class="col-12 px-0">
        @include('public.partials.post-card', ['post' => $post])
    </div>
    @empty
    <div class="col-12 px-0">
        <p class="text-center">
            No results found for query <b>{{ request()->query('search') }}</b>
        </p>
    </div>
    @endforelse
    <div class="col-12 px-0">
        {{ $posts->appends(['search' => request()->query('search')])->links() }}
    </div>