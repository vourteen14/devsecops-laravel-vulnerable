@extends('app')
@section('title', 'Gallery')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h2 class="text-2xl font-semibold mb-4">Uploaded Images</h2>
        
        @if(session('success'))
            <p class="text-green-600 mb-4">{{ session('success') }}</p>
        @endif

        @if($images->isEmpty())
            <p class="text-gray-600">No images uploaded yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $image)
                    <div class="border rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Uploaded Image" class="w-full h-48 object-cover">
                        <div class="p-2 text-center">
                            <p class="text-sm text-gray-700 truncate">{{ $image->filename }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
