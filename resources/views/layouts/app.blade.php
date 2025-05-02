<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Candy') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <style>
        
.filled-star {
  fill: #f5a623; /* Color for filled stars */
}

.empty-star {
  fill: #ccc; /* Color for empty stars */
}


.reviews-group {
  /* Adjust the styling of the star group as needed */
  display: inline-block;
}

    </style>
</head>
<body>
    <div id="app">

   

        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
