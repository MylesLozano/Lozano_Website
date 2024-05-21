@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
                <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="50" height="50"
                    class="d-inline-block align-text-top">
                <h4 class="ms-3">Spotlight Products Promotion</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <ul></ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <a class="nav-link d-flex align-items-center" href="{{ route('user.auth.signout') }}">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center mt-4">Welcome, {{ $user->firstName }}!</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Pending Orders:
                        {{ $pendingOrdersCount }}</a>
                    <a href="#" class="list-group-item list-group-item-action">Cart Items: {{ $cartItemsCount }}</a>
                    <a href="{{ route('cart.view') }}" class="list-group-item list-group-item-action">My Cart</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset($product->images->first()->url) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('images/Spotlight Shop.png') }}" class="card-img-top"
                                        alt="Default Image">
                                @endif
                                <div class="card-body">
                                    <h3 class="card-title">Retailer: {{ $product->seller->name }}</h3>
                                    <h4 class="card-text">{{ $product->name }}</h4>
                                    <h5 class="card-text text-success">Price: ${{ $product->price }}</h5>
                                    <p class="card-text text-primary">Stock Quantity: {{ $product->quantity }}</p>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <a href="{{ route('user.show', $product->id) }}" class="btn btn-primary">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
