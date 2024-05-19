@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Choose Your Role</div>

                    <div class="card-body d-flex justify-content-around">
                        <a href="{{ route('user.auth.register') }}" class="btn btn-primary">
                            <i class="fas fa-user"></i> User
                        </a>
                        <a href="{{ route('seller.auth.register') }}" class="btn btn-success">
                            <i class="fas fa-store"></i> Seller
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
