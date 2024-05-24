@extends('layouts.main')
@section('css') @endsection
@section('js') @endsection
@section('content')
    <form action="{{ route('auth.login.post') }}" method="POST">
        @csrf
        <div>
            <label for="username">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                autocomplete="off" />
        </div>
        <div>
            <label for="password">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                autocomplete="off" />
        </div>
        <button type="submit">Login</button>
    </form>
@endsection
