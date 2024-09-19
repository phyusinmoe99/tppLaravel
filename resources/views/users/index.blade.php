@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div>

                <h1>User</h1>
                <a href="{{ route('users.create') }}">Add +</a>

                <ul>
                    @foreach ($users as $user)
                        <li>
                            {{ $user->name }} | {{ $user->email }} |
                            @foreach ($user->roles as $role)
                                Role : {{ $role->name }}
                            @endforeach
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a> |
                            <form action="{{ route('users.delete', $user->id) }}" method="post">
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    @endforeach

                </ul>

            </div>
        </div>
    </div>
@endsection
