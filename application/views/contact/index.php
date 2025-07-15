<!-- Contact Us Page -->
<div class="contact-page">
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">Contact Us</h1>
                    <p class="lead mb-0">Get in touch with our team. We're here to help you succeed with TrulyPOS.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <?= $this->session->flashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <?= $this->session->flashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow-sm">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-3">Send Us a Message</h2>
                                <p class="text-muted">Fill out the form below and we'll get back to you as soon as possible.</p>
                            </div>

                            <?= form_open('contact/submit', ['id' => 'contactForm']) ?>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>

                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="company" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company" name="company">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <select class="form-select" id="subject" name="subject" required>
                                        <option value="">Select a subject</option>
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="Sales Question">Sales Question</option>
                                        <option value="Technical Support">Technical Support</option>
                                        <option value="Demo Request">Demo Request</option>
                                        <option value="Partnership">Partnership</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                                </div>

                                <div class="mt-4">
                                    <div class="recaptcha-container">
                                        <?= $this->recaptcha->get_widget() ?>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Send Message
                                    </button>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold mb-3">Get in Touch</h2>
                        <p class="text-muted">We're here to help you succeed with TrulyPOS</p>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="contact-info-card text-center h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-phone-alt fa-2x text-primary"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Phone Support</h5>
                                <p class="text-muted mb-2">Monday to Friday, 9 AM - 6 PM</p>
                                <p class="fw-bold text-primary">+91 9876543210</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="contact-info-card text-center h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-envelope fa-2x text-primary"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Email Support</h5>
                                <p class="text-muted mb-2">We'll respond within 24 hours</p>
                                <p class="fw-bold text-primary">support@trulypos.com</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="contact-info-card text-center h-100">
                                <div class="icon-wrapper mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Office Address</h5>
                                <p class="text-muted mb-2">Visit us at our office</p>
                                <p class="fw-bold text-primary">Mumbai, Maharashtra</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                        <p class="text-muted">Find answers to common questions</p>
                    </div>

                    <div class="accordion" id="contactFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                                    How quickly do you respond to support requests?
                                </button>
                            </h2>
                            <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We respond to all support requests within 24 hours during business days. For urgent issues, please call our phone support line.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                                    Do you offer phone support?
                                </button>
                            </h2>
                            <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes, we offer phone support Monday to Friday, 9 AM - 6 PM IST. Premium plan customers get priority phone support.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                    Can I schedule a demo?
                                </button>
                            </h2>
                            <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Absolutely! You can <a href="<?= base_url('contact/demo') ?>">request a demo</a> and our team will schedule a personalized demonstration of TrulyPOS for your business.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- reCAPTCHA Script -->
<?= $this->recaptcha->get_script_tag() ?>
<?= $this->recaptcha->get_validation_js('contactForm') ?>

<style>
.contact-page .hero-section {
    background: linear-gradient(135deg, #007bff, #6610f2);
}

.contact-info-card {
    background: white;
    padding: 30px 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.contact-info-card:hover {
    transform: translateY(-5px);
}

.icon-wrapper {
    display: inline-block;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #007bff, #6610f2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.icon-wrapper i {
    color: white;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0056b3, #004085);
}

.recaptcha-container {
    display: flex;
    justify-content: center;
}

@media (max-width: 768px) {
    .contact-info-card {
        margin-bottom: 20px;
    }
}
</style>
