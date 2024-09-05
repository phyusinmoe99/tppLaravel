<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    @vite('resources/css/app.css')

</head>

<body>
    <h1 class="text-xl text-center font-bold m-4">Articles</h1>
    <div class="w-1/2 mx-auto">
        @foreach ($articles as $article)
            <ul class="border border-black-500 rounded-lg mb-2 p-2">
                <li>{{ $article['title'] }}</li>
                <li>{{ $article['description'] }}</li>
                <li>By : {{ $article['author'] }}</li>
                
            </ul>
        @endforeach
    </div>




</body>

</html>
