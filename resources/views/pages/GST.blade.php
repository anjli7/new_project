@extends('layouts.app')

@section('content')

<!-- Banner Section -->
<section class="hero-about">
    <div class="hero-overlay">
    <img src="{{ asset('assets/images/GST.jpg') }}" alt="About Us" class="hero-img">
        <div class="hero-content container">
                <h1>GST Services Made Easy</h1>
                <p>
                    At Expert Financial Solutions, we make GST simple. 
                    We help businesses handle all their GST needs—quickly, accurately, and stress-free.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About GST Section -->
<section class="py-5" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="custom-heading custom-line mb-4">What is <span class="gst-highlight">GST</span>?</h2>
                <p class="lead">
                    Goods and Services Tax (GST) is a comprehensive, multi-stage, destination-based tax that is levied on every value addition.
                </p>
                <p>It replaced a number of indirect taxes previously levied by the central and state governments.</p>

                <div class="mt-5">
                    <h4 class="custom-heading mb-4">Benefits of GST:</h4>
                    @foreach([
                        'One Nation, One Tax: Uniform tax structure across India',
                        'Simplified tax system and compliance',
                        'Increased transparency and accountability',
                        'Input Tax Credit (ITC) availability',
                        'Boost to ease of doing business',
                        'Online registration and filing process'
                    ] as $benefit)
                        <div class="gst-benefit-item">
                            <i class="fas fa-check-circle"></i> {{ $benefit }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header text-white">
                        <h5 class="mb-0"><i class="fa-solid fa-file-pen"></i> Who Needs to Register for GST?</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach([
                                'Businesses with annual turnover above ₹40 lakh (for goods) / ₹20 lakh (for services)',
                                'Interstate suppliers',
                                'E-commerce sellers',
                                'Casual taxable persons',
                                'Input Service Distributors (ISD)',
                                'Non-resident taxable persons'
                            ] as $need)
                                <li class="list-group-item">{{ $need }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-header text-white">
                        <h5 class="mb-0"><i class="fa-solid fa-clipboard"></i> Documents Required for GST Registration</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach([
                                'PAN Card of the business or applicant',
                                'Aadhaar Card',
                                'Proof of business address (Electricity Bill/Rent Agreement)',
                                'Bank account details (Cancelled cheque or bank statement)',
                                'Passport size photograph',
                                'Business registration proof (Partnership Deed, Incorporation Certificate, etc.)',
                                'Additional legal service for drafting'
                            ] as $doc)
                                <li class="list-group-item">{{ $doc }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light" id="services">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="custom-heading">Our <span class="gst-highlight">GST Services</span></h2>
            <p class="lead">Comprehensive solutions tailored to your business needs</p>
        </div>

        <div class="row g-4">
            @php
                $services = [
                    ['icon' => 'fa-file-signature', 'title' => 'GST Registration', 'desc' => 'Complete assistance with new GST registration including document collection and application submission.'],
                    ['icon' => 'fa-file-invoice-dollar', 'title' => 'GST Return Filing', 'desc' => 'Monthly/Quarterly filing of GSTR-1, GSTR-3B, and other returns with complete reconciliation.'],
                    ['icon' => 'fa-percentage', 'title' => 'Composition Scheme', 'desc' => 'Guidance on eligibility and application for the GST Composition Scheme for small businesses.'],
                    ['icon' => 'fa-exchange-alt', 'title' => 'ITC Reconciliation', 'desc' => 'Comprehensive Input Tax Credit reconciliation to maximize your tax credits and ensure compliance.'],
                    ['icon' => 'fa-gavel', 'title' => 'GST Notice Handling', 'desc' => 'Expert assistance in responding to GST notices and representing before authorities.'],
                    ['icon' => 'fa-user-tie', 'title' => 'GST Consultancy', 'desc' => 'Strategic advice on GST matters including tax optimization, compliance planning, and audit support.'],
                ];
            @endphp

            @foreach ($services as $s)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 gst-service-card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="benefit-icon p-3 rounded me-3">
                                    <i class="fas {{ $s['icon'] }} fs-4"></i>
                                </div>
                                <h5 class="card-title mb-0">{{ $s['title'] }}</h5>
                            </div>
                            <p class="card-text">{{ $s['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="FAQ-section">
    <div class="container">
        <h2 class="section-title custom-heading middle-line">Frequently Asked Questions</h2>
        <div class="faq-container">
            @php
                $faqs = [
                    ['q' => 'What is the threshold limit for GST registration?', 'a' => '₹40 lakh for goods suppliers (₹20 lakh for special category states) and ₹20 lakh for service providers (₹10 lakh for special category states).'],
                    ['q' => 'How often do I need to file GST returns?', 'a' => 'Regular taxpayers file GSTR-1 monthly/quarterly and GSTR-3B monthly. Annual return (GSTR-9) is filed once a year.'],
                    ['q' => 'What is the penalty for late GST filing?', 'a' => 'Late fee ₹50/day (₹25 CGST + ₹25 SGST) up to ₹5,000 + 18% p.a. interest on due tax.'],
                    ['q' => 'Can I claim Input Tax Credit without GST registration?', 'a' => 'No, only registered taxpayers can claim ITC under GST.']
                ];
            @endphp

            @foreach ($faqs as $faq)
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        {{ $faq['q'] }}
                        <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <p>{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="second-form py-5" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-header text-white">
                        <h3 class="mb-0">Get in Touch for GST Services</h3>
                    </div>
                    <div class="card-body p-4">
                        <form id="ServiceForm" class="ajaxForm" action="{{route('GST.InsertGST')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name*</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number*</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="business" class="form-label">Business Name</label>
                                    <input type="text" class="form-control" name="business">
                                </div>
                                <div class="col-12">
                                    <label for="service" class="form-label">What service do you need?*</label>
                                    <select class="form-select" name="service" required>
                                        <option value="" disabled selected>Select a service</option>
                                        <option value="gst-registration">GST Registration</option>
                                        <option value="gst-return">GST Return Filing</option>
                                        <option value="composition">Composition Scheme</option>
                                        <option value="gst-cancellation">GST Cancellation</option>
                                        <option value="itc-reconciliation">ITC Reconciliation</option>
                                        <option value="notice-handling">GST Notice Handling</option>
                                        <option value="consultancy">GST Consultancy</option>
                                        <option value="other">Other Service</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message / Query</label>
                                    <textarea class="form-control" name="message" rows="4"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="consent" required>
                                        <label class="form-check-label" for="consent">
                                            I consent to Expert Financial Solutions contacting me about their services
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="submit-btn custom-btn px-4 py-2">Submit Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Success Modal  -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header text-white">
        <h5 class="modal-title" id="successModalLabel">Request Submitted Successfully</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center p-4">
        <i class="fas fa-check-circle text-success mb-3" style="font-size: 3rem;"></i>
        <p>Thank you for your inquiry. Our GST compliance expert will contact you within 24 hours.</p>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="modal-btn custom-btn" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
  </div>
</div>

@endsection
