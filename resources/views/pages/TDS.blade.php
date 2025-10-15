@extends('layouts.app') 

@section('content')
<!-- Hero Section -->
<section class="hero-about">
    <div class="hero-overlay">
    <img src="{{ asset('assets/images/TDS.jpg') }}" alt="About Us" class="hero-img">
        <div class="hero-content container">
            <h1>Tax Deducted at Source (TDS)</h1>
            <p>
                Understand how TDS works, check rates, due dates, and learn how to claim TDS refunds with our expert guidance.
            </p>
        </div>
    </div>
</section>

<!-- TDS Info Section -->
<section class="tds-info-section">
    <div class="container">
        <h2 class="section-title custom-heading middle-line">What is TDS?</h2>
        <div class="tds-info">
            <div class="info-card">
                <div class="icon"><i class="fas fa-briefcase"></i></div>
                <h3>TDS Concept</h3>
                <p>TDS is a means of collecting income tax in India, under the Indian Income Tax Act of 1961. Any payment covered under these provisions shall be paid after deducting a prescribed percentage of tax.</p>
            </div>
            <div class="info-card">
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                <h3>Due Dates</h3>
                <p>TDS must be deposited with the government by the 7th of the following month. For March, the due date is April 30th. TDS returns must be filed quarterly.</p>
            </div>
            <div class="info-card">
                <div class="icon"><i class="fa-solid fa-sack-dollar"></i></div>
                <h3>TDS Refund</h3>
                <p>If the TDS deducted is more than your total tax liability, you can claim a refund by filing your income tax return (ITR). The refund will be credited to your bank account.</p>
            </div>
        </div>
    </div>
</section>

<!-- TDS Rates Section -->
<section class="tds-rates-section">
    <div class="container">
        <h2 class="section-title custom-heading middle-line">TDS Rates for FY 2023-24 (AY 2024-25)</h2>
        <table class="tds-table">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Nature of Payment</th>
                    <th>TDS Rate (%)</th>
                    <th>Threshold Limit (₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>192</td>
                    <td>Salary</td>
                    <td>As per slab rates</td>
                    <td>Basic exemption limit</td>
                </tr>
                <tr>
                    <td>194</td>
                    <td>Dividend</td>
                    <td>10</td>
                    <td>5,000</td>
                </tr>
                <tr>
                    <td>194A</td>
                    <td>Interest (other than securities)</td>
                    <td>10</td>
                    <td>40,000 (₹50,000 for seniors)</td>
                </tr>
                <tr>
                    <td>194C</td>
                    <td>Contractor payments</td>
                    <td>1 (individual/HUF) / 2 (others)</td>
                    <td>30,000 (single) / 1,00,000 (aggregate)</td>
                </tr>
                <tr>
                    <td>194H</td>
                    <td>Commission/Brokerage</td>
                    <td>5</td>
                    <td>15,000</td>
                </tr>
                <tr>
                    <td>194I</td>
                    <td>Rent</td>
                    <td>2 (land/building) / 10 (machinery/equipment)</td>
                    <td>2,40,000</td>
                </tr>
                <tr>
                    <td>194J</td>
                    <td>Professional/Technical services</td>
                    <td>10</td>
                    <td>30,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- TDS Calculator Section -->
<section class="TDS-Calculater" id="tds-calculator">
    <div class="container">
        <h2 class="section-title custom-heading middle-line">TDS Calculator</h2>
        <div class="info-card" style="max-width: 600px; margin: 0 auto;">
            <h3>Calculate Your TDS Deduction</h3>
            <form id="tdsForm" method="POST" action="{{ route('TDS.calculate') }}" style="margin-top: 1.5rem;">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="paymentType" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Payment Type</label>
                    <select id="paymentType" name="paymentType" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="194">Dividend (Section 194)</option>
                        <option value="194A">Interest (Section 194A)</option>
                        <option value="194C">Contractor Payment (Section 194C)</option>
                        <option value="194H">Commission/Brokerage (Section 194H)</option>
                        <option value="194I">Rent (Section 194I)</option>
                        <option value="194J">Professional Fees (Section 194J)</option>
                    </select>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="amount" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Payment Amount (₹)</label>
                    <input type="number" id="amount" name="amount" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <button type="button"  onclick="calculateTDS()" class="custom-btn calculater-btn" style="width: 100%;">Calculate TDS</button>
            </form>

            @if(session('tds_result'))
            <div id="result" style="margin-top: 1.5rem; padding: 1rem; background-color: #f8f9fa; border-radius: 4px;">
                <h4 style="margin-bottom: 0.5rem;">TDS Calculation Result</h4>
                <p>TDS Amount: ₹{{ session('tds_result.tdsAmount') }}</p>
                <p>Net Payment: ₹{{ session('tds_result.netPayment') }}</p>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="FAQ-section">
    <div class="container">
        <h2 class="section-title custom-heading middle-line">Frequently Asked Questions</h2>
        <div class="faq-container">
            @foreach($faqs as $faq)
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    {{ $faq['question'] }} <span>+</span>
                </div>
                <div class="faq-answer">
                    {!! $faq['answer'] !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
