@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div>
                <h1>Role List</h1>
                @can('roleCreate')
                    <a href="{{ route('role.create') }}">Create Role</a>
                @endcan
                <ul>
                    @foreach ($roles as $role)
                        <li>{{ $role->name }}
                            @can('roleEdit')
                                <a href="{{ route('role.edit', $role->id) }}">Edit</a>
                            @endcan
                            @can('roleDelete')
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            @endcan

                        </li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>
@endsection
