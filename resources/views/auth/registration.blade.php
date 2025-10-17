
@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 auth-form-container">
            <div class="auth-form-box" id="register-form">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Register</h2>
                        <form action="{{ route('register.post') }}" method="post">
                            @csrf
                            <input type="text" class="form-control mb-3" name="name" placeholder="Name" required>
                            <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
                            <input type="tel" class="form-control mb-3" name="number" placeholder="Mobile" required>
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
                            <input type="password" class="form-control mb-3" name="password_confirmation" placeholder="Confirm Password" required>
                            <button type="submit" name="register" class="btn custom-btn w-100">Register</button>
                        </form>
                        <p class="text-center mt-3">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
