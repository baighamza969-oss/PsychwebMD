<?php
$pageTitle = "Book Your Appointment - PsychwebMD";
include 'includes/header.php';
?>

<div class="appointment-booking">
    <div class="container">
        <div class="booking-header">
            <h1 class="booking-title">Book Your Appointment</h1>
            <p class="booking-subtitle">Schedule your consultation with our expert psychiatrists.</p>
        </div>

        <!-- Patient Type Tabs -->
        <div class="patient-type-tabs">
            <button class="tab-btn active" data-tab="new-patient" id="newPatientTab">New Patient</button>
            <button class="tab-btn" data-tab="established-patient" id="establishedPatientTab">Established Patient</button>
        </div>

        <!-- New Patient Form -->
        <div class="booking-form-container" id="newPatientForm">
            <form id="appointmentForm" class="appointment-form">
                <!-- Progress Indicator -->
                <div class="progress-indicator" id="progressIndicator">
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <div class="progress-steps">
                        <span class="progress-step active" data-step="0">Email</span>
                        <span class="progress-step" data-step="1">Personal</span>
                        <span class="progress-step" data-step="2">Reason</span>
                        <span class="progress-step" data-step="3">Insurance</span>
                        <span class="progress-step" data-step="4">Health</span>
                        <span class="progress-step" data-step="5">Emergency</span>
                        <span class="progress-step" data-step="6">Schedule</span>
                        <span class="progress-step" data-step="7">Complete</span>
                    </div>
                </div>
                
                <!-- Step 0: Email Verification -->
                <div class="form-step active" data-step="0">
                    <div class="form-card">
                        <h2 class="form-section-title">Email Verification</h2>
                        <p class="form-section-subtitle">Verify your email address</p>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="your.email@example.com" required>
                            <div class="error-message" id="emailError"></div>
                        </div>
                        
                        <div class="otp-section" id="otpSection" style="display: none;">
                            <div class="form-group">
                                <label for="otp" class="form-label">Enter OTP *</label>
                                <input type="text" id="otp" name="otp" class="form-input" placeholder="Enter 6-digit OTP" maxlength="6" required>
                                <div class="error-message" id="otpError"></div>
                                <p class="otp-info">We've sent a verification code to your email.</p>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn-secondary" id="sendOtpBtn">Send Verification Code</button>
                            <button type="button" class="btn-primary" id="verifyOtpBtn" style="display: none;">Verify OTP</button>
                        </div>
                    </div>
                </div>

                <!-- Step 1: Personal Information -->
                <div class="form-step" data-step="1">
                    <div class="form-card">
                        <h2 class="form-section-title">Personal Information</h2>
                        <p class="form-section-subtitle">Tell us about yourself.</p>
                        
                        <div class="form-group">
                            <label class="form-label">Who are you seeking help for? *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="seeking_help_for" value="myself" checked required>
                                    <span>Myself</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="seeking_help_for" value="someone_else" required>
                                    <span>Someone else</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" id="firstName" name="firstName" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="middleName" class="form-label">Middle Name</label>
                                <input type="text" id="middleName" name="middleName" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dob" class="form-label">Date of Birth *</label>
                                <input type="date" id="dob" name="dob" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="cellPhone" class="form-label">Cell Phone Number *</label>
                                <input type="tel" id="cellPhone" name="cellPhone" class="form-input" placeholder="(555) 123-4567" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Gender *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="male" required>
                                    <span>Male</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="female" required>
                                    <span>Female</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="other" required>
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-section-divider">
                            <h3 class="form-subsection-title">Primary Address</h3>
                        </div>

                        <div class="form-group">
                            <label for="streetAddress" class="form-label">Street Address *</label>
                            <input type="text" id="streetAddress" name="streetAddress" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="aptSuite" class="form-label">Apt, Suite, etc.</label>
                            <input type="text" id="aptSuite" name="aptSuite" class="form-input">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" id="city" name="city" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">State *</label>
                                <input type="text" id="state" name="state" class="form-input" maxlength="2" required>
                            </div>
                            <div class="form-group">
                                <label for="zipCode" class="form-label">ZIP Code *</label>
                                <input type="text" id="zipCode" name="zipCode" class="form-input" maxlength="5" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="hearAboutUs" class="form-label">How did you hear about us? *</label>
                            <select id="hearAboutUs" name="hearAboutUs" class="form-select" required>
                                <option value="">Select an option</option>
                                <option value="social_media">Social Media</option>
                                <option value="search_engine">Search Engine</option>
                                <option value="friend_family">Friend or Family</option>
                                <option value="healthcare_provider">Healthcare Provider</option>
                                <option value="advertisement">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="previousStep()">Previous</button>
                            <button type="button" class="btn-primary" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Reason for Visit -->
                <div class="form-step" data-step="2">
                    <div class="form-card">
                        <h2 class="form-section-title">Reason for Visit</h2>
                        <p class="form-section-subtitle">Your concerns.</p>
                        
                        <div class="form-group">
                            <label class="form-label">Your Concern or Reason for Consultation *</label>
                            <div class="radio-group vertical">
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="anxiety_panic" required>
                                    <span>Anxiety / Panic Symptoms</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="ocd" required>
                                    <span>Obsessive-Compulsive Disorder (OCD)</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="bipolar" required>
                                    <span>Bipolar Mood Disorder</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="ptsd" required>
                                    <span>Post-Traumatic Stress Disorder (PTSD)</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="depression" required>
                                    <span>Depressive Symptoms / Major Depression</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="adhd" required>
                                    <span>Attention Deficit/Hyperactivity Disorder (ADHD)</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="postpartum" required>
                                    <span>Postpartum Depression / Perinatal Mood Concerns</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="not_sure" required>
                                    <span>I'm Not Sure - I would like an assessment</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="eating_disorder" required>
                                    <span>Eating Disorder / Disordered Eating Concerns</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="personality_disorder" required>
                                    <span>Personality Disorder or Personality Related Difficulties</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="substance_use" required>
                                    <span>Substance Use / Addiction Concerns</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="concern" value="self_harm" required>
                                    <span>Self-Harm Thoughts or Behaviors</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="otherConcerns" class="form-label">Any other concerns? (Optional)</label>
                            <textarea id="otherConcerns" name="otherConcerns" class="form-textarea" rows="4" placeholder="Please describe any other concerns..."></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="previousStep()">Previous</button>
                            <button type="button" class="btn-primary" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Insurance Information -->
                <div class="form-step" data-step="3">
                    <div class="form-card">
                        <h2 class="form-section-title">Insurance</h2>
                        <p class="form-section-subtitle">Insurance information</p>
                        
                        <div class="form-section-divider">
                            <h3 class="form-subsection-title">Insurance Information</h3>
                            <p class="form-instruction">Please provide information as per your insurance card</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="memberFirstName" class="form-label">Member First Name *</label>
                                <input type="text" id="memberFirstName" name="memberFirstName" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="memberLastName" class="form-label">Member Last Name *</label>
                                <input type="text" id="memberLastName" name="memberLastName" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="memberDob" class="form-label">Member Date of Birth *</label>
                            <input type="date" id="memberDob" name="memberDob" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="insuranceName" class="form-label">Insurance Name *</label>
                            <input type="text" id="insuranceName" name="insuranceName" class="form-input" placeholder="e.g. Blue Cross Blue Shield" required>
                        </div>

                        <div class="form-group">
                            <label for="insuranceMemberId" class="form-label">Insurance Member ID *</label>
                            <input type="text" id="insuranceMemberId" name="insuranceMemberId" class="form-input" placeholder="Member ID from insurance card" required>
                        </div>

                        <div class="form-group">
                            <label for="policyHolder" class="form-label">Policy Holder *</label>
                            <select id="policyHolder" name="policyHolder" class="form-select" required>
                                <option value="me">Me</option>
                                <option value="spouse">Spouse</option>
                                <option value="parent">Parent</option>
                                <option value="step_parent">Step Parent</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group" id="policyHolderOtherGroup" style="display: none;">
                            <label for="policyHolderOther" class="form-label">Please specify *</label>
                            <input type="text" id="policyHolderOther" name="policyHolderOther" class="form-input">
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="previousStep()">Previous</button>
                            <button type="button" class="btn-primary" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Mental Health Questions -->
                <div class="form-step" data-step="4">
                    <div class="form-card">
                        <h2 class="form-section-title">Mental Health</h2>
                        <p class="form-section-subtitle">Health questions.</p>
                        
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="agreeToProvideInfo" name="agreeToProvideInfo" required>
                                <span>I agree to provide this information.</span>
                            </label>
                            <p class="form-help-text">This information helps us provide you with the best possible care.</p>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Have you been admitted to a hospital or inpatient facility for mental health concerns within the past year? *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="hospital_admission" value="yes" required>
                                    <span>Yes</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="hospital_admission" value="no" required>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Do you currently feel at risk of harming yourself? *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="self_harm_risk" value="yes" required>
                                    <span>Yes</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="self_harm_risk" value="no" required>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Please share about your relationship with alcohol</label>
                            <p class="form-sub-question">After drinking alcohol</p>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="alcohol_relationship" value="feel_healthy">
                                    <span>I feel healthy</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="alcohol_relationship" value="feel_unhealthy">
                                    <span>I feel unhealthy</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="alcohol_relationship" value="unsure">
                                    <span>I am unsure</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="alcohol_relationship" value="do_not_drink">
                                    <span>I do not drink alcohol</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Do you use drugs? *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="drug_use" value="yes" id="drugUseYes" required>
                                    <span>Yes</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="drug_use" value="no" id="drugUseNo" required>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="drugUseFrequencyGroup" style="display: none;">
                            <label class="form-label">If yes, how often? *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="drug_use_frequency" value="daily">
                                    <span>Daily</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="drug_use_frequency" value="once_week">
                                    <span>Once a week</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="drug_use_frequency" value="once_month">
                                    <span>Once a month</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="drug_use_frequency" value="occasionally">
                                    <span>Occasionally</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="drug_use_frequency" value="never">
                                    <span>Never</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="drug_use_frequency" value="past_use">
                                    <span>I have used drugs in the past but not currently</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Are you open to taking mental health medication as part of your treatment plan? *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="medication_openness" value="yes" required>
                                    <span>Yes</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="medication_openness" value="no" required>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="previousStep()">Previous</button>
                            <button type="button" class="btn-primary" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Emergency Contact -->
                <div class="form-step" data-step="5">
                    <div class="form-card">
                        <h2 class="form-section-title">Emergency Contact</h2>
                        <p class="form-section-subtitle">Emergency information</p>
                        
                        <div class="form-section-divider">
                            <h3 class="form-subsection-title">Emergency Contact Details</h3>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="emergencyFirstName" class="form-label">First Name *</label>
                                <input type="text" id="emergencyFirstName" name="emergencyFirstName" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="emergencyMiddleName" class="form-label">Middle Name</label>
                                <input type="text" id="emergencyMiddleName" name="emergencyMiddleName" class="form-input">
                            </div>
                            <div class="form-group">
                                <label for="emergencyLastName" class="form-label">Last Name *</label>
                                <input type="text" id="emergencyLastName" name="emergencyLastName" class="form-input" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emergencyRelationship" class="form-label">Relationship *</label>
                            <select id="emergencyRelationship" name="emergencyRelationship" class="form-select" required>
                                <option value="">Select relationship</option>
                                <option value="caregiver">Care Giver</option>
                                <option value="friend">Friend</option>
                                <option value="parent">Parent</option>
                                <option value="spouse">Spouse</option>
                                <option value="child">Child</option>
                                <option value="sibling">Sibling</option>
                                <option value="other">Others</option>
                            </select>
                        </div>

                        <div class="form-group" id="emergencyRelationshipOtherGroup" style="display: none;">
                            <label for="emergencyRelationshipOther" class="form-label">Please specify *</label>
                            <input type="text" id="emergencyRelationshipOther" name="emergencyRelationshipOther" class="form-input">
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="previousStep()">Previous</button>
                            <button type="button" class="btn-primary" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 6: Schedule Appointment -->
                <div class="form-step" data-step="6">
                    <div class="form-card">
                        <h2 class="form-section-title">Schedule</h2>
                        <p class="form-section-subtitle">Book your appointment.</p>
                        
                        <div class="form-section-divider">
                            <h3 class="form-subsection-title">Schedule Your Appointment</h3>
                            <p class="form-instruction">A confirmation email and SMS will be sent with your appointment details, date, time and meeting link.</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="preferredDate" class="form-label">Preferred Appointment Date *</label>
                                <input type="date" id="preferredDate" name="preferredDate" class="form-input" required>
                                <div class="error-message" id="dateError"></div>
                            </div>
                            <div class="form-group">
                                <label for="preferredTime" class="form-label">Preferred Appointment Time *</label>
                                <input type="time" id="preferredTime" name="preferredTime" class="form-input" required>
                                <div class="error-message" id="timeError"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
                                <span>I agree to the Terms and Conditions *</span>
                            </label>
                            <p class="form-help-text">By submitting this form, you acknowledge that you have read and agree to our terms of service and privacy policy.</p>
                            <div class="error-message" id="termsError"></div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-secondary" onclick="previousStep()">Previous</button>
                            <button type="submit" class="btn-primary">Submit Appointment Request</button>
                        </div>
                    </div>
                </div>

                <!-- Step 7: Success Message -->
                <div class="form-step" data-step="7">
                    <div class="form-card success-card">
                        <div class="success-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                                <path d="M8 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h2 class="form-section-title success-title">Appointment Request Submitted Successfully!</h2>
                        <p class="success-message">You will receive a confirmation email and SMS shortly.</p>
                        <div class="success-actions">
                            <button type="button" class="btn-primary" onclick="resetForm()">Book Another Appointment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Established Patient Form -->
        <div class="booking-form-container" id="establishedPatientForm" style="display: none;">
            <form id="establishedPatientFormElement" class="appointment-form">
                <div class="form-card">
                    <h2 class="form-section-title">Existing Patient Appointment</h2>
                    <p class="form-section-subtitle">Verify your email to schedule your next appointment.</p>
                    
                    <div class="form-group">
                        <label for="establishedEmail" class="form-label">Email Address *</label>
                        <input type="email" id="establishedEmail" name="establishedEmail" class="form-input" placeholder="your.email@example.com" required>
                        <p class="form-help-text">We'll send you a verification code to confirm your identity.</p>
                        <div class="error-message" id="establishedEmailError"></div>
                    </div>
                    
                    <div class="otp-section" id="establishedOtpSection" style="display: none;">
                        <div class="form-group">
                            <label for="establishedOtp" class="form-label">Enter OTP *</label>
                            <input type="text" id="establishedOtp" name="establishedOtp" class="form-input" placeholder="Enter 6-digit OTP" maxlength="6" required>
                            <div class="error-message" id="establishedOtpError"></div>
                            <p class="otp-info">We've sent a verification code to your email.</p>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" id="sendEstablishedOtpBtn">Send Verification Code</button>
                        <button type="button" class="btn-primary" id="verifyEstablishedOtpBtn" style="display: none;">Verify OTP</button>
                    </div>
                </div>

                <!-- Established Patient Schedule (shown after verification) -->
                <div id="establishedScheduleStep" style="display: none;">
                    <div class="form-card">
                        <h2 class="form-section-title">Schedule</h2>
                        <p class="form-section-subtitle">Book your appointment.</p>
                        
                        <div class="form-section-divider">
                            <h3 class="form-subsection-title">Schedule Your Appointment</h3>
                            <p class="form-instruction">A confirmation email and SMS will be sent to patient with appointment details i.e. date, time and medium of communication (link)</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="establishedPreferredDate" class="form-label">Preferred Appointment Date *</label>
                                <input type="date" id="establishedPreferredDate" name="establishedPreferredDate" class="form-input" required>
                                <div class="error-message" id="establishedDateError"></div>
                            </div>
                            <div class="form-group">
                                <label for="establishedPreferredTime" class="form-label">Preferred Appointment Time *</label>
                                <input type="time" id="establishedPreferredTime" name="establishedPreferredTime" class="form-input" required>
                                <div class="error-message" id="establishedTimeError"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="establishedAgreeTerms" name="establishedAgreeTerms" required>
                                <span>I agree to the Terms and Conditions *</span>
                            </label>
                            <p class="form-help-text">By submitting this form, you acknowledge that you have read and agree to our terms of service and privacy policy.</p>
                            <div class="error-message" id="establishedTermsError"></div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary">Submit Appointment Request</button>
                        </div>
                    </div>
                </div>

                <!-- Established Patient Success Step -->
                <div id="establishedSuccessStep" style="display: none;">
                    <div class="form-card success-card">
                        <div class="success-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                                <path d="M8 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h2 class="form-section-title success-title">Appointment Request Submitted Successfully!</h2>
                        <p class="success-message">You will receive a confirmation email and SMS shortly.</p>
                        <div class="success-actions">
                            <button type="button" class="btn-primary" onclick="resetForm()">Book Another Appointment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Appointment Booking Styles */
.appointment-booking {
    padding: 3rem 0 5rem;
    background-color: #f0f2f5;
    min-height: calc(100vh - 200px);
}

.booking-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.booking-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
    letter-spacing: -0.02em;
}

.booking-subtitle {
    font-size: 1.125rem;
    color: var(--text-gray);
}

.patient-type-tabs {
    display: flex;
    justify-content: center;
    gap: 0;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.tab-btn {
    flex: 1;
    padding: 1rem 2rem;
    border: none;
    background-color: #86efac;
    color: var(--text-dark);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 0;
}

.tab-btn:first-child {
    border-radius: 8px 0 0 8px;
}

.tab-btn:last-child {
    border-radius: 0 8px 8px 0;
}

.tab-btn.active {
    background-color: var(--bg-white);
    color: var(--text-dark);
    border: 2px solid #86efac;
    border-bottom: 3px solid var(--primary-teal);
}

.tab-btn:hover:not(.active) {
    background-color: #a7f3d0;
}

.booking-form-container {
    max-width: 800px;
    margin: 0 auto;
}

.form-card {
    background-color: var(--bg-white);
    padding: 2.5rem;
    border-radius: 0 0 12px 12px;
    box-shadow: var(--shadow-md);
    margin-top: 0;
}

.form-step[data-step="0"] .form-card {
    border-radius: 0 0 12px 12px;
}

.form-step {
    display: none;
}

.form-step.active {
    display: block;
}

/* Progress Indicator */
.progress-indicator {
    background-color: var(--bg-white);
    padding: 1.5rem 2.5rem;
    border-radius: 12px 12px 0 0;
    box-shadow: var(--shadow-md);
    margin-bottom: 0;
}

.progress-bar {
    width: 100%;
    height: 4px;
    background-color: var(--border-color);
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 1rem;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #2d7bc5 0%, var(--primary-teal) 100%);
    transition: width 0.3s ease;
    width: 0%;
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    font-size: 0.75rem;
    color: var(--text-gray);
}

.progress-step {
    flex: 1;
    text-align: center;
    padding: 0 0.5rem;
    position: relative;
}

.progress-step.active {
    color: var(--primary-teal-dark);
    font-weight: 600;
}

.form-section-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.form-section-subtitle {
    font-size: 1rem;
    color: var(--text-gray);
    margin-bottom: 2rem;
}

.form-section-divider {
    margin: 2rem 0 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--border-color);
}

.form-subsection-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.form-instruction {
    font-size: 0.9375rem;
    color: var(--text-gray);
    margin-bottom: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.form-label {
    display: block;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.form-input,
.form-select,
.form-textarea {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    font-family: inherit;
    transition: all 0.3s ease;
    background-color: var(--bg-white);
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary-teal);
    box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 100px;
}

.radio-group {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.radio-group.vertical {
    flex-direction: column;
    gap: 1rem;
}

.radio-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    font-size: 1rem;
    color: var(--text-dark);
}

.radio-label input[type="radio"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
    accent-color: var(--primary-teal);
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    font-size: 1rem;
    color: var(--text-dark);
    font-weight: 500;
}

.checkbox-label input[type="checkbox"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
    accent-color: var(--primary-teal);
}

.form-help-text {
    font-size: 0.875rem;
    color: var(--text-gray);
    margin-top: 0.5rem;
    margin-left: 1.75rem;
}

.form-sub-question {
    font-size: 0.9375rem;
    color: var(--text-gray);
    margin-bottom: 0.75rem;
    font-style: italic;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid var(--border-color);
}

.error-message {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    display: none;
}

.error-message.show {
    display: block;
}

.otp-section {
    margin-top: 1.5rem;
}

.otp-info {
    font-size: 0.875rem;
    color: var(--text-gray);
    margin-top: 0.5rem;
}

@media (max-width: 768px) {
    .booking-title {
        font-size: 2rem;
    }
    
    .form-card {
        padding: 1.5rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .radio-group {
        flex-direction: column;
        gap: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .form-actions button {
        width: 100%;
    }
}

/* Success Step Styles */
.success-card {
    text-align: center;
    padding: 3rem 2.5rem;
}

.success-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 2rem;
    color: var(--primary-teal);
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(20, 184, 166, 0.1);
    border-radius: 50%;
}

.success-title {
    color: var(--primary-teal-dark);
    margin-bottom: 1rem;
}

.success-message {
    font-size: 1.125rem;
    color: var(--text-gray);
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

.success-actions {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.success-actions .btn-primary {
    min-width: 200px;
}

@media (max-width: 768px) {
    .success-card {
        padding: 2rem 1.5rem;
    }
    
    .success-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 1.5rem;
    }
    
    .success-icon svg {
        width: 40px;
        height: 40px;
    }
    
    .success-title {
        font-size: 1.5rem;
    }
    
    .success-message {
        font-size: 1rem;
    }
}
</style>

<script src="assets/js/appointment-booking.js"></script>

<?php include 'includes/footer.php'; ?>

