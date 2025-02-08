<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
    @include('sidebar')
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
        @yield('content')
    </main>

</body>
</html>