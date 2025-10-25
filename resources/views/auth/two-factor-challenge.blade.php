@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 auth-form-container">
            <div class="auth-form-box">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Two-Factor Authentication</h2>

                        <div class="mb-4 text-muted">
                            Please confirm access to your account by entering the authentication code provided by your authenticator application.
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('two-factor.login') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="code" class="form-label">Authentication Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" required autofocus maxlength="6" placeholder="000000">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn custom-btn w-100 mb-3">Verify Code</button>
                        </form>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i>Back to Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
