<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>

<body>
    <h1>Student Index Page</h1>
    @foreach ($students as $stu)
        <p>{{ $stu['name'] }}</p>
    @endforeach

</body>

</html>
