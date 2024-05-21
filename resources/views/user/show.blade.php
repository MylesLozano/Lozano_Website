@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                @if ($product->images->isNotEmpty())
                    <img src="{{ asset($product->images->first()->url) }}" class="img-fluid" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/Spotlight Shop.png') }}" class="img-fluid" alt="Default Image">
                @endif
            </div>
            <div class="col-md-6">
                <h3>{{ $product->name }}</h3>
                <p>Price: ${{ number_format($product->price, 2) }}</p>
                <p>{{ $product->description }}</p>
                <p>Available Quantity: {{ $product->quantity }}</p>

                <form action="{{ route('cart.add') }}" method="POST" class="mb-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" style="width: 50%" id="quantity" name="quantity" class="form-control"
                            min="1" max="{{ $product->quantity }}" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                </form>

                <form action="{{ route('order.place') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" style="width: 50%" id="quantity" name="quantity" class="form-control"
                            min="1" max="{{ $product->quantity }}" value="1">
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" style="width: 50%" class="form-control" id="payment_method"
                            name="payment_method" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <input type="text" style="width: 50%" class="form-control" id="shipping_address"
                            name="shipping_address" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Order Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
