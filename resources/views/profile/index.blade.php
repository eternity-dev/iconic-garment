@extends('layouts.main')

@section('content')
    @if (session()->has('message'))
        <div class="w-50 alert alert-info mt-4 mx-auto" style="margin-bottom: -30px">
            {{ session()->pull('message') }}
        </div>
    @endif
    <div 
        class="container-sm card w-50 mt-5 mb-5 p-0 d-flex justify-content-center align-items-center"
        style="background-color: #c0cfb2">
        <div class="card-body w-100 pe-4 py-4">
            <div class="row pe-1">
                <div class="col-4 d-flex justify-content-center">
                    <img src="{{ $data['user']->image_url ?? '/images/profile.jpg' }}" alt="User profile image" width="200" height="200">
                </div>
                <div class="col">
                    <h1 class="fs-5" style="color: #292929">{{ $data['user']->name }}</h1>
                    <h2 class="fs-5" style="color: #44624a">{{ '@' . $data['user']->username }}</h2>
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @method('put')
                        @csrf
                        <h6 class="mt-4">Data Personal</h6>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control" 
                                    id="email"
                                    name="profile[email]" 
                                    value="{{ $data['user']->email }}" />
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="phone" class="col-sm-4 col-form-label">No. Tlp</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control" 
                                    id="phone"
                                    name="profile[phone]" 
                                    value="{{ $data['user']->phone }}" />
                                @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <h6 class="mt-4">Data Alamat</h6>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="address" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                            <div class="col">
                                <textarea 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control"
                                    id="address"
                                    name="address[address]">{{ $data['user']->address->address }}</textarea>
                                @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="city" class="col-sm-4 col-form-label">Kota</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control"
                                    id="city" 
                                    name="address[city]"
                                    value="{{ $data['user']->address->city }}" />
                                @error('city')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="province" class="col-sm-4 col-form-label">Provinsi</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control"
                                    id="province" 
                                    name="address[province]"
                                    value="{{ $data['user']->address->province }}" />
                                @error('province')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="country" class="col-sm-4 col-form-label">Negara</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control"
                                    id="country" 
                                    name="address[country]"
                                    value="{{ $data['user']->address->country }}" />
                                @error('country')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row" style="color: #44624a">
                            <label for="zip" class="col-sm-4 col-form-label">Kode Pos</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control"
                                    id="zip" 
                                    name="address[zip]"
                                    value="{{ $data['user']->address->zip }}" />
                                @error('zip')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn mt-3" style="background-color: #8ba888">Edit Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
