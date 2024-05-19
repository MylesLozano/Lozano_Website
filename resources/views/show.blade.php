@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @foreach ($products as $product)
            <div class="row mb-4">
                <div class="col-md-6">
                    @if ($product->images->count() > 0)
                        <img src="{{ Storage::url($product->images->first()->url) }}" class="d-block w-100" alt="Product">
                    @else
                        <p>No image available</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ number_format($product->price, 2) }}</p>

                    <!-- Update Product Form -->
                    <form action="{{ route('products.updateProduct', $product->id) }}" method="POST"
                        enctype="multipart/form-data" class="mb-2">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Product Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price"
                                value="{{ $product->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Product Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>

                    <!-- Delete Product Form -->
                    <form action="{{ route('products.deleteProduct', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Product</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
