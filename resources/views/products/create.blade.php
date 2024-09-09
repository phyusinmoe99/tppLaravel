<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-3/4 mx-auto">
        <form action="{{route('products.store')}}" method="post">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="border-b border-b-gray-800" >
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="border-b border-b-gray-800">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="border-b border-b-gray-800" >
            </div>
            <div>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="border-b border-b-gray-800" >
            </div>
            <button type="submit">ADD</button>

        </form>

    </div>
</body>
</html>
