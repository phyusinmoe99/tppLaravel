@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div>

                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="name">Name : </label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div>
                        <label for="email">Email : </label>
                        <input type="email" name="email" id="email" />
                    </div>
                    <div>
                        <label for="password">Password : </label>
                        <input type="password" name="password" id="password" />
                    </div>
                    <div>
                        <label for="password_confirmation">Comfirm Password : </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" />
                    </div>
                    <div>
                        <label for="profile">Select Profile :</label>
                        <input type="file" name="profile" id="profile"/>
                    </div>
                    <div>
                        <select name="status" id="status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                    <div>
                        <label for="role">Select Role : </label>
                        <select name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @foreach ($roles as $role)
                            <h2>{{ $role->name }}</h2>
                            <ul>
                                @foreach ($role->permissions as $permission)
                                    <li>
                                        {{ $permission->name }}
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach



                    </div>


                    <div>
                        <button type="submit" name="submit">Create</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection
