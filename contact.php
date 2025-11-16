<?php
$pageTitle = "Contact Us - PsychwebMD";
include 'includes/header.php';
?>

<!-- Contact Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, #e0f2f1 0%, #b2f5ea 100%);">
    <div class="container">
        <div class="hero-content" style="grid-template-columns: 1fr; text-align: center;">
            <div class="hero-text">
                <h1 class="hero-title">Get in Touch</h1>
                <p class="hero-description" style="font-size: 1.25rem; max-width: 800px; margin: 0 auto;">
                    Have questions? We're here to help. Reach out to us and our team will get back to you as soon as possible.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="services" style="background-color: var(--bg-white); padding: 6rem 0;">
    <div class="container">
        <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
            <div style="background-color: #d1fae5; border: 2px solid #10b981; border-radius: 10px; padding: 1.25rem; margin-bottom: 2rem; color: #065f46; font-weight: 500;">
                ✓ Thank you for your message! We'll get back to you within 24 hours.
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div style="background-color: #fee2e2; border: 2px solid #ef4444; border-radius: 10px; padding: 1.25rem; margin-bottom: 2rem; color: #991b1b; font-weight: 500;">
                ✗ Error: <?php echo htmlspecialchars(urldecode($_GET['error'])); ?>
            </div>
        <?php endif; ?>
        <div class="hero-content" style="grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
            <!-- Contact Form -->
            <div class="hero-text">
                <h2 class="section-title" style="text-align: left; font-size: 2.5rem; margin-bottom: 1.5rem;">Send us a Message</h2>
                <p class="hero-description" style="font-size: 1rem; margin-bottom: 2rem; color: var(--text-gray);">
                    Fill out the form below and we'll respond within 24 hours. For urgent matters, please call us directly.
                </p>
                <form class="contact-form" action="contact-handler.php" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="name" style="font-weight: 600; color: var(--text-dark); font-size: 0.9375rem;">Full Name *</label>
                        <input type="text" id="name" name="name" required 
                               style="padding: 1rem 1.25rem; border: 2px solid var(--border-color); border-radius: 10px; font-size: 1rem; outline: none; transition: all 0.3s ease; background-color: var(--bg-white); font-family: 'Poppins', sans-serif;"
                               onfocus="this.style.borderColor='var(--primary-teal)'; this.style.boxShadow='0 0 0 3px rgba(20, 184, 166, 0.1)'"
                               onblur="this.style.borderColor='var(--border-color)'; this.style.boxShadow='none'">
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="email" style="font-weight: 600; color: var(--text-dark); font-size: 0.9375rem;">Email Address *</label>
                        <input type="email" id="email" name="email" required 
                               style="padding: 1rem 1.25rem; border: 2px solid var(--border-color); border-radius: 10px; font-size: 1rem; outline: none; transition: all 0.3s ease; background-color: var(--bg-white); font-family: 'Poppins', sans-serif;"
                               onfocus="this.style.borderColor='var(--primary-teal)'; this.style.boxShadow='0 0 0 3px rgba(20, 184, 166, 0.1)'"
                               onblur="this.style.borderColor='var(--border-color)'; this.style.boxShadow='none'">
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="phone" style="font-weight: 600; color: var(--text-dark); font-size: 0.9375rem;">Phone Number</label>
                        <input type="tel" id="phone" name="phone" 
                               style="padding: 1rem 1.25rem; border: 2px solid var(--border-color); border-radius: 10px; font-size: 1rem; outline: none; transition: all 0.3s ease; background-color: var(--bg-white); font-family: 'Poppins', sans-serif;"
                               onfocus="this.style.borderColor='var(--primary-teal)'; this.style.boxShadow='0 0 0 3px rgba(20, 184, 166, 0.1)'"
                               onblur="this.style.borderColor='var(--border-color)'; this.style.boxShadow='none'">
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="subject" style="font-weight: 600; color: var(--text-dark); font-size: 0.9375rem;">Subject *</label>
                        <select id="subject" name="subject" required 
                                style="padding: 1rem 1.25rem; border: 2px solid var(--border-color); border-radius: 10px; font-size: 1rem; outline: none; transition: all 0.3s ease; background-color: var(--bg-white); font-family: 'Poppins', sans-serif; cursor: pointer;"
                                onfocus="this.style.borderColor='var(--primary-teal)'; this.style.boxShadow='0 0 0 3px rgba(20, 184, 166, 0.1)'"
                                onblur="this.style.borderColor='var(--border-color)'; this.style.boxShadow='none'">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="appointment">Schedule Appointment</option>
                            <option value="insurance">Insurance Questions</option>
                            <option value="technical">Technical Support</option>
                            <option value="provider">Provider Information</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="message" style="font-weight: 600; color: var(--text-dark); font-size: 0.9375rem;">Message *</label>
                        <textarea id="message" name="message" rows="6" required 
                                  style="padding: 1rem 1.25rem; border: 2px solid var(--border-color); border-radius: 10px; font-size: 1rem; outline: none; transition: all 0.3s ease; background-color: var(--bg-white); font-family: 'Poppins', sans-serif; resize: vertical;"
                                  onfocus="this.style.borderColor='var(--primary-teal)'; this.style.boxShadow='0 0 0 3px rgba(20, 184, 166, 0.1)'"
                                  onblur="this.style.borderColor='var(--border-color)'; this.style.boxShadow='none'"></textarea>
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; padding: 1rem; font-size: 1.0625rem; margin-top: 0.5rem;">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="hero-text">
                <h2 class="section-title" style="text-align: left; font-size: 2.5rem; margin-bottom: 1.5rem;">Contact Information</h2>
                <p class="hero-description" style="font-size: 1rem; margin-bottom: 2.5rem; color: var(--text-gray);">
                    Reach out to us through any of the following channels. We're available to assist you Monday through Friday, 8 AM to 8 PM EST.
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 2rem;">
                    <!-- Phone -->
                    <div class="service-card" style="padding: 2rem; margin: 0;">
                        <div class="service-icon" style="margin-bottom: 1rem;">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3 class="service-title" style="margin-bottom: 0.5rem;">Phone</h3>
                        <p class="service-description" style="margin: 0;">
                            <a href="tel:+18005551234" style="color: var(--primary-teal-dark); text-decoration: none; font-weight: 600;">1-800-555-1234</a><br>
                            <span style="color: var(--text-light); font-size: 0.9375rem;">Available 24/7 for emergencies</span>
                        </p>
                    </div>
                    
                    <!-- Email -->
                    <div class="service-card" style="padding: 2rem; margin: 0;">
                        <div class="service-icon" style="margin-bottom: 1rem;">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3 class="service-title" style="margin-bottom: 0.5rem;">Email</h3>
                        <p class="service-description" style="margin: 0;">
                            <a href="mailto:info@psychwebmd.com" style="color: var(--primary-teal-dark); text-decoration: none; font-weight: 600;">info@psychwebmd.com</a><br>
                            <span style="color: var(--text-light); font-size: 0.9375rem;">We respond within 24 hours</span>
                        </p>
                    </div>
                    
                    <!-- Address -->
                    <div class="service-card" style="padding: 2rem; margin: 0;">
                        <div class="service-icon" style="margin-bottom: 1rem;">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3 class="service-title" style="margin-bottom: 0.5rem;">Office Address</h3>
                        <p class="service-description" style="margin: 0;">
                            123 Healthcare Boulevard<br>
                            Suite 500<br>
                            New York, NY 10001<br>
                            <span style="color: var(--text-light); font-size: 0.9375rem;">United States</span>
                        </p>
                    </div>
                    
                    <!-- Hours -->
                    <div class="service-card" style="padding: 2rem; margin: 0;">
                        <div class="service-icon" style="margin-bottom: 1rem;">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3 class="service-title" style="margin-bottom: 0.5rem;">Business Hours</h3>
                        <p class="service-description" style="margin: 0;">
                            Monday - Friday: 8:00 AM - 8:00 PM EST<br>
                            Saturday: 9:00 AM - 5:00 PM EST<br>
                            Sunday: Closed<br>
                            <span style="color: var(--text-light); font-size: 0.9375rem;">Emergency support available 24/7</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Contact Options -->
<section class="why-psychwebmd" style="background-color: var(--bg-light);">
    <div class="container">
        <h2 class="section-title">Other Ways to Reach Us</h2>
        <p class="section-subtitle">Choose the communication method that works best for you.</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="feature-title">Live Chat</h3>
                <p class="feature-description">Chat with our support team in real-time through our secure platform. Available during business hours.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="feature-title">Patient Portal</h3>
                <p class="feature-description">Access your account, schedule appointments, and message your provider directly through our patient portal.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="feature-title">Social Media</h3>
                <p class="feature-description">Follow us on social media for updates, mental health tips, and community support resources.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="feature-title">Emergency Support</h3>
                <p class="feature-description">For mental health emergencies, call 911 or the National Suicide Prevention Lifeline at 988.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

