@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Contact Inquiries</h4>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"> <i class="fas fa-arrow-left me-1"></i> Back to Dashboard </a>
            </div>
            <p class="text-muted">View and manage contact inquiries</p>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            @if ($inquiries->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inquiries as $index => $row) <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->name ?? 'N/A' }}</td>
                            <td> <a href="mailto:{{ $row->email }}">{{ $row->email ?? 'N/A' }}</a> </td>
                            <td>{{ $row->phone ?? 'N/A' }}</td>
                            <td>{{ $row->subject ?? 'No Subject' }}</td>
                            <td> {{ strlen($row->message ?? '') > 50 ? substr($row->message, 0, 50) . '...' : $row->message }} </td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('M d, Y h:i A') }}</td>
                            <td>
                                <button type="button"
                                    class="btn btn-sm btn-outline-danger delete-enquiry"
                                    data-id="{{ $row->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                No contact inquiries found.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection