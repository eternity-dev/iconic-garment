@extends('layouts.auth')
@section('content')
    <form 
        action="{{ route('auth.login.post') }}" 
        method="POST"
        class="d-flex flex-column gap-3" 
        style="width: 350px">
        @csrf
        <header>
            <div class ="d-flex justify-content-center">
                <img src="/images/logo.png" alt="logo.png" width="250" height="250">
            </div>
        </header>
        <div>
            <div class="mb-3">
                <label for="username" style="color:#44624a">Username</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="username"
                    name="username" 
                    placeholder="Username"
                    autocomplete="off" />
            </div>
            <div class="mb-3">
                <label for="password" style="color:#44624a">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password"
                    name="password" 
                    placeholder="Password" />
            </div>
        </div>
        <div class="d-grid">
            <button class="btn btn-success" style="background-color: #8ba888">
                Sign In
            </button>
        </div>
        <div class="d-grid">
            <a 
                href="{{ route('auth.register.get') }}"
                class="btn btn-success" 
                style="background-color: #8ba888">
                Sign Up
            </a>
        </div>
    </form>
@endsection
