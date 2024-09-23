@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div>
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Role Name:</label>
                        <input type="tel" name="name" id="name" placeholder="Enter Role Name">
                    </div>
                    @foreach ($permissions as $permission )
                    <input type="checkbox" name="permissions[]" value="{{$permission->name}}">
                    <label for="permission[]">{{$permission->name}}</label>

                    @endforeach
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
