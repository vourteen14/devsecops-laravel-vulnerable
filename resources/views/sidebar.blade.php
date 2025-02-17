<!-- resources/views/partials/sidebar.blade.php -->
<aside class="w-64 bg-blue-900 text-white h-screen p-5 hidden md:block">
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
    <nav>
        <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a>
        <a href="{{ route('users') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Users</a>
        <a href="{{ route('gallery') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Gallery</a>
        <a href="{{ route('upload') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Upload</a> 
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="block w-full text-left py-2 px-4 rounded hover:bg-red-600">Logout</button>
        </form>
    </nav>
</aside>
