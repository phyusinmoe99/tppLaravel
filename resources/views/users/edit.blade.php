@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div>

                <form action="{{ route('users.update', $data->id) }}" method="post">
                    @csrf

                    <div>
                        <label for="name">Name : </label>
                        <input type="text" name="name" id="name" value="{{ $data->name }}" />
                    </div>
                    <div>
                        <label for="role">Select Role</label>
                        <select name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{$data->roles->contains($role->id) ? 'selected' : ''}}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status">Select Status</label>
                        <select name="status" id="status">
                            <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Inactive</option>
                            <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" name="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
