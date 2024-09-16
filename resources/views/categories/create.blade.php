@extends('layouts.master')
@section('content')
<div class="w-1/2 mx-auto">
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name:"
            class="border border-gray-800">
            <div>
                <label for="image">Choose Image:</label>
                <input type="file" name="images[]" id="image" multiple />
            </div>
        <button type="submit" name="submit" class="border border-yellow-600 p-2 rounded-lg">Add</button>
        <div>
            <a href="{{ route('categories.index') }}"
                class="border border-blue-400 text-lg rounded-lg px-2 py-1 text-blue-400 float-end">Back</a>
        </div>
    </form>


</div>
@endsection



