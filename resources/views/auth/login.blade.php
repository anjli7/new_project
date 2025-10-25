@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 auth-form-container">
            <div class="auth-form-box" id="login-form">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Login</h2>
                        <form action="{{route('login.post')}}" method="post">
                            @csrf

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @if(str_contains($error, 'verify your email'))
                                                <li class="mt-2">
                                                    <small class="text-muted">Please register again to receive a new OTP code.</small>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-warning">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" placeholder="Email" required value="{{ old('email') }}">
                            <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                            <button type="submit" name="login" class="btn custom-btn w-100">Login</button>
                        </form>
                        <p class="text-center mt-3">
                            Forgot Password?
                            <a href="{{ route('password.forgot') }}" class="text-decoration-none">Reset Password</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
