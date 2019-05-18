@extends('layouts.admin')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>
    <div class="card-body">
       @include('admin.partials.errors')
        <form
            action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
            method="POST"
            >
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ isset($category) ? $category->name : '' }}"
                    class="form-control"
                    >
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($category) ? 'Update Category' :  'Add Category' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection