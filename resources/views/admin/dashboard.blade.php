@extends('layouts.admin')

@section('content')
    
<!-- Stats Cards -->
<div class="row">
    <div class="col-md-6 col-lg-2 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body text-center">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-count"></div>
                <div class="stat-title">Total Applications</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-2 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body text-center">
                <div class="stat-icon text-warning">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-count"></div>
                <div class="stat-title">Pending</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-2 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body text-center">
                <div class="stat-icon text-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-count"></div>
                <div class="stat-title">Complete</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-2 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body text-center">
                <div class="stat-icon text-info">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-count"></div>
                <div class="stat-title">Missing Document</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-2 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body text-center">
                <div class="stat-icon text-danger">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-count"></div>
                <div class="stat-title">Rejected</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Applications -->
    <div class="col-lg-8 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Applications</h5>
                <a href="{{route('admin.applications')}}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Application No.</th>
                                <th>Submitted By</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No applications found</td>
                            </tr>
                                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0">Quick Stats</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Users</span>
                        <span class="fw-bold"></span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar" style=""
                            aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Staff Members</span>
                        <span class="fw-bold"></span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-info" role="progressbar" style=""
                            aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-top">
                    <h6 class="mb-3">Quick Actions</h6>
                    <div class="d-grid gap-2">
                       
                        <a href="{{route('admin.users')}}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-user-plus me-1"></i> Add User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection