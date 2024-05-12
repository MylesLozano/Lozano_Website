@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5 row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center pt-4">Login to your account</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('auth.custom.login') }}">
                    @csrf

                    <div class="form-group pt-4">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" autofocus>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group pt-4">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                    <button type="submit" class="mt-3 btn btn-primary d-block mx-auto">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <p>New User? <a href="{{ route('auth.register') }}">Register Here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
