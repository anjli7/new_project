@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content Area -->
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>My Applications</h2>
            </div>

            <!-- Filters and Search -->
            <div class="card mb-4">
                 <div class="card-body">
                    <form method="get" action="" class="row g-3">
                        <div class="col-md-5">
                            <label for="search" class="form-label">Search Applications</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" name="search"
                                    value=""
                                    placeholder="Search by name, service type, customer name, or email">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="missing_document">Missing Documents</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <a href="my_application.php" class="btn btn-outline-secondary">
                                <i class="fas fa-sync-alt me-1"></i> Reset Filters
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Applications List -->
            <div class="card">
                <div class="card-body p-0">
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-file-alt fa-4x text-muted"></i>
                        </div>
                        <h4>No applications found</h4>
                        <p class="text-muted">You haven't submitted any applications yet.</p>
                    </div>

                    <div class="table-responsive">
                        <div class="card-header  text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">My Applications</h5>
                        </div>
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Application ID</th>
                                    <th>Customer Name</th>
                                    <th>Service Type</th>
                                    <th>Submitted On</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>N/A</td>
                                    <td>No Data</td>
                                    <td>No Data</td>
                                    <td>No Data</td>
                                    <td>No Data</td>
                                    <td>
                                        <span class="badge rounded-pill bg-secondary">No Status</span>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="#" class="btn btn-sm btn-outline-primary me-1" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Confirm Deletion</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this application? This action cannot be undone.</p>
                        <p class="text-muted small">All associated documents will also be permanently deleted.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Delete Application
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection