@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 auth-form-container">
            <div class="auth-form-box">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title text-center mb-4 custom-heading">Verify Your Email</h2>

                        <div class="mb-4 text-muted">
                            Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success">
                                A new verification link has been sent to the email address you provided in your profile settings.
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('verification.send') }}" method="post">
                                @csrf
                                <button type="submit" class="btn custom-btn">Resend Verification Email</button>
                            </form>

                            <div>
                                <a href="{{ route('profile.show') }}" class="text-decoration-none me-3">Edit Profile</a>

                                <form action="{{ route('logout') }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-decoration-none p-0">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
