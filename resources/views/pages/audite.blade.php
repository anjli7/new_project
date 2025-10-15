@extends('layouts.app')

@section('content')

<!-- hero-audit -->
<section class="hero-about">
    <div class="hero-overlay">
    <img src="{{ asset('assets/images/audit.jpg') }}" alt="About Us" class="hero-img">
    <div class="hero-content container">
            
                <h1>Trusted Audit Services for Smarter Business Decisions</h1>
                <p>
                    We provide reliable and transparent audit services that help you strengthen your business,
                    ensure compliance, and build trust with your stakeholders.
                </p>
        </div>
    </div>
</section>

<!-- audit-benefits -->
<section class="audit-benefits py-4 py-lg-5">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">
            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="pe-lg-4 pe-xl-5">
                    <h2 class="display-6 display-lg-5 fw-bold custom-heading mb-3 mb-lg-4">
                        <span class="border-bottom border-3 border-secondary pb-1 pb-lg-2 d-inline-block">Why Choose</span>
                        <span class="d-block mt-2 ">Our Audit Services?</span>
                    </h2>

                    <p class="lead text-muted mb-4 mb-lg-5">
                        In today's complex business environment, audits are crucial for maintaining financial integrity
                        and regulatory compliance. Our approach goes beyond basic compliance to deliver real value.
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="position-relative mb-4 mb-lg-0">
                    <img src="{{ asset('assets/images/about.jpg') }}" alt="Audit Process"
                        class="img-fluid rounded-3 shadow-lg w-100 h-auto">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class=" custom-heading middle-line text-center mb-5">Our Audit Services Include</h2>
        <div class="row g-4">
            @php
                $services = [
                    ['icon' => 'fa-file-invoice-dollar text-primary', 'title' => 'Financial Statement Audit', 'desc' => 'Detailed review of your financial records to ensure accuracy and compliance.'],
                    ['icon' => 'fa-shield-alt text-success', 'title' => 'Internal Audit', 'desc' => 'Check your internal processes and systems to improve efficiency and reduce risks.'],
                    ['icon' => 'fa-balance-scale text-warning', 'title' => 'Compliance Audit', 'desc' => 'Ensure your business meets all regulatory and legal requirements.'],
                    ['icon' => 'fa-receipt text-danger', 'title' => 'Tax Audit', 'desc' => 'Prepare and review your tax documents to avoid penalties and ensure correct filing.'],
                    ['icon' => 'fa-tasks text-info', 'title' => 'Special Purpose Audit', 'desc' => 'Custom audits based on your business needs or investor requirements.'],
                    ['icon' => 'fa-cogs text-secondary', 'title' => 'Operational Audit', 'desc' => 'Analyze your operations to improve productivity, cost control, and overall performance.'],
                ];
            @endphp

            @foreach ($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="audit-card p-4 bg-white rounded shadow-sm h-100">
                        <h5><i class="fas {{ $service['icon'] }} fa-2x me-2"></i> {{ $service['title'] }}</h5>
                        <p>{{ $service['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5">
    <div class="container">
        <h2 class="custom-heading middle-line text-center mb-5">How Our Audits Help Your Business</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa-solid fa-circle-check me-2"></i>Build trust with investors, banks, and partners.</li>
                    <li class="list-group-item"><i class="fa-solid fa-circle-check me-2"></i>Find hidden risks early and fix them.</li>
                    <li class="list-group-item"><i class="fa-solid fa-circle-check me-2"></i>Improve financial management and decision-making.</li>
                    <li class="list-group-item"><i class="fa-solid fa-circle-check me-2"></i>Ensure compliance with all laws and standards.</li>
                    <li class="list-group-item"><i class="fa-solid fa-circle-check me-2"></i>Make your business stronger and more profitable.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/images/audit-1.jpg') }}" class="img-fluid rounded" alt="Audit Services">
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="contact-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="home-form custom-heading middle-line">Get In Touch</h2>
                <p class="lead">Ready to take your financial management to the next level? Contact us today for a free consultation.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <form class="common-contact-form" id="common-form1" action="{{route('audite.InsertAudite')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Mobile Number" required>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="5" name="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="forms" value="contact">
                            <button type="submit" class="custom-btn form-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Contact Information</h4>
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Address</h6>
                                <p class="mb-0">B-1, Second floor, Utkarsh Plaza, near Shanechar Ji Ka Than, Jodhpur, Rajasthan</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Phone</h6>
                                <p class="mb-0">+91-9530300195</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Email</h6>
                                <p class="mb-0">prakash.jangidassociates@gmail.com</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="me-3">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Working Hours</h6>
                                <p class="mb-0">Monday - Saturday: 11:00 AM - 7:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
