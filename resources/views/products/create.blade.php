<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-800 text-slate-50">

    <div class="w-1/2 mx-auto">
        <h1 class="font-bold text-3xl text-center my-5">Products Create</h1>

        @if ($errors->any())
            <div class="border border-red-700 rounded-lg p-4 text-red-700 mb-4">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif
        <div>
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="text-xl font-semibold">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Product Name"
                        class="w-full border-b border-b-slate-300 p-2 bg-gray-800 focus:outline-none" />
                </div>
                <div class="mb-4">
                    <label for="description" class="text-xl font-semibold">Description</label>
                    <input type="text" name="description" id="description" placeholder="Enter Product Description"
                    class="w-full border-b border-b-slate-300 p-2 bg-gray-800 focus:outline-none"  />
                </div>
                <div class="mb-4">
                    <label for="price" class="text-xl font-semibold" class="text-xl font-bold">Price</label>
                    <input type="text" name="price" id="price" placeholder="Enter Price"
                    class="w-full border-b border-b-slate-300 p-2 bg-gray-800 focus:outline-none"  />
                </div>
                <div class="mb-4">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" value="1" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium">Active | Suspend</span>
                    </label>
                </div>
                <button type="submit" class="w-full border rounded-lg p-2 bg-blue-600 border-gray-800">ADD</button>

            </form>

        </div>



    </div>
</body>

</html>
