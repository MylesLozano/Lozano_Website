@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4 text-center">Seller Registration</h1> <!-- Centered -->

                <form method="POST" action="{{ route('seller.auth.register.post') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Seller Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="mobileNumber">Phone Number:</label>
                        <input type="tel" id="mobileNumber" name="mobileNumber" class="form-control" required>
                    </div>
                    @error('mobileNumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="mt-3 btn btn-primary">Register</button>
                </form>
                <div class="mt-3 text-center">
                    <p>Already Registered? <a href="{{ route('seller.auth.login') }}">Login Here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
