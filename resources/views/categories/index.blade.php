<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-1/2 mx-auto mt-8">
        <h1 class="font-bold text-xl text-center">Category List
            <a href="{{route('categories.create')}}" class="border border-blue-800 rounded-lg p-2 text-lg text-blue-800">+ADD</a>
        </h1>

        <ul class="list-none">
            @foreach ($category as $c)
                <li class="border-b border-b-black-500 mb-2 p-4">
                    {{ $c['id'] }} . {{ $c['name'] }}
                    <a href="{{route('categories.edit', $c['id'])}}" class="border border-yellow-400 text-lg rounded-lg px-2 py-1 text-yellow-400 float-end">Edit</a>
                    <form action="{{route('categories.delete',$c['id'])}}" method="post">
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach

        </ul>

    </div>




</body>

</html>
