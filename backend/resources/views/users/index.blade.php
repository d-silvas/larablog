@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
        @if ($users->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <img
                            src="{{ Gravatar::src($user->email) }}"
                            alt="Avatar"
                            style="width:40px;height:40px;border-radius:50%;"
                            >
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        @if(auth()->user()->isAdmin() && !$user->isAdmin())
                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-success btn-sm"
                                >
                                Make admin
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No users yet</h3>
        @endif
    </div>
</div>

@endsection