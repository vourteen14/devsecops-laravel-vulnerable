@extends('app')
@section('title', 'Upload File')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800">Upload a File</h1>
    <div class="mt-6 bg-white p-6 rounded-lg shadow">
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-gray-700">Choose a file to upload</label>
                <input type="file" name="file" id="file" class="mt-2 p-2 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-500">Upload</button>
        </form>
    </div>
@endsection
