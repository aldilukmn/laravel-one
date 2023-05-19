<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <header>
            @include('partials.header')
        </header>
        <main class="flex-grow-1 mx-auto my-5 w-50">
            @yield('main')
        </main>
        <footer class="py-2 bg-dark text-white">
            @include('partials.footer')
        </footer>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/myscript.js') }}"></script>
</body>

</html>
