// Service prices and required documents data
const servicePricesData = {
    'passport': 2500,
    'visa': 3000,
    'birth_certificate': 800,
    'marriage_certificate': 1200,
    'police_clearance': 1500,
    'business_registration': 5000,
    'trademark': 8000,
    'gst_registration': 2000,
    'income_tax_return': 1500,
    'pan_card': 500
};

const requiredDocumentsData = {
    'passport': ['PAN Card', 'Aadhaar Card', 'Photograph', 'Address Proof'],
    'visa': ['PAN Card', 'Aadhaar Card', 'Photograph', 'Bank Statements', 'Form 16'],
    'birth_certificate': ['Parent Marriage Certificate', 'Address Proof'],
    'marriage_certificate': ['PAN Card', 'Aadhaar Card', 'Photograph'],
    'police_clearance': ['PAN Card', 'Aadhaar Card', 'Address Proof'],
    'business_registration': ['Director PAN', 'Director Aadhaar', 'Business Address Proof'],
    'trademark': ['Trademark Logo', 'Applicant Details', 'Goods/Services List'],
    'gst_registration': ['PAN Card', 'Aadhaar Card', 'Business Address Proof'],
    'income_tax_return': ['PAN Card', 'Form 16', 'Investment Proofs'],
    'pan_card': ['Aadhaar Card', 'Photograph']
};

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('applicationForm');
    const appTypeSelect = document.getElementById('application_type');
    const docContainer = document.getElementById('documentFields');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const payBtn = document.getElementById('payBtn');
    const summaryService = document.getElementById('summaryService');
    const summaryAmount = document.getElementById('summaryAmount');
    const summaryTotal = document.getElementById('summaryTotal');

    let selectedAmount = 0;

    // Helper function to get document help text
    function getDocumentHelpText(docType) {
        const helpTexts = {
            'PAN Card': 'Clear scan of both sides of your PAN card',
            'Aadhaar Card': 'Front and back of your Aadhaar card',
            'Bank Account Details': 'Latest 3 months statement with IFSC code visible',
            'Photograph': 'White background, 35x45mm, 80% face coverage',
            'Business Address Proof': 'Utility bill or bank statement not older than 3 months',
            'Director PAN': 'Director PAN Card',
            'Director Aadhaar': 'Director Aadhaar Card',
            'Address Proof': 'Utility bill or bank statement not older than 3 months',
            'Form 16': 'Latest Form 16 from your employer',
            'Bank Statements': 'Latest 3 months statement with IFSC code visible',
            'Investment Proofs': 'Sections 80C, 80D, etc. as applicable',
            'Trademark Logo': 'High resolution logo file (min 400x400px)',
            'Applicant Details': 'Applicant Details',
            'Goods/Services List': 'Goods/Services List',
            'Power of Attorney': 'Power of Attorney'
        };
        return helpTexts[docType] || 'Please upload a clear, legible copy of this document';
    }

    // Helper function to check if all required documents are uploaded
    function checkAllDocumentsUploaded() {
        if (!appTypeSelect.value) {
            nextBtn.disabled = true;
            return false;
        }

        const requiredInputs = document.querySelectorAll('.doc-input[required]');
        let allFilled = requiredInputs.length > 0;

        requiredInputs.forEach(input => {
            if (!input.files || input.files.length === 0) {
                allFilled = false;
            }
        });

        nextBtn.disabled = !allFilled;
        return allFilled;
    }

    // Function to update document fields based on selected service
    function updateDocumentFields(serviceType) {
        const docs = requiredDocumentsData[serviceType] || [];

        if (docs.length === 0) {
            docContainer.innerHTML = `
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> No additional documents required for this service.
            </div>`;
            nextBtn.disabled = false;
            return;
        }

        let html = `<h6 class="mb-3">Required Documents</h6>` ;

        docs.forEach((doc, index) => {
            const safeName = doc.toLowerCase().replace(/[^a-z0-9]+/g, '');
            html += `
            <div class="mb-4 document-upload">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label mb-0">${doc} <span class="text-danger">*</span></label>
                    <span class="badge bg-light text-dark">${index + 1} of ${docs.length}</span>
                </div>
                <div class="input-group">
                    <input type="hidden" name="document_names[]" value="${doc}">
                    <input type="hidden" name="file_titles[]" value="${doc}">
                    <input type="file" name="documents[]" class="form-control doc-input" id="doc-${safeName}" accept=".pdf,.jpg,.jpeg,.png" required>
                    <label class="input-group-text" for="doc-${safeName}"><i class="fas fa-upload"></i></label>
                </div>
                <div class="form-text small"><i class="fas fa-info-circle me-1"></i> ${getDocumentHelpText(doc)}</div>
            </div>`;
        });
        docContainer.innerHTML = html;

        // Add event listeners to new file inputs
        document.querySelectorAll('.doc-input').forEach(input => {
            input.addEventListener('change', checkAllDocumentsUploaded);
        });

        checkAllDocumentsUploaded();
    }

    // Application type selection handler
    appTypeSelect.addEventListener('change', function () {
        const appType = this.value;
        selectedAmount = servicePricesData[appType] || 0;
        updateDocumentFields(appType);
    });

    // Next button click handler
    nextBtn.addEventListener('click', function () {
        if (!checkAllDocumentsUploaded()) {
            alert('Please select an application type and upload all required documents.');
            return;
        }

        // Update order summary
        const selectedService = appTypeSelect.options[appTypeSelect.selectedIndex].text;
        summaryService.textContent = selectedService;
        summaryAmount.textContent = '₹' + selectedAmount.toLocaleString('en-IN');
        summaryTotal.textContent = '₹' + selectedAmount.toLocaleString('en-IN');

        // Show payment step
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';

        nextBtn.style.display = 'none';
        prevBtn.style.display = 'inline-block';
        payBtn.style.display = 'inline-block';
        payBtn.disabled = false;

        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Previous button click handler
    prevBtn.addEventListener('click', function () {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step1').style.display = 'block';

        nextBtn.style.display = 'inline-block';
        prevBtn.style.display = 'none';
        payBtn.style.display = 'none';

        checkAllDocumentsUploaded();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Initialize data from PHP (if available)
    if (typeof servicePricesData !== 'undefined') {
        servicePrices = servicePricesData;
    }
    if (typeof requiredDocumentsData !== 'undefined') {
        requiredDocuments = requiredDocumentsData;
    }

    // Initial state check
    checkAllDocumentsUploaded();
});