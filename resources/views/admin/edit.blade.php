@extends('layouts.app')

@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-bg-primary">Edit Admin</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                            @csrf
                            @method('PUT')
                            <img src="{{ asset('images/Spotlight Shop.png') }}" alt="" width="100" height="100"
                                style="display: block; margin: 0 auto;">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $admin->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required pattern="[A-Z]{2}\d{4}---">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-3 text-center">
                        <p><a href="{{ route('index') }}">Back to Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
