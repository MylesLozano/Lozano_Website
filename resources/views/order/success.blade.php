@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Success') }}</div>

                    <div class="card-body">
                        <h1>Your order has been placed successfully!</>
                            <p>Thank you for shopping with us.</p>
                            <a href="{{ route('user.home') }}" class="btn btn-primary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
