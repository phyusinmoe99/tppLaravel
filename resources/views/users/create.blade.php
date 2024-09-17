@extends('layouts.master')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div>
                
                <form action="{{ route('users.store') }}" method="post">
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
                        <button type="submit" name="submit">Create</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection
