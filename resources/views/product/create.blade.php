@extends('layouts.main')
@section('content')
    <div class="mx-auto mt-5" style="width: 35%">
        <header class="text-center">
            <h4>New Product</h4>
        </header>
        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="w-100 mx-auto mt-4">
                <div class="row mb-3">
                    <div class="col-4">Product Name</div>
                    <div class="col">
                        <input  
                            type="text"
                            name="name"
                            placeholder="Type product name..."
                            class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">Product Description</div>
                    <div class="col">
                        <textarea name="description" id="description" class="form-control" placeholder="Type product description..."></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">Thumbnail Image</div>
                    <div class="col">
                        <input  
                            type="file"
                            name="thumbnail_image"
                            placeholder="Type product name..."
                            class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">Additional Images</div>
                    <div class="col">
                        <input  
                            type="file"
                            name="additional_images"
                            placeholder="Type product name..."
                            class="form-control"
                            multiple />
                    </div>
                </div>
                <div class="mb-3 d-grid">
                    <button class="btn btn-success">Add New Product</button>
                </div>
            </div>
        </form>
    </div>
@endsection