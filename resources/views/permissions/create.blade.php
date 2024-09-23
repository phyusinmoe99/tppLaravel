@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <h1>Permissin Create</h1>
            <div>
                <form action="{{ route('permission.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <select name="role" id="role">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
