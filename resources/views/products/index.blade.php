<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-800 text-slate-50">

    <div class="w-3/4 mx-auto">
        <h1 class="font-bold text-3xl my-8">Products Lists
            <a href="{{route('products.create')}}" class="border rounded-lg p-2 text-lg float-end font-normal hover:p-4 hover:font-semibold hover:rounded-xl hover:text-blue-500 hover:border-blue-500">+Add new product</a>
        </h1>


        <div class="grid grid-cols-4 gap-4 mt-4">
            @foreach ($products as $product)
                <div class="border rounded-lg p-5">
                    <h1 class="text-2xl font-semibold mb-2">{{ $product['name'] }}
                        <span class="text-sm {{$product['status'] ? 'text-green-600' : 'text-red-600'}} ">{{$product['status']  ? 'Active' : 'Suspend'}}</span>
                    </h1>
                    <p class="mb-2 text-sm text-slate-200">{{ $product['description'] }}</p>
                    <p class="mb-4">Price -> {{ $product['price'] }}</p>
                    <div class="flex gap-x-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="border-yellow-500 border text-yellow-500 rounded-lg p-2 hover:bg-yellow-500 hover:text-black hover:text-lg hover:font-semibold">Edit</a>
                        <form action="{{ route('products.delete', $product->id) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="border-red-600 border text-red-600 rounded-lg p-2 hover:bg-red-600 hover:text-slate-900 hover:text-lg hover:font-semibold">Delete</button>

                        </form>


                    </div>
                </div>
            @endforeach


        </div>
    </div>












</body>

</html>
