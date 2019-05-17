@extends('layouts.blog')

@section('title')
{{ config('app.name') }}
@endsection

@section('css')
<style>
/* General */
.container {
    max-width: 95%;
}
/* Cards */
.title-row a {
    font-weight: 600;
}
.description-row {
    color: grey;
}
.card-footer {
    color: rgba(0, 0, 0, 0.54);
    font-size: 14px;
}
.card-footer a.badge {
    font-size: 12px;
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
</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Latest posts</h3>
            <hr>
        </div>
        <div class="col-12 col-md-9">
            <div class="row">
                @forelse($posts as $post)
                <div class="col-12">
                    @include('partials.post-card', ['post' => $post])
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">
                        No results found for query <b>{{ request()->query('search') }}</b>
                    </p>
                </div>
                @endforelse
                <div class="col-12">
                    {{ $posts->appends(['search' => request()->query('search')])->links() }}
                </div>
            </div>
        </div>
    
        <div class="col-12 col-md-3">
            @include('partials.sidebar')
        </div>
    </div>
</div>

@endsection