
  document.addEventListener('DOMContentLoaded', function() {
    // console.log('Auth toggle script running');

    // select all toggles (links/buttons that have the attribute)
    const toggles = document.querySelectorAll('[data-auth-form-toggle]');
    if (!toggles || toggles.length === 0) {
      console.warn('No auth toggles found (data-auth-form-toggle).');
    }

    // helper to show a form by id
    function showAuthForm(formId) {
      document.querySelectorAll('.auth-form-box').forEach(f => f.classList.remove('auth-form-active'));
      const target = document.getElementById(formId);
      if (target) {
        target.classList.add('auth-form-active');
      } else {
        console.error('Target form not found:', formId);
      }
    }

    // attach click handlers
    toggles.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = this.getAttribute('data-auth-form-toggle');
        console.log('Toggle to:', target);
        showAuthForm(target);
      });
    });

    // Simple toggle function for auth forms (for onclick handlers)
    window.toggleAuthForm = function(targetForm) {
        document.querySelectorAll('.auth-form-box').forEach(form => {
            form.classList.remove('auth-form-active');
        });
        document.getElementById(targetForm).classList.add('auth-form-active');
    };

    // Add form submission debugging
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            console.log('Login form submitted');
            console.log('Email:', document.getElementById('login_email').value);
            console.log('Password length:', document.getElementById('login_password').value.length);
        });
    }

    // Add registration form debugging
    
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            console.log('Registration form submitted');
            console.log('Form action:', this.action);
            console.log('Form method:', this.method);

            const formData = new FormData(this);
            console.log('Form data being sent:');
            for (let [key, value] of formData.entries()) {
                console.log(key + ':', value);
            }

            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.textContent = 'Creating Account...';
                submitBtn.disabled = true;
            }
        });
    }

    // optional: ensure login visible by default if none active
    const anyActive = document.querySelector('.auth-form-box.auth-form-active');
    if (!anyActive) {
      const login = document.getElementById('login-form');
      if (login) login.classList.add('auth-form-active');
    }
  });
