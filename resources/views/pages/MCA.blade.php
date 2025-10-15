@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-about">
    <div class="hero-overlay">
    <img src="{{ asset('assets/images/MCA.jpg') }}" alt="About Us" class="hero-img">
        <div class="hero-content  container">
            <h1>MCA Compliance Made Simple</h1>
            <p>
                At Expert Financial Solutions, we take the hassle out of MCA filings.
                From company registration to annual ROC returns — we handle it all, so you can focus on growing your business.
            </p>
        </div>
    </div>
</section>

<!-- Key Functions Section -->
<section class="py-5 bg-light" id="services">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="custom-heading middle-line">Key Functions of MCA</h2>
            <p class="lead">Comprehensive solutions for all your corporate compliance needs</p>
        </div>

        @php
            $functions = [
                ['icon' => 'fa-building', 'title' => 'Company & LLP Registration', 'desc' => 'End-to-end assistance for registering new business entities with MCA.'],
                ['icon' => 'fa-balance-scale', 'title' => 'Corporate Governance', 'desc' => 'Compliance with Companies Act, LLP Act and other regulations.'],
                ['icon' => 'fa-id-card', 'title' => 'DIN & DSC Services', 'desc' => 'Director Identification Number and Digital Signature Certificates.'],
                ['icon' => 'fa-file-alt', 'title' => 'Annual Filings', 'desc' => 'Timely submission of all mandatory ROC filings and returns.'],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($functions as $f)
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-white rounded service-box">
                        <div class="feature-icon">
                            <i class="fas {{ $f['icon'] }}"></i>
                        </div>
                        <h4>{{ $f['title'] }}</h4>
                        <p>{{ $f['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Services Section -->
<section class="py-5" id="process">
    <div class="container">
        <h2 class="section-heading custom-heading custom-line mb-4">Our MCA-Related Services</h2>
        <p class="lead mb-5">End-to-end support for all corporate compliance needs under the MCA portal</p>

        <div class="row g-4">
            @php
                $mca_services = [
                    [
                        'icon' => 'fa-plus-circle text-success',
                        'title' => 'Company Registration',
                        'items' => ['Private Limited Company', 'One Person Company (OPC)', 'Limited Liability Partnership (LLP)', 'Section 8 (NGO) Company', 'Public Limited Company', 'Nidhi Company Registration']
                    ],
                    [
                        'icon' => 'fa-file-export text-primary',
                        'title' => 'Annual Filings',
                        'items' => ['ROC Filing (AOC-4, MGT-7)', 'Director KYC (DIR-3 KYC)', 'Form INC-20A (Commencement)', 'MSME Form Filing', 'ACTIVE Form (INC-22A)', 'LLP Form 11 & 8']
                    ],
                    [
                        'icon' => 'fa-tasks text-warning',
                        'title' => 'Other Services',
                        'items' => ['DIN & DSC Application', 'Company Details Change', 'Share Allotment & Transfer', 'Strike Off Company/LLP', 'Revive Strike Off Company', 'Drafting of Resolutions']
                    ],
                ];
            @endphp

            @foreach ($mca_services as $s)
                <div class="col-lg-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h4 class="mb-4 custom-heading">
                            <i class="fas {{ $s['icon'] }} me-2"></i> {{ $s['title'] }}
                        </h4>
                        <ul class="icon-list">
                            @foreach ($s['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Services Section -->
<section class="py-5" id="process">
    <div class="container">
        <h2 class="section-heading custom-heading custom-line mb-4">Stamp Duty & Related Services and Registration Fee Detail </h2>
        <p class="lead mb-3">Complete guide on stamp duty services, registration charges, and compliance requirements</p>
        
             <!-- PDF Download Section -->
            <div class="pdf-download-box mb-5">               
                <div class="pdf-actions">
                    <a href="{{asset('assets/form/stamp_duty.pdf')}}" class="pdf-btn pdf-btn-download" download>
                        <i class="fas fa-download"></i> Download
                    </a>
                    <a href="{{asset('assets/form/stamp_duty.pdf')}}" class="pdf-btn pdf-btn-view" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Open
                    </a>
                </div>
            </div>

        <div class="row g-4">
            @php
                $mca_services = [
                    [
                        'icon' => 'fa-cogs text-success',
                        'title' => 'Stamp Duty Services',
                        'items' => ['Property Stamp Duty Calculation', 'Stamp Duty Payment Guidance', 'Stamp Duty for Sale Deed, Lease, Gift Deed, Mortgage, and Loan Documents', 'Online E-Panjiyan Portal Assistance', 'Stamp Duty Receipts & Legal Proof']
                    ],
                    [
                        'icon' => 'fa-file-signature text-primary',
                        'title' => 'Registration Charges Services',
                        'items' => ['Property Registration Assistance', 'Registration Charges Payment Guidance', 'Sub-Registrar Office Filing Assistance', 'Documentation for Legal Compliance','Stamp Duty Advisory for Buyers & Sellers','Property Valuation Support for Accurate Stamp Duty']
                    ],
                    [
                        'icon' => 'fa-calendar-check text-warning',
                        'title' => 'Annual & Compliance Related Services',
                        'items' => ['Assistance in Property Related Annual Filings', 'Updates on State-wise Stamp Duty Changes', 'Notifications for Stamp Duty Renewal (if applicable)', 'Legal Verification of Property Documents', 'Help in Avoiding Penalties or Underpayment Issues']
                    ],
                ];
            @endphp

            @foreach ($mca_services as $s)
                <div class="col-lg-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h4 class="mb-4 custom-heading">
                            <i class="fas {{ $s['icon'] }} me-2"></i> {{ $s['title'] }}
                        </h4>
                        <ul class="icon-list">
                            @foreach ($s['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Documents Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-heading custom-heading custom-line mb-5">Required Documents</h2>
                <p class="lead">For MCA Registration & Compliance Services</p>

                <div class="bg-white p-4 rounded shadow-sm">
                    <ul class="icon-list">
                        @foreach([
                            'PAN & Aadhaar of Directors/Partners',
                            'Address Proof & Utility Bill (not older than 2 months)',
                            'Passport-size Photographs (white background)',
                            'MOA & AOA / LLP Agreement',
                            'Bank Details (Cancelled Cheque)',
                            'Digital Signature Certificate (DSC)',
                            'Registered Office Proof (Rent Agreement/NOC)',
                            'Professional Tax Registration (if applicable)'
                        ] as $doc)
                            <li>{{ $doc }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="p-4 bg-white rounded shadow-sm mb-4">
                    <h4 class="mb-4 custom-heading">Common MCA Forms We Handle</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="icon-list">
                                <li>SPICe+ (INC-32)</li>
                                <li>AGILE-PRO (INC-35)</li>
                                <li>DIR-3 (DIN Application)</li>
                                <li>INC-22 (Registered Office)</li>
                                <li>INC-20A (Commencement)</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="icon-list">
                                <li>AOC-4 (Annual Return)</li>
                                <li>MGT-7 (Annual Report)</li>
                                <li>ADT-1 (Auditor Appointment)</li>
                                <li>CHG-1 (Charge Creation)</li>
                                <li>STK-2 (Strike Off)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-white rounded shadow-sm">
                    <h4 class="mb-4 custom-heading">Our Average Processing Times</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="icon-list">
                                <li>Company Registration: 7-10 days</li>
                                <li>DIN Approval: 1-2 days</li>
                                <li>DSC Issuance: 24 hours</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="icon-list">
                                <li>ROC Filings: 2-3 days</li>
                                <li>Name Change: 15-20 days</li>
                                <li>Strike Off: 30-45 days</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Benefits Section -->
<section class="py-5" id="benefits">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-heading custom-heading middle-line d-inline-block mb-4">Why Choose Our MCA Services?</h2>
            <p class="lead">We make corporate compliance effortless for businesses</p>
        </div>

        <div class="row g-4">
            @php
                $benefits = [
                    [
                        'icon' => 'fa-users',
                        'title' => 'Expert Team',
                        'desc' => 'Our team comprises experienced Company Secretaries, Chartered Accountants, and corporate lawyers who specialize in MCA compliance.',
                        'points' => ['15+ years average experience', 'Specialized in complex filings', 'Regular training on latest MCA updates']
                    ],
                    [
                        'icon' => 'fa-clock',
                        'title' => 'Efficient Process',
                        'desc' => 'We’ve streamlined the compliance process to save you time and ensure no deadlines are missed.',
                        'points' => ['Dedicated compliance manager', 'Proactive deadline reminders', 'Real-time application tracking', 'Average 30% faster processing']
                    ],
                    [
                        'icon' => 'fa-rupee-sign',
                        'title' => 'Cost Effective',
                        'desc' => 'Transparent pricing with no hidden charges, helping you optimize compliance costs.',
                        'points' => ['No surprise fees', 'Package discounts available', 'Save up to 40% vs in-house compliance', 'Free annual compliance calendar']
                    ],
                ];
            @endphp

            @foreach ($benefits as $b)
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h4 class="mb-4 custom-heading"><i class="fas {{ $b['icon'] }} me-2"></i> {{ $b['title'] }}</h4>
                        <p>{{ $b['desc'] }}</p>
                        <ul class="mt-3">
                            @foreach ($b['points'] as $point)
                                <li class="benefit-item">{{ $point }}</li>
                            @endforeach
                        </ul>
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
                        <h3 class="mb-0">Get in Touch</h3>
                    </div>
                    <div class="card-body p-4">
                        <form id="ServiceForm" class="ajaxForm" action="{{ route('MCA.InsertMCA') }}" method="POST">
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
                                        <option value="Company-Registration">Company Registration</option>
                                        <option value="LLP-Registration">LLP Registration</option>
                                        <option value="ROC-Filing">ROC Filing</option>
                                        <option value="DIN/DSC-Services">DIN/DSC Services</option>
                                        <option value="Company-Changes">Company Changes</option>
                                        <option value="Strike-Off/Revival">Strike Off/Revival</option>
                                        <option value="Other">Other Service</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message / Query</label>
                                    <textarea class="form-control" name="message" rows="4"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" required>
                                        <label class="form-check-label">
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
        <p>Thank you for your inquiry. Our MCA compliance expert will contact you within 24 hours.</p>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="modal-btn custom-btn" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
  </div>
</div>
@endsection
