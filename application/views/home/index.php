<!-- Hero Section -->
<section class="hero-section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Smart Billing & Inventory Software</h1>
                <p class="lead mb-4">Powerful inventory and billing solution for distribution and retail businesses. Streamline your operations with GST billing, barcode scanning, and multi-location support.</p>
                <div class="hero-buttons">
                    <a href="<?php echo base_url('demo'); ?>" class="btn btn-light btn-lg me-3">Try Live Demo</a>
                    <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-light btn-lg">View Pricing</a>
                </div>
                <div class="hero-stats mt-4">
                    <div class="row">
                        <div class="col-4">
                            <div class="stat-item">
                                <h3 class="mb-0">500+</h3>
                                <small>Happy Customers</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <h3 class="mb-0">99.9%</h3>
                                <small>Uptime</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <h3 class="mb-0">24/7</h3>
                                <small>Support</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="<?php echo base_url('assets/images/trulypos-dashboard.png'); ?>" alt="Truly POS Dashboard" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">Why Choose Truly POS?</h2>
                <p class="lead">Complete solution for modern retail and distribution businesses</p>
            </div>
        </div>
        <div class="row">
            <?php if(isset($features) && !empty($features)): ?>
                <?php foreach($features as $feature): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <div class="feature-icon">
                                <i class="<?php echo $feature->icon; ?>"></i>
                            </div>
                            <h5><?php echo $feature->title; ?></h5>
                            <p><?php echo $feature->description; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default features if none in database -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <h5>Inventory Management</h5>
                        <p>Complete inventory control with stock tracking, alerts, and automated reorder points</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <h5>GST Billing</h5>
                        <p>GST compliant billing with automatic tax calculations and invoice generation</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <h5>Barcode Scanning</h5>
                        <p>Fast checkout with barcode scanning and label printing capabilities</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5>Reports & Analytics</h5>
                        <p>Comprehensive reporting with sales analytics and business insights</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h5>Multi-Location</h5>
                        <p>Manage multiple stores and warehouses from a single dashboard</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5>Mobile App</h5>
                        <p>Android app for on-the-go inventory management and sales tracking</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo base_url('features'); ?>" class="btn btn-primary btn-lg">View All Features</a>
        </div>
    </div>
</section>

<!-- Demo Section -->
<section class="demo-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4">See Truly POS in Action</h2>
                <p class="lead mb-4">Experience the power of our software with a live demo. Try all features with sample data.</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i> Full access to all features</li>
                    <li><i class="fas fa-check text-success me-2"></i> Sample data included</li>
                    <li><i class="fas fa-check text-success me-2"></i> Admin and staff credentials</li>
                    <li><i class="fas fa-check text-success me-2"></i> No registration required</li>
                </ul>
                <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-lg">Launch Demo</a>
            </div>
            <div class="col-lg-6">
                <div class="demo-video">
                    <img src="<?php echo base_url('assets/images/demo-preview.png'); ?>" alt="Demo Preview" class="img-fluid rounded shadow">
                    <a href="#" class="play-button" data-bs-toggle="modal" data-bs-target="#demoModal">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">What Our Customers Say</h2>
                <p class="lead">Join hundreds of satisfied distributors and retailers</p>
            </div>
        </div>
        <div class="row">
            <?php if(isset($testimonials) && !empty($testimonials)): ?>
                <?php foreach($testimonials as $testimonial): ?>
                    <div class="col-lg-4 mb-4">
                        <div class="testimonial-card h-100">
                            <div class="testimonial-content">
                                <div class="rating mb-3">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?php echo $i <= $testimonial->rating ? 'text-warning' : 'text-muted'; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <p>"<?php echo $testimonial->message; ?>"</p>
                            </div>
                            <div class="testimonial-author">
                                <img src="<?php echo base_url('assets/images/testimonials/' . $testimonial->image); ?>" alt="<?php echo $testimonial->name; ?>" class="author-avatar">
                                <div>
                                    <h6 class="mb-0"><?php echo $testimonial->name; ?></h6>
                                    <small class="text-muted"><?php echo $testimonial->company; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default testimonials if none in database -->
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p>"Truly POS has revolutionized our business operations. The inventory management is excellent and the GST billing feature saves us hours of work."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="<?php echo base_url('assets/images/testimonials/user1.jpg'); ?>" alt="Rajesh Kumar" class="author-avatar">
                            <div>
                                <h6 class="mb-0">Rajesh Kumar</h6>
                                <small class="text-muted">ABC Electronics</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p>"Best POS software for retail business. Easy to use, powerful features, and excellent customer support. Highly recommended!"</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="<?php echo base_url('assets/images/testimonials/user2.jpg'); ?>" alt="Priya Sharma" class="author-avatar">
                            <div>
                                <h6 class="mb-0">Priya Sharma</h6>
                                <small class="text-muted">Fashion Hub</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p>"The multi-location feature is perfect for our chain of stores. We can manage everything from one place. Great software!"</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="<?php echo base_url('assets/images/testimonials/user3.jpg'); ?>" alt="Amit Patel" class="author-avatar">
                            <div>
                                <h6 class="mb-0">Amit Patel</h6>
                                <small class="text-muted">Patel Distributors</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo base_url('testimonials'); ?>" class="btn btn-outline-primary">View All Testimonials</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="display-6 fw-bold mb-3">Ready to Transform Your Business?</h2>
                <p class="lead mb-0">Join thousands of businesses already using Truly POS to streamline their operations</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo base_url('pricing'); ?>" class="btn btn-light btn-lg">Get Started Today</a>
            </div>
        </div>
    </div>
</section>

<!-- Demo Modal -->
<div class="modal fade" id="demoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Truly POS Demo Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/YOUR_VIDEO_ID" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
