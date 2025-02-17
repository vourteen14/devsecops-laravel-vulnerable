@extends('app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        @if($user)
            <h2 style="margin-bottom: 20px; text-align: center;">Welcome, {{ $user->name }}</h2>

            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #f4f4f4; text-align: left;">
                        <th style="padding: 12px; border: 1px solid #ddd; font-weight: bold;">Name</th>
                        <th style="padding: 12px; border: 1px solid #ddd; font-weight: bold;">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px; font-size: 16px; border-right: 1px solid #ddd;">{{ $user->name }}</td>
                        <td style="padding: 12px; font-size: 16px;">{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
        @endif
    </div>
@endsection
