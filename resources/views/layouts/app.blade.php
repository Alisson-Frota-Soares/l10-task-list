<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Task List App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <div class="container">
        @if (session()->has('success'))
            <article>{{session('success')}}</article>
        @endif
        <h1>@yield('title')</h1>

        @yield('content')
    </div>
</body>

</html>
