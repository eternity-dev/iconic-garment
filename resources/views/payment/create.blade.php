@extends('layouts.main')
@section('content')
    <div class="mx-auto mt-5" style="width: 35%">
        <header class="text-center">
            <h4>Pay Order</h4>
        </header>
        <main>
            <div class="mt-4">
                <h5>Product Information</h5>
                @foreach ($data['order']->products as $oP)
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ str($oP->product->name)->title() }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">Garment</div>
                                <div class="col">
                                    <span>: </span>
                                    <span>{{ $oP->product->garment->name }} pcs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <h5>Order Information</h5>
                <div class="card">
                    <div class="card-header">
                        <strong>Order #{{ $data['order']->code }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4">Total Qty</div>
                            <div class="col">
                                <span>: </span>
                                <span>{{ $data['order']->total_qty }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Total Price</div>
                            <div class="col">
                                <span>: </span>
                                <span>IDR {{ number_format($data['order']->total_price,2,",",".") }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Note</div>
                            <div class="col">
                                <span>: </span>
                                <span>{{ $data['order']->note }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Order Status</div>
                            <div class="col">
                                <span>: </span>
                                <span>{{ $data['order']->status->value }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h5>Payment Information</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4">Method</div>
                            <div class="col">
                                <span>: </span>
                                <span>Bank Transfer</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Bank Type</div>
                            <div class="col">
                                <span>: </span>
                                <span>BCA</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Bank Account</div>
                            <div class="col">
                                <span>: </span>
                                <span>123412349</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Account Holder</div>
                            <div class="col">
                                <span>: </span>
                                <span>Iconic Garment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('payment.pay.post', ['order' => $data['order']->code ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <div class="row">
                        <span class="col-4">Payment Proof</span>
                        <div class="col">
                            <input type="file" name="proof_image" class="form-control" id="proof_image"/>
                            @error('proof_image')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-grid">
                    <button class="btn btn-success">Pay Now</button>
                </div>
            </form>
        </main>
    </div>
@endsection