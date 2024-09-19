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
                        <select name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{$role->id == $selectRoleId ? 'selected' : ''}}>
                                    {{ $role->name }}</option>
                            @endforeach
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
