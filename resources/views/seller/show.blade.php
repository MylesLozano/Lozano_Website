@extends('layouts.app')

@section('content')
    <div class="container mt-2 ms-2">
        <h3 class="text-start"><a href="{{ route('seller.home') }}">Back to Home</a></h3>
    </div>
    <h2 class="text-center">My Products</h2>
    <div class="container mt-5">
        @foreach ($products as $product)
            <div class="row mb-4">
                <div class="col-md-6">
                    @if ($product->images->count() > 0)
                        <img src="{{ asset($product->images->first()->url) }}" class="d-block w-100" alt="Product">
                    @else
                        <p>No image available</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ number_format($product->price, 2) }}</p>
                    <p>Stock Quantity: {{ $product->quantity }}</p>

                    <!-- Edit Product -->
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>

                    <!-- Delete Product -->
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
