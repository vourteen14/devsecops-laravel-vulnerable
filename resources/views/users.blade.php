@extends('app')
@section('title', 'User List')
@section('content')
    <div class="container">
        <!-- Search Form -->
        <form method="GET" action="{{ url('/users') }}" style="margin-bottom: 20px;">
            <label for="name" style="font-size: 16px; font-weight: bold;">Search by Name:</label>
            <input type="text" id="name" name="name" value="{{ request()->input('name') }}" 
                   style="padding: 8px; font-size: 16px; border-radius: 4px; border: 1px solid #ccc; margin-right: 10px;">
            <button type="submit" style="padding: 8px 16px; background-color: #007bff; color: white; border: none; 
                                         border-radius: 4px; cursor: pointer; font-size: 16px;">Search</button>
        </form>

        <!-- Users List -->
        <h2 style="margin-bottom: 20px;">Users List (Filtered by Name: "{{ $name }}")</h2>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f4f4f4; text-align: left;">
                    <th style="padding: 12px; border: 1px solid #ddd; font-weight: bold;">ID</th>
                    <th style="padding: 12px; border: 1px solid #ddd; font-weight: bold;">Name</th>
                    <th style="padding: 12px; border: 1px solid #ddd; font-weight: bold;">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px; font-size: 16px; border-right: 1px solid #ddd;">{!! $user->id !!}</td>
                        <td style="padding: 12px; font-size: 16px; border-right: 1px solid #ddd;">{!! $user->name !!}</td>
                        <td style="padding: 12px; font-size: 16px;">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
