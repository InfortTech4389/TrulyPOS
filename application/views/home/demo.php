<!-- Demo Section -->
<section class="demo-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h1 class="display-4 fw-bold">Experience TrulyPOS</h1>
                <p class="lead">Try our software with real-time demo featuring sample data</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="demo-container">
                    <div class="demo-header">
                        <h3>Live Demo</h3>
                        <p>Full functionality with sample data</p>
                    </div>
                    
                    <div class="demo-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="demo-card">
                                    <div class="demo-icon">
                                        <i class="fas fa-desktop"></i>
                                    </div>
                                    <h4>Admin Dashboard</h4>
                                    <p>Complete overview of your business with real-time analytics</p>
                                    <a href="#" class="btn btn-primary demo-btn" data-demo="admin">Launch Demo</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="demo-card">
                                    <div class="demo-icon">
                                        <i class="fas fa-cash-register"></i>
                                    </div>
                                    <h4>POS Terminal</h4>
                                    <p>Experience the billing process with sample products</p>
                                    <a href="#" class="btn btn-primary demo-btn" data-demo="pos">Launch Demo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Demo Features -->
<section class="demo-features py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">What You Can Try</h2>
                <p class="lead">Explore all the features with our interactive demo</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="demo-feature">
                    <div class="demo-feature-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Complete Sales Process</h4>
                    <p>Add products, apply discounts, process payments, and print receipts</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="demo-feature">
                    <div class="demo-feature-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h4>Inventory Management</h4>
                    <p>Manage products, track stock levels, and handle suppliers</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="demo-feature">
                    <div class="demo-feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h4>Reports & Analytics</h4>
                    <p>View sales reports, inventory reports, and business analytics</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="demo-feature">
                    <div class="demo-feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Customer Management</h4>
                    <p>Manage customer profiles, loyalty programs, and purchase history</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="demo-feature">
                    <div class="demo-feature-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <h4>GST Billing</h4>
                    <p>Generate GST compliant invoices and manage tax calculations</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="demo-feature">
                    <div class="demo-feature-icon">
                        <i class="fas fa-barcode"></i>
                    </div>
                    <h4>Barcode Scanning</h4>
                    <p>Experience fast product scanning and inventory management</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Demo Modal -->
<div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">TrulyPOS Demo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="demo-loading text-center py-5">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Loading demo...</p>
                </div>
                <iframe id="demoFrame" src="" width="100%" height="600" frameborder="0" style="display: none;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo base_url('buy'); ?>" class="btn btn-primary">Buy Now</a>
            </div>
        </div>
    </div>
</div>

<!-- Request Demo Section -->
<section class="request-demo-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="request-demo-card">
                    <h2 class="text-center mb-4">Request Personal Demo</h2>
                    <p class="text-center text-muted mb-4">Schedule a personalized demo session with our experts</p>
                    
                    <form id="requestDemoForm" class="demo-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="business_type" class="form-label">Business Type</label>
                            <select class="form-select" id="business_type" name="business_type" required>
                                <option value="">Select Business Type</option>
                                <option value="retail">Retail Store</option>
                                <option value="restaurant">Restaurant/Cafe</option>
                                <option value="pharmacy">Pharmacy</option>
                                <option value="supermarket">Supermarket</option>
                                <option value="grocery">Grocery Store</option>
                                <option value="fashion">Fashion Store</option>
                                <option value="electronics">Electronics Store</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="preferred_time" class="form-label">Preferred Demo Time</label>
                            <select class="form-select" id="preferred_time" name="preferred_time" required>
                                <option value="">Select Time</option>
                                <option value="morning">Morning (9 AM - 12 PM)</option>
                                <option value="afternoon">Afternoon (12 PM - 5 PM)</option>
                                <option value="evening">Evening (5 PM - 8 PM)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="requirements" class="form-label">Specific Requirements</label>
                            <textarea class="form-control" id="requirements" name="requirements" rows="3" placeholder="Tell us about your specific needs or questions..."></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">Request Demo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Customer Success Stories -->
<section class="success-stories py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">Customer Success Stories</h2>
                <p class="lead">See how businesses are thriving with TrulyPOS</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="success-story">
                    <div class="success-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h4>Fashion Hub</h4>
                    <p>"TrulyPOS helped us manage our inventory across 3 stores seamlessly. Sales increased by 30% after implementation."</p>
                    <div class="success-metrics">
                        <span class="metric">+30% Sales</span>
                        <span class="metric">3 Stores</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="success-story">
                    <div class="success-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h4>Cafe Delight</h4>
                    <p>"The barcode scanning feature saved us hours of manual work. Our billing process is now 50% faster."</p>
                    <div class="success-metrics">
                        <span class="metric">50% Faster</span>
                        <span class="metric">2 Locations</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="success-story">
                    <div class="success-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h4>Super Mart</h4>
                    <p>"GST compliance made easy! We generate accurate reports and never miss tax deadlines anymore."</p>
                    <div class="success-metrics">
                        <span class="metric">100% Compliance</span>
                        <span class="metric">5 Stores</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Demo buttons
    const demoBtns = document.querySelectorAll('.demo-btn');
    const demoModal = new bootstrap.Modal(document.getElementById('demoModal'));
    const demoFrame = document.getElementById('demoFrame');
    const demoLoading = document.querySelector('.demo-loading');
    
    demoBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const demoType = this.getAttribute('data-demo');
            
            // Show modal
            demoModal.show();
            
            // Set demo URL based on type
            let demoUrl = '';
            if (demoType === 'admin') {
                demoUrl = 'https://demo.trulypos.com/admin';
            } else if (demoType === 'pos') {
                demoUrl = 'https://demo.trulypos.com/pos';
            }
            
            // Load demo in iframe
            demoFrame.src = demoUrl;
            
            // Hide loading after 3 seconds
            setTimeout(() => {
                demoLoading.style.display = 'none';
                demoFrame.style.display = 'block';
            }, 3000);
        });
    });
    
    // Request demo form
    const requestDemoForm = document.getElementById('requestDemoForm');
    requestDemoForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        // Simulate form submission
        setTimeout(() => {
            alert('Demo request submitted successfully! Our team will contact you within 24 hours.');
            this.reset();
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });
    
    // Reset modal when closed
    document.getElementById('demoModal').addEventListener('hidden.bs.modal', function() {
        demoFrame.src = '';
        demoLoading.style.display = 'block';
        demoFrame.style.display = 'none';
    });
});
</script>
