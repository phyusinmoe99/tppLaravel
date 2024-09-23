@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <h1>Permission</h1>
            <a href="{{ route('permission.create') }}">Create Permission</a>
            <div>
                <ul>
                    @foreach ($permissions as $permission)
                        <li>{{ $permission->name }}</li>
                        <form action="{{route('permission.destroy',$permission->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{route("permission.edit",$permission->id)}}">Edit</a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
