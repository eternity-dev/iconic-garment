@extends('layouts.main')
@section('css') @endsection
@section('js') @endsection
@section('content')
    <form action="{{ route('auth.register.post') }}" method="POST">\
        @csrf
        <div>
            <label for="name">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                autocomplete="off" />
        </div>
        <div>
            <label for="email">Email</label>
            <input
                type="text"
                name="email"
                id="email"
                autocomplete="off" />
        </div>
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
        <div>
            <label for="phone">Phone</label>
            <input
                type="text"
                name="phone"
                id="phone"
                autocomplete="off" />
        </div>
        <button type="submit">Login</button>
    </form>
@endsection
