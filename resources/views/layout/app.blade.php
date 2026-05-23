<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>@yield('title', 'students CRUD')</title> --}}
    <title>
@hasSection('title')
        @yield('title') | Students CRUD
    @else
        Students CRUD
    @endif
    </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-dark">
    <div id="app">
        <main class="py-4">
        @yield('content')
        </main>
    </div>
@yield('scripts')
</body>
</html>
