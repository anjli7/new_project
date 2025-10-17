@extends('layouts.user')

@section('content')
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <a href="{{ route('user.myapplication') }}" class="btn btn-sm custom-btn">View All Applications</a>
                    </div>
                </div>
            </div>
   
            <div class="mb-4">
                <p class="text-muted">Welcome back</p>
            </div>
   

            <div class="row">
                <div class="col-md-6 col-lg-2 mb-4">
                    <div class="card stat-card h-100 text-center">
                        <div class="card-body">
                            <div class="stat-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="stat-count"></div>
                            <div class="stat-title">Total Applications</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-4">
                    <div class="card stat-card h-100 text-center">
                        <div class="card-body">
                            <div class="stat-icon text-warning">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-count"></div>
                            <div class="stat-title">Pending</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-4">
                    <div class="card stat-card h-100 text-center">
                        <div class="card-body">
                            <div class="stat-icon text-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-count"></div>
                            <div class="stat-title">Approved</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-4">
                    <div class="card stat-card h-100 text-center">
                        <div class="card-body">
                            <div class="stat-icon text-info">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-count"></div>
                            <div class="stat-title">Missing Docs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mb-4">
                    <div class="card stat-card h-100 text-center">
                        <div class="card-body">
                            <div class="stat-icon text-danger">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="stat-count"></div>
                            <div class="stat-title">Rejected</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mt-4">
                <div class="card-header text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Applications</h5>
                    <a href="my_application.php" class="btn btn-sm btn-outline-light">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No applications found</td>
                                </tr>
                                
                                <tr>
                                                                     
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
</div>




@endsection
