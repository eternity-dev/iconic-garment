@extends('layouts.main')

@section('content')
    <div class="container-md">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide mt-5">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner w-100 mx-auto mb-5">
                <div class="carousel-item active">
                    <img src="/images/carousel.png" class="d-block w-100" height="450"
                        alt="/images/carousel.png">
                </div>
                <div class="carousel-item">
                    <img src="/images/carousel.png" class="d-block w-100" height="450"
                        alt="/images/carousel.png">
                </div>
                <div class="carousel-item">
                    <img src="/images/carousel.png" class="d-block w-100" height="450"
                        alt="/images/carousel.png">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Garment List -->
        <div>
            <div class="row row-cols-1 row-cols-md-4 mt-3 gap-3 d-flex justify-content-center">
                @forelse ($data['products'] as $product)
                    <div class="card text-light p-0" style="max-width: 540px; background-color: #ffffff">
                        <div class="card-header d-flex gap-3 align-items-center bg-light">
                            <img src="{{ $product->garment->image_url }}" alt="ptbrothers.png" width="45" height="45">
                            <span class="text-dark p-0 m-0">
                                {{ $product->garment->name }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class ="d-flex justify-content-center mb-3">
                                <img src="{{ $product->images[0]->url }}" alt="image_baju.png" style="width: 100%">
                            </div>
                            <h5 class="text-dark">{{ str($product->name)->title() }}</h5>
                            <p class="card-text" style="color: #292929">
                                {{ str($product->description)->limit(100) }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-2 py-3">
                            <a 
                                href="{{ route('product.show', ['product' => $product]) }}"
                                class="btn text-dark" 
                                style="background-color: #8ba888">
                                Details
                            </a>
                            <a
                                href="/"
                                class="btn text-light" 
                                style="background-color: #44624a">
                                Order
                            </a>
                        </div>
                    </div>
                @empty
                    <div>
                        <h3>No Product To Be Displayed</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
