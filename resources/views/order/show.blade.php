@extends('layouts.main')

@section('content')
    @if (session()->has('message')) 
        <div class="alert alert-info w-75 mx-auto mt-4" style="margin-bottom: -15px">
            {{ session()->pull('message') }}
        </div>
    @endif
    <div class="container-sm card mt-5 mb-5 py-3 d-flex justify-content-center align-items-center"
        style="background-color: #c0cfb2; width: 35%">
        <div class="card-body w-100">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="fs-5" style="color: #292929">Order Details</h1>
                    <form 
                        action="{{ route('order.update', ['order' => $data['order']]) }}" 
                        method="POST" 
                        class="mt-4">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                            <div class="col-4">Nama Produk</div>
                            <div class="col-4">{{ str($data['order']->products[0]->product->name)->title }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">Garmen Pembuat Produk</div>
                            <div class="col-4">{{ str($data['order']->products[0]->product->garment->name)->title }}</div>
                        </div>
                        <div class="row mb-3">
                            <label for="code" class="col-4 col-form-label">Code Order</label>
                            <div class="col">
                                <input 
                                    type="text" 
                                    style="color: #44624a" 
                                    class="form-control-plaintext"
                                    id="code" 
                                    value="{{ $data['order']->code }}"
                                    disabled />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">Status</div>
                            <div class="col">
                                {{ $data['order']->status->value }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="qty" class="col-4 col-form-label">Total Qty</label>
                            <div class="col">
                                <input 
                                    type="number"
                                    id="qty"
                                    class="form-control"
                                    name="qty"
                                    value="{{ $data['order']->total_qty }}"
                                    @if (auth()->guard('garment')->check()) disabled @endif
                                    @if ($data['order']->status->value != 'Pending') disabled @endif />
                                @error('qty')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="note" class="col-4 col-form-label">Note</label>
                            <div class="col">
                                <textarea 
                                    class="form-control" 
                                    id="note" 
                                    name="note" 
                                    rows="2"
                                    @if (auth()->guard('garment')->check()) disabled @endif
                                    @if ($data['order']->status->value != 'Pending') disabled @endif>{{ $data['order']->note }}</textarea>
                                @error('note')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        @if (auth()->guard('garment')->check()) 
                            <div class="mb-3 row">
                                <label for="status" class="col-4 col-form-label">Status</label>
                                <div class="col">
                                    <select name="status" id="status" class="form-select">
                                        @foreach (App\Enums\OrderStatus::cases() as $case) 
                                            @if ($data['order']->status->value == $case->value)
                                                <option value="{{ $case->value }}" selected>{{ $case->value }}</option>
                                            @else
                                                <option value="{{ $case->value }}">{{ $case->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="price" class="col-4 col-form-label">Price</label>
                                <div class="col">
                                    <input 
                                        type="number"
                                        id="price"
                                        class="form-control"
                                        name="price"
                                        placeholder="Type the price..."
                                        value="{{ $data['order']->total_price }}" />
                                    @error('price')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        @if (auth()->guard('garment')->check() || $data['order']->status->value == 'Pending') 
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success mt-3" style="background-color: #44624a">Save Changes</button>
                                <button type="reset" class="btn btn-success mt-3" style="background-color: #8ba888">Reset</button>
                            </div>
                        @elseif ($data['order']->status->value == 'Approved' && $data['order']->payment->status->value != 'Pending')
                            <a 
                                href="{{ route('payment.pay.index', ['order' => $data['order']->code]) }}" 
                                class="btn btn-success">Pay</a>
                        
                        @elseif ($data['order']->payment)
                            <h5 class="mb-3">Payment Information</h5>
                            <div class="row mb-3">
                                <div class="col-4">Payment Id</div>
                                <div class="col">
                                    <span>: </span>
                                    <span>{{ $data['order']->payment->trx_id }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">Payment Status</div>
                                <div class="col">
                                    <span>: </span>
                                    <span>{{ $data['order']->payment->status->value }}</span>
                                </div>
                            </div>
                        @endif
                    </form>
                    @if (auth()->guard('garment')->check())
                        <div class="mt-5">
                            <h5>Payment Details</h5>
                            <form action="{{ route('payment.pay.put', ['payment' => $data['order']->payment->trx_id ])}}" method="POST" class="mt-4">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <div class="col-4">Payment ID</div>
                                    <div class="col">{{ $data['order']->payment->trx_id }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">Payment Amount</div>
                                    <div class="col">{{ $data['order']->payment->amount }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">Payment Method</div>
                                    <div class="col">{{ $data['order']->payment->method }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">Payment Status</div>
                                    <div class="col">
                                        <select name="status" id="status" class="form-select">
                                            @foreach (App\Enums\PaymentStatus::cases() as $status)
                                                @if ($data['order']->payment->status->value == $status->value)
                                                    <option value="{{ $status->value }}" selected>{{ $status->value }}</option>
                                                @else
                                                    <option value="{{ $status->value }}">{{ $status->value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">Proof Image</div>
                                    <div class="col">
                                        <img 
                                            src="{{ Storage::url($data['order']->payment->proof_image_url) }}" 
                                            alt="Proof image"
                                            class="img-fluid" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success" style="background-color: #44624a">Update Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
