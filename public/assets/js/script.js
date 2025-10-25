// Enhanced logout functionality and OTP system

document.addEventListener('DOMContentLoaded', function() {
    // Enhanced logout functionality
    const logoutForm = document.getElementById('logout-form');
    const logoutLinks = document.querySelectorAll('a[href="#"][onclick*="logout"]');

    // Handle logout confirmation and submission
    logoutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Show confirmation dialog
            if (confirm('Are you sure you want to logout?')) {
                // Add loading state
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Logging out...';
                this.style.pointerEvents = 'none';

                // Submit the form after a short delay for better UX
                setTimeout(() => {
                    logoutForm.submit();
                }, 500);
            }
        });
    });

    // Auto-hide alerts after 5 seconds
    // const alerts = document.querySelectorAll('.alert');
    // alerts.forEach(alert => {
    //     setTimeout(() => {
    //         alert.style.opacity = '0';
    //         setTimeout(() => {
    //             alert.style.display = 'none';
    //         }, 300);
    //     }, 5000);
    // });

    // Email validation function
    function isValidEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    // Real-time email validation for login form
    const loginEmailInput = document.querySelector('input[name="email"]');
    if (loginEmailInput) {
        loginEmailInput.addEventListener('blur', function() {
            const email = this.value.trim();
            if (email && !isValidEmail(email)) {
                this.classList.add('is-invalid');
                if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    feedback.textContent = 'Please enter a valid email address format.';
                    this.parentNode.insertBefore(feedback, this.nextSibling);
                }
            } else {
                this.classList.remove('is-invalid');
                const feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            }
        });
    }

    // Real-time email validation for registration form
    const registerEmailInput = document.querySelector('form[action*="register"] input[name="email"]');
    if (registerEmailInput) {
        registerEmailInput.addEventListener('blur', function() {
            const email = this.value.trim();
            if (email && !isValidEmail(email)) {
                this.classList.add('is-invalid');
                if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    feedback.textContent = 'Please enter a valid email address format.';
                    this.parentNode.insertBefore(feedback, this.nextSibling);
                }
            } else {
                this.classList.remove('is-invalid');
                const feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            }
        });
    }

    // OTP input formatting and validation
    const otpInput = document.getElementById('otp');
    if (otpInput) {
        otpInput.addEventListener('input', function(e) {
            // Only allow numbers
            this.value = this.value.replace(/[^0-9]/g, '');

            // Limit to 6 digits
            if (this.value.length >= 6) {
                this.value = this.value.substring(0, 6);
            }
        });

        otpInput.addEventListener('keydown', function(e) {
            // Allow backspace, delete, tab, escape, enter
            if (e.key === 'Backspace' || e.key === 'Delete' || e.key === 'Tab' || e.key === 'Escape' || e.key === 'Enter') {
                return;
            }
            // Prevent non-numeric input
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });
    }

    // Form validation for contact forms
    const commonForm = document.getElementById('common-form');
    if (commonForm) {
        commonForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const name = commonForm.elements['name'].value.trim();
            const email = commonForm.elements['email'].value.trim();
            const message = commonForm.elements['message'].value.trim();

            let hasError = false;

            // Reset styles
            ['name', 'email', 'message'].forEach(field => {
                commonForm.elements[field].style.border = '';
            });

            if (!name) {
                commonForm.elements['name'].style.border = '1px solid red';
                hasError = true;
            }

            if (!email || !isValidEmail(email)) {
                commonForm.elements['email'].style.border = '1px solid red';
                hasError = true;
            }

            if (!message) {
                commonForm.elements['message'].style.border = '1px solid red';
                hasError = true;
            }

            if (hasError) {
                alert('Please fill all required fields correctly.');
                return;
            }

            alert('Form submitted successfully!');
            commonForm.reset();
        });
    }

    // TDS Calculator functionality
    const calculateTDS = function() {
        const paymentType = document.getElementById('paymentType').value;
        const amount = parseFloat(document.getElementById('amount').value);

        if (isNaN(amount)){
            alert('Please enter a valid amount');
            return;
        }
        let rate = 0;
        let threshold = 0;

        switch(paymentType) {
            case '194':
                rate = 10;
                threshold = 5000;
                break;
            case '194A':
                rate = 10;
                threshold = 40000;
                break;
            case '194C':
                rate = 1; // Assuming individual/HUF
                threshold = 30000;
                break;
            case '194H':
                rate = 5;
                threshold = 15000;
                break;
            case '194I':
                rate = 2; // Assuming land/building
                threshold = 240000;
                break;
            case '194J':
                rate = 10;
                threshold = 30000;
                break;
        }

        let tds = 0;
        if (amount > threshold) {
            tds = (amount * rate) / 100;
        }

        const netPayment = amount - tds;

        document.getElementById('tdsAmount').innerHTML = `<strong>TDS Amount:</strong> ₹${tds.toFixed(2)} (${rate}%)`;
        document.getElementById('netPayment').innerHTML = `<strong>Net Payment:</strong> ₹${netPayment.toFixed(2)}`;

        document.getElementById('result').style.display = 'block';
    };

    // Make calculateTDS function global
    window.calculateTDS = calculateTDS;

    // FAQ toggle functionality
    const toggleFAQ = function(element) {
        const answer = element.nextElementSibling;
        const icon = element.querySelector('span');

        if (answer.classList.contains('show')) {
            answer.classList.remove('show');
            icon.textContent = '+';
        } else {
            answer.classList.add('show');
            icon.textContent = '-';
        }
    };

    // Make toggleFAQ function global
    window.toggleFAQ = toggleFAQ;

    // Password toggle functionality
    const togglePassword = function(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '_icon');

        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    };

    // Make togglePassword function global
    window.togglePassword = togglePassword;

    // Password match validation
    const checkPasswordMatch = function() {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const matchIndicator = document.getElementById('match-indicator');
        const submitBtn = document.getElementById('submitBtn');

        if (confirmPassword === '') {
            matchIndicator.innerHTML = '';
            submitBtn.disabled = false;
            return;
        }

        if (newPassword === confirmPassword) {
            matchIndicator.innerHTML = '<i class="fas fa-check me-1"></i>Passwords match';
            matchIndicator.className = 'match-indicator match-success';
            submitBtn.disabled = false;
        } else {
            matchIndicator.innerHTML = '<i class="fas fa-times me-1"></i>Passwords do not match';
            matchIndicator.className = 'match-indicator match-error';
            submitBtn.disabled = true;
        }
    };

    // Make checkPasswordMatch function global
    window.checkPasswordMatch = checkPasswordMatch;

    // Form submission validation
    const passwordForm = document.getElementById('passwordForm');
    if (passwordForm) {
        passwordForm.addEventListener('submit', function(e) {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }
        });
    }
});
