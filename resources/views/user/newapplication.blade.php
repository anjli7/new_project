@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content Area -->
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Application Form</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form id="applicationForm" method="post" enctype="multipart/form-data">
                <!-- Step 1: Application Details -->
                <div id="step1">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Please fill in your application details and upload the required documents.
                    </div>

                    <!-- User Information (Read-only) -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input disabled value="" type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Address</label>
                            <input disabled value="" type="email" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone Number</label>
                            <input disabled value="" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Service Selection Card -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Service Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Application Type <span class="text-danger">*</span></label>
                                <select name="application_type" id="application_type" class="form-select" required>
                                    <option value="" disabled selected>-- Select Application Type --</option>
                                    <option value="passport">Passport Services (₹2,500)</option>
                                    <option value="visa">Visa Services (₹3,000)</option>
                                    <option value="birth_certificate">Birth Certificate (₹800)</option>
                                    <option value="marriage_certificate">Marriage Certificate (₹1,200)</option>
                                    <option value="police_clearance">Police Clearance (₹1,500)</option>
                                    <option value="business_registration">Business Registration (₹5,000)</option>
                                    <option value="trademark">Trademark Registration (₹8,000)</option>
                                    <option value="gst_registration">GST Registration (₹2,000)</option>
                                    <option value="income_tax_return">Income Tax Return (₹1,500)</option>
                                    <option value="pan_card">PAN Card Application (₹500)</option>
                                </select>
                            </div>
                            <div id="documentFields" class="mt-4">
                                <div class="alert alert-warning">
                                    <i class="fas fa-info-circle me-2"></i> Please select an application type to see required documents.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Payment Details -->
                <div id="step2" style="display:none;">
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Payment Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h6>Order Summary</h6>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Service:</span>
                                        <span id="summaryService"></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Amount:</span>
                                        <span id="summaryAmount"></span>
                                    </div>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total:</span>
                                        <span id="summaryTotal"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>Payment Method</h6>
                                    <hr>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="razorpay" value="razorpay" checked>
                                        <label class="form-check-label" for="razorpay">
                                            <img src="{{ asset('assets/img/razorpay.png') }}" alt="Razorpay" style="height: 24px; margin-left: 10px;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky Footer Navigation -->
                <div class="sticky-bottom bg-white py-3 border-top mt-4" style="position: sticky; bottom: 0; z-index: 1000;">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;">
                                <i class="fas fa-arrow-left me-1"></i> Previous
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary me-2" id="nextBtn" disabled>
                                Next <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                            <button type="submit" name="proceed_payment" class="btn btn-success" id="payBtn" style="display:none;" disabled>
                                <i class="fas fa-credit-card me-2"></i> Proceed to Payment
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection