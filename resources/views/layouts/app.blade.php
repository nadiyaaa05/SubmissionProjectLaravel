<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Praktikum')</title>
    @stack('styles')
</head>
<body>
    @include('partials.navbar')
    <main>@yield('content')</main>
    <footer>&copy; {{ date('Y') }}</footer>
    @stack('scripts')
</body>
</html>