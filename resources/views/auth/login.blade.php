
@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 auth-form-container">
            <div class="auth-form-box" id="login-form">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Login</h2>
                        <form action="{{ route('login.post') }}" method="post">
                            @csrf
                            <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
                            <button type="submit" name="login" class="btn custom-btn w-100">Login</button>
                        </form>
                        <p class="text-center mt-3">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
