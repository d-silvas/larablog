@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        Create category
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Add category</button>
            </div>
        </form>
    </div>
</div>

@endsection