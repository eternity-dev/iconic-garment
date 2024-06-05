@extends('layouts.main')

@section('content')
    <div class="container mx-auto py-4">
        <div class="row">
            <div class="col-4">
                <img 
                    src="{{ $data['product']->images[0]->url }}" 
                    alt="{{ $data['product']->images[0]->alt }}"
                    style="width: 100%; object-fit: cover; object-position: center;">
            </div>
            <div class="col">
                <header class="d-flex justify-content-between align-items-end">
                    <div>
                        <h3>{{ str($data['product']->name)->title() }}</h3>
                        <span class="d-flex align-items-center gap-1 text-muted">
                            <span class="pe-3">Posted By </span>
                            @if (auth()->check())
                                <span class="pe-1">
                                    <img 
                                        src="{{ $data['product']->garment->image_url }}" 
                                        alt="Garment's profile image"
                                        style="width: 1.6rem; margin-top: -5px">
                                </span>
                                <span class="fw-bold">{{ $data['product']->garment->name }} </span>
                                <span>({{ $data['product']->garment->phone }})</span>
                            @elseif (auth()->guard('garment')->check())
                                @if ($data['product']->garment->id == auth()->guard('garment')->user()->id) 
                                    <span style="margin-left: -1rem">Me</span>
                                @endif
                            @endif
                        </span>
                    </div>
                    <div>
                        @if (auth()->check())
                        <a 
                            href="{{ route('order.create', ['product' => $data['product']]) }}" 
                            class="btn text-light" 
                            style="background-color: #44624a">Order Now</a>
                        @endif
                    </div>
                </header>
                <main class="mt-4">
                    <div>
                        <h6 class="text-muted">Deskripsi Produk</h6>
                        <p>{{ $data['product']->description }}</p>
                    </div>
                    <div>
                        <h6 class="text-muted">Gambar-Gambar Produk</h6>
                        <div class="row mt-3 row-gap-4">
                            @forelse ($data['product']->images->skip(1) as $productImage)
                                <div class="col-3">
                                    <img 
                                        src="{{ $productImage->url }}" 
                                        alt="{{ $productImage->alt }}"
                                        style="width: 100%">
                                </div>
                            @empty
                                <div>Oops! Sepertinya produk ini tidak memiliki gambar tambahan di dalamnya.</div>
                            @endforelse
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection