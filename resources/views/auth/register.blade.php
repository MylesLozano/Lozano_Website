@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4 text-center">User Registration</h1> <!-- Centered -->

                <form method="POST" action="{{ route('user.auth.register.post') }}">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" required>
                    </div>
                    @error('firstName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="middleName">Middle Name (optional):</label>
                        <input type="text" id="middleName" name="middleName" class="form-control">
                    </div>
                    @error('middleName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" required>
                    </div>
                    @error('lastName')
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
                        <label for="mobileNumber">Mobile Number:</label>
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
                    <p>Already Registered? <a href="{{ route('user.auth.login') }}">Login Here</a></p>
                </div>
                <div class="mt-3 text-center">
                    <p><a href="{{ route('index') }}">Back to Home</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
