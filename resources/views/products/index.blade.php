<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="w-3/4 mx-auto">
        <h1 class="font-bold text-3xl text-center my-5">Products Lists</h1>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($products as $product)
                <div class="border rounded-lg p-5">
                    <h1 class="text-xl font-semibold mb-2">{{ $product['name'] }}</h1>
                    <p class="mb-2">{{ $product['description'] }}</p>
                    <p class="mb-4">Price -> {{ $product['price'] }}</p>
                    <div>
                        <a href="{{route('products.edit')}}" class="border-yellow-500 border text-yellow-500 rounded-lg p-2">Edit</a>
                        <a href="{{}}" class="border-red-600 border text-red-600 rounded-lg p-2">Delete</a>

                    </div>
                </div>

            @endforeach


        </div>
    </div>












</body>

</html>
