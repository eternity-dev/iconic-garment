@extends('layouts.main')

@section('content')
    <div class="container-sm card w-75 mt-5 mb-5 d-flex justify-content-center align-items-center"
        style="background-color: #c0cfb2">
        <div class="card-body w-100">
            <div class="row py-3">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <img src="/images/logo.png" alt="logo.png" width="300" height="300">
                </div>
                <div class="col-6">
                    <h1 class="fs-5" style="color: #292929">Make Your Order!</h1>
                    <div class="mt-4">
                        <h6>Detail Produk</h6>
                        <div class="d-flex flex-column gap-2">
                            <div class="row">
                                <div class="col-4">Nama</div>
                                <div class="col">{{ str($data['product']->name)->title() }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Garmen</div>
                                <div class="col">{{ str($data['product']->garment->name)->title() }}</div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('order.store', ['product' => $data['product']]) }}" method="POST">
                        @csrf
                        <div class="mb-3 row mt-4">
                            <label for="qty" class="col-4 col-form-label">Jumlah Pesanan</label>
                            <div class="col">
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    id="qty" 
                                    name="qty"
                                    autocomplete="off"
                                    value="{{ old('qty') }}" />
                                @error ('qty')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="note" class="col-4 col-form-label">Details</label>
                            <div class="col">
                                <textarea 
                                    class="form-control" 
                                    id="note" 
                                    name="note" 
                                    rows="10">{{ old('note') }}</textarea>
                                @error ('note')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success mt-3" style="background-color: #44624a">Order</button>
                            <button type="reset" class="btn btn-success mt-3" style="background-color: #8ba888">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
