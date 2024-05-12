@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Login</div>

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
                            <button type="submit" class="mt-3 btn btn-primary d-block mx-auto">Login</button>
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
