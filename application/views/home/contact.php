<!-- Contact Section -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h1 class="display-4 fw-bold">Contact Us</h1>
                <p class="lead">Get in touch with our team for any questions or support</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-form-container">
                    <h3 class="mb-4">Send us a Message</h3>
                    
                    <?php if(isset($success_message)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $success_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($error_message)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $error_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form id="contactForm" action="<?php echo base_url('contact'); ?>" method="POST" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required value="<?php echo set_value('name'); ?>">
                                <?php if(form_error('name')): ?>
                                    <div class="text-danger mt-1"><?php echo form_error('name'); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required value="<?php echo set_value('email'); ?>">
                                <?php if(form_error('email')): ?>
                                    <div class="text-danger mt-1"><?php echo form_error('email'); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required value="<?php echo set_value('phone'); ?>">
                                <?php if(form_error('phone')): ?>
                                    <div class="text-danger mt-1"><?php echo form_error('phone'); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company" name="company" value="<?php echo set_value('company'); ?>">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Select Subject</option>
                                <option value="general_inquiry" <?php echo set_select('subject', 'general_inquiry'); ?>>General Inquiry</option>
                                <option value="demo_request" <?php echo set_select('subject', 'demo_request'); ?>>Demo Request</option>
                                <option value="pricing_info" <?php echo set_select('subject', 'pricing_info'); ?>>Pricing Information</option>
                                <option value="technical_support" <?php echo set_select('subject', 'technical_support'); ?>>Technical Support</option>
                                <option value="feature_request" <?php echo set_select('subject', 'feature_request'); ?>>Feature Request</option>
                                <option value="partnership" <?php echo set_select('subject', 'partnership'); ?>>Partnership</option>
                                <option value="other" <?php echo set_select('subject', 'other'); ?>>Other</option>
                            </select>
                            <?php if(form_error('subject')): ?>
                                <div class="text-danger mt-1"><?php echo form_error('subject'); ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Tell us about your requirements or questions..."><?php echo set_value('message'); ?></textarea>
                            <?php if(form_error('message')): ?>
                                <div class="text-danger mt-1"><?php echo form_error('message'); ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" value="1" <?php echo set_checkbox('newsletter', '1'); ?>>
                                <label class="form-check-label" for="newsletter">
                                    Subscribe to our newsletter for updates and offers
                                </label>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="mb-4">Get in Touch</h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Address</h5>
                            <p>123 Business Street<br>
                            Tech City, TC 12345<br>
                            India</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Phone</h5>
                            <p>+91 12345 67890<br>
                            +91 98765 43210</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Email</h5>
                            <p>info@trulypos.com<br>
                            support@trulypos.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Business Hours</h5>
                            <p>Monday - Friday: 9:00 AM - 6:00 PM<br>
                            Saturday: 10:00 AM - 4:00 PM<br>
                            Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links mt-4">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center mb-4">Find Us</h2>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.6640131648177!2d72.82872531418!3d19.107261887050907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9c676019b49%3A0x8b7f8b4a4b8b8b8b!2sBusiness%20Street%2C%20Mumbai%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sin!4v1635789012345!5m2!1sen!2sin" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
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
                <h2 class="text-center mb-5">Frequently Asked Questions</h2>
                
                <div class="faq-item">
                    <button class="faq-question">How quickly can I get a response?</button>
                    <div class="faq-answer">
                        <p>We typically respond to all inquiries within 24 hours during business days. For urgent technical support, we aim to respond within 4 hours.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">Do you offer phone support?</button>
                    <div class="faq-answer">
                        <p>Yes, we offer phone support for all our customers. Enterprise customers get 24/7 phone support, while other plans have phone support during business hours.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">Can I schedule a demo?</button>
                    <div class="faq-answer">
                        <p>Absolutely! You can request a personalized demo by filling out our contact form or calling us directly. We'll schedule a convenient time for you.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">Do you provide training?</button>
                    <div class="faq-answer">
                        <p>Yes, we provide comprehensive training for all our customers. This includes video tutorials, documentation, and live training sessions if needed.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">What is your refund policy?</button>
                    <div class="faq-answer">
                        <p>We offer a 30-day money-back guarantee. If you're not satisfied with our software, you can request a full refund within 30 days of purchase.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value.trim();
        
        let isValid = true;
        let errorMessage = '';
        
        // Basic validation
        if (!name) {
            isValid = false;
            errorMessage += 'Name is required.\n';
        }
        
        if (!email) {
            isValid = false;
            errorMessage += 'Email is required.\n';
        } else if (!isValidEmail(email)) {
            isValid = false;
            errorMessage += 'Please enter a valid email address.\n';
        }
        
        if (!phone) {
            isValid = false;
            errorMessage += 'Phone number is required.\n';
        }
        
        if (!subject) {
            isValid = false;
            errorMessage += 'Subject is required.\n';
        }
        
        if (!message) {
            isValid = false;
            errorMessage += 'Message is required.\n';
        }
        
        if (!isValid) {
            e.preventDefault();
            alert(errorMessage);
        } else {
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
        }
    });
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // FAQ functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isOpen = answer.style.display === 'block';
            
            // Close all other answers
            document.querySelectorAll('.faq-answer').forEach(ans => {
                ans.style.display = 'none';
            });
            
            // Toggle current answer
            answer.style.display = isOpen ? 'none' : 'block';
        });
    });
});
</script>
