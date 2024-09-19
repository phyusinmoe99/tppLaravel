@extends('layouts.master')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div>
            <form action="{{ route('role.update',$role->id) }}" method="POST">
                @csrf
                @method('put')
                <div>
                    <label for="name">Role Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter Role Name" value="{{$role->name}}">
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
