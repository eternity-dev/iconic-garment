@extends('layouts.auth')
@section('content')
    <div 
        class="card d-flex align-items-center justify-content-center px-4" 
        style="background-color: #c0cfb2; min-width: 600px">
        <div class="card-body w-100 py-0">
            <div class="d-flex align-items-center justify-content-center">
                <img src="/images/logo.png" width="150" height="150">
            </div>
            <h3 class="text-center mb-5" style="color: #44624a; text-transform: uppercase">Register - Garment Partnership</h3>
            <form
                action="{{ route('auth.register-garment.post') }}" 
                method="POST"
                style="color: #44624a"
                enctype="multipart/form-data">
                @csrf
                <div class="mt-3 mb-2">
                    <h5>Garment Information</h5>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="name" 
                            name="name"
                            autocomplete="off"
                            value="{{ old('name') }}" />
                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="username" 
                            name="username"
                            autocomlete="off"
                            value="{{ old('username') }}" />
                        @error('username')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="email" 
                            name="email"
                            autocomplete="off"
                            value="{{ old('email') }}" />
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col">
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                        <ul class="pt-1" style="margin-left: -12px">
                            <li>Must be 8-20 characters long.</li>
                            <li>Must contain at least one capital letter.</li>
                            <li>Must contain at least one symbol.</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="confirm_password" class="col-sm-4 col-form-label">Repeat Password</label>
                    <div class="col">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        @error('confirm_password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-4 col-form-label">No. Tlpn</label>
                    <div class="col-sm-6">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="phone" 
                            name="phone"
                            autocomplete="off"
                            value="{{ old('phone') }}" />
                        @error('phone')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="formFile" class="col-sm-4 col-form-label">Garment's Logo</label>
                    <div class="col">
                        <input class="form-control" name="logo" type="file" id="formFile">
                    </div>
                    @error('logo')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mt-4 mb-2">
                    <h5>Garment Address Information</h5>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col">
                        <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
                        @error('address')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="city" class="col-sm-4 col-form-label">Kota</label>
                    <div class="col">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="city" 
                            name="city"
                            autocomplete="off"
                            value="{{ old('city') }}" />
                            @error('city')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="province" class="col-sm-4 col-form-label">Provinsi</label>
                    <div class="col">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="province" 
                            name="province"
                            autocomplete="off"
                            value="{{ old('province') }}" />
                            @error('province')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="country" class="col-sm-4 col-form-label">Negara</label>
                    <div class="col">
                        <input 
                            type="text" 
                            class="form-control"    
                            id="country"   
                            name="country"
                            autocomplete="off"
                            value="{{ old('country') }}" />
                            @error('country')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="zip" class="col-sm-4 col-form-label">Kode Pos</label>
                    <div class="col-sm-6">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="zip" 
                            name="zip"
                            autocomplete="off"
                            value="{{ old('zip') }}" />
                        @error('zip')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 mb-5">
                        <button type="submit" class="btn btn-success" style="background-color: #8ba888">Register</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
