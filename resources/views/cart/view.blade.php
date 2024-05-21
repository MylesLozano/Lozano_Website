@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Cart') }}</div>

                    <div class="card-body">
                        @if ($cart && $cart->cartItems)
                            @if (count($cart->cartItems) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->cartItems as $cartItem)
                                            <tr>
                                                <td>{{ $cartItem->product->name }}</td>
                                                <td>{{ $cartItem->quantity }}</td>
                                                <td>${{ $cartItem->product->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Your cart is empty.</p>
                            @endif
                        @else
                            <p>Your cart is empty.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
