@extends('layouts.user')

@section('content')
    

    <div class="container-fluid">
    <div class="row">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">My Profile</h1>
            </div>
            
            <div class="container mt-4">
               
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 text-center mb-4">
                                    <div class="mb-3">
                                        <img id="preview" src=""
                                        class="img-fluid rounded-circle mb-3"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                        <div>
                                            <label for="profile_picture" class="btn custom-btn btn-sm">Change Photo</label>
                                            <input type="file" class="d-none" id="profile_picture" name="profile_picture"
                                                accept=".jpg,.jpeg,.png,.webp" onchange="previewImage(event)">
                                        </div>
                                        <div class="small text-muted mt-2">Allowed JPG, JPEG, PNG, WEBP. Max 5MB</div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Profile Information</h4>

                                            <div class="mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->number }}" name="number">
                                            </div>

                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                                <button type="submit"  name="update_profile" class="btn custom-btn form-btn">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    
    </div>
</div>
@endsection
