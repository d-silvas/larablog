@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success">
        Add tag
    </a>
</div>

<div class="card card-default">
    <div class="card-header">
        Tags
    </div>
    <div class="card-body">
        @if($tags->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts count</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->posts->count() }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No tags yet</h3>
        @endif
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteTagForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold">
                        Are you sure you want to delete this tag?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>

function handleDelete(id) {
    var form = $('#deleteTagForm');
    form.attr('action', `/admin/tags/${id}`);
    $('#deleteModal').modal('show');
}

</script>
@endsection