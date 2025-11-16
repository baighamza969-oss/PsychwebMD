// Appointment Booking Form JavaScript

let currentStep = 0;
let isNewPatient = true;
let emailVerified = false;
let otpSent = false;
let generatedOtp = '';

// Initialize form
document.addEventListener('DOMContentLoaded', function() {
    initializeTabs();
    initializeForm();
    initializeOTP();
    initializeConditionalFields();
    updateProgressIndicator(0); // Initialize progress indicator
});

// Tab switching functionality
function initializeTabs() {
    const newPatientTab = document.getElementById('newPatientTab');
    const establishedPatientTab = document.getElementById('establishedPatientTab');
    const newPatientForm = document.getElementById('newPatientForm');
    const establishedPatientForm = document.getElementById('establishedPatientForm');

    newPatientTab.addEventListener('click', () => {
        isNewPatient = true;
        newPatientTab.classList.add('active');
        establishedPatientTab.classList.remove('active');
        newPatientForm.style.display = 'block';
        establishedPatientForm.style.display = 'none';
        currentStep = 0;
        showStep(0);
        resetForm();
    });

    establishedPatientTab.addEventListener('click', () => {
        isNewPatient = false;
        establishedPatientTab.classList.add('active');
        newPatientTab.classList.remove('active');
        newPatientForm.style.display = 'none';
        establishedPatientForm.style.display = 'block';
        resetForm();
    });
}

// Initialize form
function initializeForm() {
    const form = document.getElementById('appointmentForm');
    const establishedForm = document.getElementById('establishedPatientFormElement');

    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }

    if (establishedForm) {
        establishedForm.addEventListener('submit', handleEstablishedFormSubmit);
    }

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(input => {
        input.setAttribute('min', today);
    });
}

// OTP functionality
function initializeOTP() {
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    const verifyOtpBtn = document.getElementById('verifyOtpBtn');
    const sendEstablishedOtpBtn = document.getElementById('sendEstablishedOtpBtn');
    const verifyEstablishedOtpBtn = document.getElementById('verifyEstablishedOtpBtn');

    if (sendOtpBtn) {
        sendOtpBtn.addEventListener('click', handleSendOTP);
    }

    if (verifyOtpBtn) {
        verifyOtpBtn.addEventListener('click', handleVerifyOTP);
    }

    if (sendEstablishedOtpBtn) {
        sendEstablishedOtpBtn.addEventListener('click', handleSendEstablishedOTP);
    }

    if (verifyEstablishedOtpBtn) {
        verifyEstablishedOtpBtn.addEventListener('click', handleVerifyEstablishedOTP);
    }
}

// Generate random 6-digit OTP
function generateOTP() {
    return Math.floor(100000 + Math.random() * 900000).toString();
}

// Send OTP for new patient
function handleSendOTP() {
    const emailInput = document.getElementById('email');
    const email = emailInput.value.trim();
    const emailError = document.getElementById('emailError');

    if (!email || !isValidEmail(email)) {
        emailError.textContent = 'Please enter a valid email address';
        emailError.classList.add('show');
        return;
    }

    emailError.classList.remove('show');
    
    // Generate and store OTP
    generatedOtp = generateOTP();
    otpSent = true;

    // In a real application, you would send this OTP to the server
    // and the server would email it to the user
    console.log('OTP for', email, ':', generatedOtp);
    
    // For demo purposes, show OTP in alert (remove in production)
    alert(`OTP sent to ${email}\nDemo OTP: ${generatedOtp}`);

    // Show OTP input section
    document.getElementById('otpSection').style.display = 'block';
    document.getElementById('sendOtpBtn').style.display = 'none';
    document.getElementById('verifyOtpBtn').style.display = 'inline-block';
}

// Verify OTP for new patient
function handleVerifyOTP() {
    const otpInput = document.getElementById('otp');
    const otp = otpInput.value.trim();
    const otpError = document.getElementById('otpError');

    if (!otp || otp.length !== 6) {
        otpError.textContent = 'Please enter a valid 6-digit OTP';
        otpError.classList.add('show');
        return;
    }

    if (otp !== generatedOtp) {
        otpError.textContent = 'Invalid OTP. Please try again.';
        otpError.classList.add('show');
        return;
    }

    otpError.classList.remove('show');
    emailVerified = true;
    
    // Move to next step
    nextStep();
}

// Send OTP for established patient
function handleSendEstablishedOTP() {
    const emailInput = document.getElementById('establishedEmail');
    const email = emailInput.value.trim();
    const emailError = document.getElementById('establishedEmailError');

    if (!email || !isValidEmail(email)) {
        emailError.textContent = 'Please enter a valid email address';
        emailError.classList.add('show');
        return;
    }

    emailError.classList.remove('show');
    
    // Generate and store OTP
    generatedOtp = generateOTP();
    otpSent = true;

    // In a real application, you would verify the email exists in database
    // and send OTP to that email
    console.log('OTP for established patient', email, ':', generatedOtp);
    
    // For demo purposes, show OTP in alert (remove in production)
    alert(`OTP sent to ${email}\nDemo OTP: ${generatedOtp}`);

    // Show OTP input section
    document.getElementById('establishedOtpSection').style.display = 'block';
    document.getElementById('sendEstablishedOtpBtn').style.display = 'none';
    document.getElementById('verifyEstablishedOtpBtn').style.display = 'inline-block';
}

// Verify OTP for established patient
function handleVerifyEstablishedOTP() {
    const otpInput = document.getElementById('establishedOtp');
    const otp = otpInput.value.trim();
    const otpError = document.getElementById('establishedOtpError');

    if (!otp || otp.length !== 6) {
        otpError.textContent = 'Please enter a valid 6-digit OTP';
        otpError.classList.add('show');
        return;
    }

    if (otp !== generatedOtp) {
        otpError.textContent = 'Invalid OTP. Please try again.';
        otpError.classList.add('show');
        return;
    }

    otpError.classList.remove('show');
    emailVerified = true;
    
    // Hide email verification section and show schedule form for established patient
    const emailCard = document.querySelector('#establishedPatientForm .form-card');
    if (emailCard) {
        emailCard.style.display = 'none';
    }
    document.getElementById('establishedScheduleStep').style.display = 'block';
    document.getElementById('verifyEstablishedOtpBtn').style.display = 'none';
}

// Email validation
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Form navigation
function nextStep() {
    if (!validateCurrentStep()) {
        return;
    }

    if (currentStep < 7) {
        currentStep++;
        showStep(currentStep);
    }
}

function previousStep() {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
}

function showStep(step) {
    const steps = document.querySelectorAll('.form-step');
    steps.forEach((s, index) => {
        if (index === step) {
            s.classList.add('active');
        } else {
            s.classList.remove('active');
        }
    });

    // Update progress indicator (hide on success step)
    const progressIndicator = document.getElementById('progressIndicator');
    if (step === 7) {
        if (progressIndicator) {
            progressIndicator.style.display = 'none';
        }
    } else {
        if (progressIndicator) {
            progressIndicator.style.display = 'block';
        }
        updateProgressIndicator(step);
    }

    // Scroll to top of form
    document.querySelector('.booking-form-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Update progress indicator
function updateProgressIndicator(step) {
    const progressIndicator = document.getElementById('progressIndicator');
    const progressFill = document.getElementById('progressFill');
    const progressSteps = document.querySelectorAll('.progress-step');

    if (progressIndicator && progressFill && progressSteps.length > 0) {
        // Calculate progress percentage (8 total steps: 0-7)
        const totalSteps = 8;
        const progress = ((step + 1) / totalSteps) * 100;
        progressFill.style.width = progress + '%';

        // Update active step
        progressSteps.forEach((stepEl, index) => {
            if (index === step) {
                stepEl.classList.add('active');
            } else {
                stepEl.classList.remove('active');
            }
        });
    }
}

// Validate current step
function validateCurrentStep() {
    const currentStepElement = document.querySelector(`.form-step[data-step="${currentStep}"]`);
    const requiredFields = currentStepElement.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
        const errorElement = field.parentElement.querySelector('.error-message') || 
                           document.getElementById(field.id + 'Error');
        
        if (!field.value || (field.type === 'checkbox' && !field.checked)) {
            isValid = false;
            if (errorElement) {
                errorElement.textContent = 'This field is required';
                errorElement.classList.add('show');
            }
            field.style.borderColor = '#ef4444';
        } else {
            if (errorElement) {
                errorElement.classList.remove('show');
            }
            field.style.borderColor = '';
        }

        // Special validation for email
        if (field.type === 'email' && field.value && !isValidEmail(field.value)) {
            isValid = false;
            if (errorElement) {
                errorElement.textContent = 'Please enter a valid email address';
                errorElement.classList.add('show');
            }
            field.style.borderColor = '#ef4444';
        }

        // Special validation for OTP
        if (field.id === 'otp' && field.value && field.value.length !== 6) {
            isValid = false;
            if (errorElement) {
                errorElement.textContent = 'OTP must be 6 digits';
                errorElement.classList.add('show');
            }
            field.style.borderColor = '#ef4444';
        }
    });

    // Check if email is verified for step 0
    if (currentStep === 0 && !emailVerified) {
        isValid = false;
        const emailError = document.getElementById('emailError');
        if (emailError && !otpSent) {
            emailError.textContent = 'Please verify your email first';
            emailError.classList.add('show');
        }
    }

    return isValid;
}

// Initialize conditional fields
function initializeConditionalFields() {
    // Policy Holder Other
    const policyHolder = document.getElementById('policyHolder');
    if (policyHolder) {
        policyHolder.addEventListener('change', function() {
            const otherGroup = document.getElementById('policyHolderOtherGroup');
            if (this.value === 'other') {
                otherGroup.style.display = 'block';
                document.getElementById('policyHolderOther').required = true;
            } else {
                otherGroup.style.display = 'none';
                document.getElementById('policyHolderOther').required = false;
            }
        });
    }

    // Drug use frequency
    const drugUseYes = document.getElementById('drugUseYes');
    const drugUseNo = document.getElementById('drugUseNo');
    const drugUseFrequencyGroup = document.getElementById('drugUseFrequencyGroup');

    if (drugUseYes && drugUseNo && drugUseFrequencyGroup) {
        drugUseYes.addEventListener('change', function() {
            if (this.checked) {
                drugUseFrequencyGroup.style.display = 'block';
                document.querySelectorAll('input[name="drug_use_frequency"]').forEach(radio => {
                    radio.required = true;
                });
            }
        });

        drugUseNo.addEventListener('change', function() {
            if (this.checked) {
                drugUseFrequencyGroup.style.display = 'none';
                document.querySelectorAll('input[name="drug_use_frequency"]').forEach(radio => {
                    radio.required = false;
                    radio.checked = false;
                });
            }
        });
    }

    // Emergency relationship other
    const emergencyRelationship = document.getElementById('emergencyRelationship');
    if (emergencyRelationship) {
        emergencyRelationship.addEventListener('change', function() {
            const otherGroup = document.getElementById('emergencyRelationshipOtherGroup');
            if (this.value === 'other') {
                otherGroup.style.display = 'block';
                document.getElementById('emergencyRelationshipOther').required = true;
            } else {
                otherGroup.style.display = 'none';
                document.getElementById('emergencyRelationshipOther').required = false;
            }
        });
    }
}

// Handle form submission
function handleFormSubmit(e) {
    e.preventDefault();

    if (!validateCurrentStep()) {
        return;
    }

    // Validate terms and conditions
    const agreeTerms = document.getElementById('agreeTerms');
    if (!agreeTerms.checked) {
        const termsError = document.getElementById('termsError');
        termsError.textContent = 'You must agree to terms and conditions';
        termsError.classList.add('show');
        return;
    }

    // Collect form data
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());

    // In a real application, you would send this data to the server
    console.log('Form submitted:', data);

    // Show success step instead of alert
    currentStep = 7;
    showStep(7);
}

// Handle established patient form submission
function handleEstablishedFormSubmit(e) {
    e.preventDefault();

    // Validate terms and conditions
    const agreeTerms = document.getElementById('establishedAgreeTerms');
    if (!agreeTerms.checked) {
        const termsError = document.getElementById('establishedTermsError');
        termsError.textContent = 'You must agree to terms and conditions';
        termsError.classList.add('show');
        return;
    }

    // Collect form data
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());

    // In a real application, you would send this data to the server
    console.log('Established patient form submitted:', data);

    // Hide schedule step and show success step
    document.getElementById('establishedScheduleStep').style.display = 'none';
    document.getElementById('establishedSuccessStep').style.display = 'block';
    
    // Scroll to top
    document.querySelector('.booking-form-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Reset form
function resetForm() {
    currentStep = 0;
    emailVerified = false;
    otpSent = false;
    generatedOtp = '';
    
    if (isNewPatient) {
        showStep(0);
        document.getElementById('appointmentForm').reset();
        document.getElementById('otpSection').style.display = 'none';
        document.getElementById('sendOtpBtn').style.display = 'inline-block';
        document.getElementById('verifyOtpBtn').style.display = 'none';
    } else {
        document.getElementById('establishedPatientFormElement').reset();
        document.getElementById('establishedOtpSection').style.display = 'none';
        document.getElementById('establishedScheduleStep').style.display = 'none';
        document.getElementById('establishedSuccessStep').style.display = 'none';
        const emailCard = document.querySelector('#establishedPatientForm .form-card');
        if (emailCard) {
            emailCard.style.display = 'block';
        }
        document.getElementById('sendEstablishedOtpBtn').style.display = 'inline-block';
        document.getElementById('verifyEstablishedOtpBtn').style.display = 'none';
    }
}

// Phone number formatting
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('cellPhone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = `(${value}`;
                } else if (value.length <= 6) {
                    value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
                } else {
                    value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
                }
            }
            e.target.value = value;
        });
    }
});

// Make functions globally available
window.nextStep = nextStep;
window.previousStep = previousStep;
window.resetForm = resetForm;

