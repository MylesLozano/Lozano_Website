@extends('layouts.app')

@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-bg-primary">Admin Login</div>

                    <div class="card-body">
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
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="100" height="100"
                                style="display: block; margin: 0 auto;">
                            <div class="form-group pt-4">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" autofocus>
                                @error('name')
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
                            <div class="d-grid gap-2">
                                <button type="submit" class="mt-3 btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <p>New Admin? <a href="{{ route('admin.create') }}">Register Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
