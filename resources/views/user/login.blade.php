@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">PERPUSTAKAAN</h1>
        <form action="{{ route('login.auth') }}" class="card p-5" method="POST" style="width: 400px;">
            @csrf
            @if (Session::get('failed'))
                <div class="alert alert-danger">
                    {{ Session::get('failed') }}
                </div>
            @endif
            @if (Session::get('logout'))
                <div class="alert alert-primary">{{ Session::get('logout') }}</div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success w-100">LOGIN</button>
        </form>
    </div>
</div>
@endsection
