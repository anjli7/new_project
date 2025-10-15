@extends('layouts.app')

@section('content')


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 auth-form-container">
            <div class="auth-form-box auth-form-active" id="login-form">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Login</h2>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('loginSubmit') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="login_email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="login_email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="login_password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="login_password" required>
                            </div>

                            <button type="submit" class="btn custom-btn w-100">Login</button>
                            <p class="text-center mt-3">Don't have an account? <a href="javascript:void(0)" onclick="toggleAuthForm('register-form')">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Registration form -->
            <div class="auth-form-box" id="register-form">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Register</h2>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('registerSubmit') }}" method="POST" id="registerForm">
                            @csrf
                            <div class="mb-3">
                                <label for="reg_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" id="reg_name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="reg_email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="reg_email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="reg_mobile" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" name="mobile" id="reg_mobile" value="{{ old('mobile') }}">
                            </div>
                            <div class="mb-3">
                                <label for="reg_password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="reg_password" required minlength="6">
                                <div class="form-text">Password must be at least 6 characters long</div>
                            </div>
                             <button type="submit" class="btn custom-btn w-100">Register</button>
                            <p class="text-center mt-3">Already have an account? <a href="javascript:void(0)" onclick="toggleAuthForm('login-form')">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
