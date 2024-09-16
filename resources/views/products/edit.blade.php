
@extends('layouts.master')
@section('content')
<div class="w-1/2 mx-auto">
    <h1 class="font-bold text-3xl text-center my-5">Products Edit</h1>
    @if ($errors->any())
        <div class="border border-red-700 rounded-lg p-4 text-red-700 mb-4">
            @foreach ($errors->all() as $err)
                {{ $err }}
            @endforeach
        </div>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="name" class="text-xl font-semibold">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Product Name"
                class="w-full border-b border-b-slate-300 p-2 bg-gray-800 focus:outline-none"
                value="{{ $product->name }}">
        </div>
        <div class="mb-4">
            <label for="description" class="text-xl font-semibold">Description</label>
            <input type="text" name="description" id="description" placeholder="Enter Product Name"
                class="w-full border-b border-b-slate-300 p-2 bg-gray-800 focus:outline-none"
                value="{{ $product->description }}">
        </div>
        <div class="mb-4">
            <label for="price" class="text-xl font-semibold">Price</label>
            <input type="text" name="price" id="price" placeholder="Enter Product Name"
                class="w-full border-b border-b-slate-300 p-2 bg-gray-800 focus:outline-none"
                value="{{ $product->price }}">
        </div>
        <div class="mb-4">
            <label for="image" class="text-xl font-semibold" class="text-xl font-bold">Image</label>
            <img src="{{asset('productImages/'. $product->image)}}" alt="{{$product->image}}" class="w-[70px] h-[70px] border rounded-lg "/>
        </div>
        <div class="mb-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="status" value="1" {{ $product->status ? 'checked' : '' }}
                    class="sr-only peer">
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none  dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ms-3 text-sm font-medium">Active|Suspend</span>
            </label>
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category )
                <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>

                @endforeach

            </select>
        </div>

        <button type="submit" name="edit" class="bg-yellow-600 w-full border border-gray-800 rounded-lg p-2">Edit</button>

    </form>

</div>

@endsection




