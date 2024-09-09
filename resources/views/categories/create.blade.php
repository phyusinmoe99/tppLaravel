<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="w-1/2 mx-auto">
        <h1>Create Category</h1>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Name:"
                class="border border-gray-800">
            <button type="submit" name="submit" class="border border-yellow-600 p-2 rounded-lg">Add</button>
            <div>
                <a href="{{ route('categories.index') }}"
                    class="border border-blue-400 text-lg rounded-lg px-2 py-1 text-blue-400 float-end">Back</a>
            </div>
        </form>


    </div>

</body>

</html>
