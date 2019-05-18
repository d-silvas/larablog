@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">My profile</div>

    <div class="card-body">
        @include('admin.partials.errors')
        <form action="{{ route('admin.users.update-profile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text" class="form-control"
                    name="name" id="name"
                    value="{{ $user->name }}"
                    >
            </div>

            <div class="form-group">
                <label for="about">About me</label>
                <textarea
                    name="about" id="about"
                    cols="5" rows="5"
                    class="form-control"
                    >{{ $user->about }}</textarea>
            </div>

            <button class="btn btn-success" type="submit">Update profile</button>
        </form>
    </div>
</div>

@endsection
