@extends('layouts.main')

@section('content')
    @if (session()->has('message')) 
        <div class="alert alert-info w-75 mx-auto mt-4" style="margin-bottom: -15px">
            {{ session()->pull('message') }}
        </div>
    @endif
    <div class="container-sm card w-75 mt-5 mb-5 d-flex justify-content-center align-items-center"
        style="background-color: #c0cfb2">
        <div class="card-body w-100 mt-3 pb-0 pt-2">
            <div class="row">
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="fs-5" style="color: #292929">Order List</h1>
                        <div class="d-flex">
                            <a href="{{ route('product.create') }}" class="btn btn-success">New Product</a>
                        </div>
                    </div>
                    <table class="table table-success table-stripped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Is Available</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['products'] as $key => $product) 
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <img src="{{ $product->images[0]->url }}" alt="Product image" class="img-thumbnail" width="100">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->is_available ? 'Yes' : 'No' }}</td>
                                    <td class="">
                                        <a 
                                            href="{{ route('product.show', ['product' => $product]) }}"
                                            class="btn btn-success">DETAILS</a>
                                        <a 
                                            class="btn btn-danger">CANCEL</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="7">Tidak Ada Data Untuk Saat Ini</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
