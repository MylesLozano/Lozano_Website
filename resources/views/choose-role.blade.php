@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Choose Your Role</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-center">USER</h3>
                                    <a href="{{ route('user.auth.register') }}" class="btn btn-primary" title="User">
                                        <img src="{{ asset('images/BuyerIcon.png') }}" alt="User Icon" width="250"
                                            height="250">
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="text-center">SELLER</h3>
                                    <a href="{{ route('seller.auth.register') }}" class="btn btn-success" title="Seller">
                                        <img src="{{ asset('images/SellerIcon.png') }}" alt="Seller Icon" width="250"
                                            height="250">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
