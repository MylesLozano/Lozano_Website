@extends('layouts.app')

@section('content')
    <!-- Navbar with logo -->
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
                <ul class="navbar-nav ms-auto">
                    <!-- Product Categories -->
                    <li class="nav-item dropdown m-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Category1</a></li>
                            <li><a class="dropdown-item" href="#">Category2</a></li>
                            <li><a class="dropdown-item" href="#">Category3</a></li>
                        </ul>
                    </li>

                    <!-- Register -->
                    @if (!Auth::check())
                        <li class="nav-item me-3 d-flex align-items-center">
                            <a class="nav-link" href="{{ route('choose-role') }}">
                                Register
                            </a>
                        </li>
                    @endif

                    <!-- Shopping Cart -->
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ Auth::check() ? route('user.show', $product->id) : route('user.auth.login') }}">
                            <img src="{{ asset('images/CartIcon.png') }}" alt="" width="50" height="50"
                                class="me-2">
                        </a>
                    </li>

                    <!-- User Profile -->
                    <li class="nav-item me-3 d-flex align-items-center">
                        @if (Auth::check())
                            @if (Auth::user()->type == 'seller')
                                <a class="nav-link" href="{{ route('seller.home') }}">
                                    <img src="{{ asset('images/ProfileIcon.png') }}" alt="" width="50"
                                        height="50" class="me-2">
                                    Home
                                </a>
                            @else
                                <a class="nav-link" href="{{ route('user.home') }}">
                                    <img src="{{ asset('images/ProfileIcon.png') }}" alt="" width="50"
                                        height="50" class="me-2">
                                    Home
                                </a>
                            @endif
                            <a class="nav-link" href="{{ route('user.auth.signout') }}">Logout</a>
                        @else
                            @if (Route::is('seller'))
                                <a class="nav-link" href="{{ route('user.auth.login') }}">
                                    <img src="{{ asset('images/ProfileIcon.png') }}" alt="" width="50"
                                        height="50">
                                </a>
                            @else
                                <a class="nav-link" href="{{ route('seller.auth.login') }}">
                                    <img src="{{ asset('images/ProfileIcon.png') }}" alt="" width="50"
                                        height="50">
                                </a>
                            @endif
                        @endif
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Product Carousel -->
    <h2 class="text-center mb-4 rainbow" id="scroll-text">FEATURES</h2>
    <div class="container mt-2 mb-2">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($products->chunk(3) as $key => $productSet)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <div class="row">
                            @foreach ($productSet as $product)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset($product->images->first()->url) }}" class="card-img-top"
                                            alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text text-success">Price: ${{ $product->price }}</p>
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
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- Images Start-to-End -->
    <div class="card pb-1 text-center">
        <img class="img-fluid" src="{{ asset('images/Product_Sample2.jpg') }}" alt="Sample Product 1">
        <div class="card-img-overlay">
            <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">A shining
                Spotlight for upcoming local businesses looking for a boost in popularity</p>
        </div>
    </div>
    <div class="card pb-1 text-center">
        <img class="img-fluid" src="{{ asset('images/Product_Sample1.jpg') }}" alt="Sample Product 2">
        <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">Connecting
            consumers to obscure but good quality products flying under their radar</p>
    </div>
    <div class="card pb-1 text-center">
        <img class="img-fluid" src="{{ asset('images/Product_Sample3.jpg') }}" alt="Sample Product 3">
        <p class="h2 position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-50">Promoting local
            goods and products, as well as forming a community of sellers and buyers all around</p>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-center text-lg-start text-white">
        <div class="container p-4">
            <div class="row my-4">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto"
                        style="width: 150px; height: 150px;">
                        <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="100"
                            height="100" class="d-inline-block align-text-top">
                    </div>
                    <p class="text-center">Spotlight Products Promotion</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">About Us</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Our Socials</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Contact</h5>
                    <ul class="list-unstyled">
                        <li>
                            <p><i class="fas fa-map-marker-alt pe-2"></i>JMCFI, Sasa, Davao City</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone pe-2"></i>+63-2-8123-4567</p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            Humphrey Myles C. Lozano
        </div>
    </footer>
@endsection
