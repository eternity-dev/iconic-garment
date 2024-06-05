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
                    <h1 class="fs-5" style="color: #292929">Order List</h1>
                    <table class="table table-success table-stripped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Code</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Note</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['orders'] as $key => $order) 
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ str($order->products[0]->product->name)->title() }}</td>
                                    <td>{{ $order->note }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a 
                                            href="{{ route('order.show', ['order' => $order]) }}"
                                            class="btn btn-success">DETAILS</a>
                                        @if (auth()->check() && $order->status == 'Pending')
                                            <a 
                                                href="{{ route("order.destroy", ['order' => $order]) }}"
                                                class="btn btn-danger">CANCEL</a>
                                        @endif
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
