<style>
.feature-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 4rem 0;
}

.feature-detail {
    padding: 3rem 0;
}

.feature-card {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 2rem;
    margin-bottom: 2rem;
    border-left: 4px solid #667eea;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 2.5rem;
    color: #667eea;
    margin-bottom: 1rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    border-left: 3px solid #28a745;
}

.benefit-item i {
    color: #28a745;
    margin-right: 1rem;
    font-size: 1.2rem;
}

.screenshot-placeholder {
    background: #e9ecef;
    border: 2px dashed #6c757d;
    border-radius: 8px;
    padding: 3rem;
    text-align: center;
    margin: 2rem 0;
}

.cta-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
}
</style>

<!-- Feature Hero Section -->
<section class="feature-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">
                    <i class="fas fa-cash-register me-3"></i>
                    Sales & Billing
                </h1>
                <p class="lead">Complete POS invoicing, billing, and payment management system designed for modern retail operations. Handle all your sales transactions efficiently with our intuitive interface.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo base_url('demo'); ?>" class="btn btn-light btn-lg me-3">Try Demo</a>
                <a href="<?php echo base_url('contact'); ?>" class="btn btn-outline-light btn-lg">Get Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- Feature Details Section -->
<section class="feature-detail">
    <div class="container">
        
        <!-- Key Features Grid -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Key Sales & Billing Features</h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-hand-pointer"></i>
                    </div>
                    <h5>Quick POS Invoicing</h5>
                    <p>Lightning-fast billing with touch-screen compatibility. Create invoices in seconds with our intuitive interface designed for busy retail environments.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Touch-screen optimized</li>
                        <li><i class="fas fa-check text-success me-2"></i>Keyboard shortcuts</li>
                        <li><i class="fas fa-check text-success me-2"></i>Auto-complete product search</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5>Multi-Type Billing</h5>
                    <p>Handle walk-in customers, registered customers, and wholesale transactions with different pricing tiers and billing formats.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Walk-in customer billing</li>
                        <li><i class="fas fa-check text-success me-2"></i>Registered customer accounts</li>
                        <li><i class="fas fa-check text-success me-2"></i>Wholesale pricing tiers</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-pause"></i>
                    </div>
                    <h5>Hold/Recall Bills</h5>
                    <p>Park incomplete sales and recall them later. Perfect for busy stores where customers need time to decide or add more items.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Hold multiple bills</li>
                        <li><i class="fas fa-check text-success me-2"></i>Quick recall system</li>
                        <li><i class="fas fa-check text-success me-2"></i>Customer-specific holds</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h5>Split Bills & Payments</h5>
                    <p>Split single bills across multiple customers or payment methods. Accept cash, card, UPI, and other payment modes in one transaction.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Split by customer</li>
                        <li><i class="fas fa-check text-success me-2"></i>Multiple payment modes</li>
                        <li><i class="fas fa-check text-success me-2"></i>Partial payment tracking</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <h5>Customizable Receipts</h5>
                    <p>Professional receipts with your logo, terms, and custom footer messages. Multiple receipt formats for different business needs.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Add company logo</li>
                        <li><i class="fas fa-check text-success me-2"></i>Custom terms & conditions</li>
                        <li><i class="fas fa-check text-success me-2"></i>Multiple receipt formats</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h5>Discount Management</h5>
                    <p>Apply discounts at item level or overall bill. Set up promotional offers, customer-specific discounts, and time-based sales.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Item-wise discounts</li>
                        <li><i class="fas fa-check text-success me-2"></i>Overall bill discounts</li>
                        <li><i class="fas fa-check text-success me-2"></i>Promotional campaigns</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h5>Sales Returns & Refunds</h5>
                    <p>Handle returns and refunds efficiently with proper documentation and inventory adjustments. Track return reasons and patterns.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Full & partial returns</li>
                        <li><i class="fas fa-check text-success me-2"></i>Return reason tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Automatic inventory adjustment</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Benefits Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Why Choose Our Sales & Billing System?</h2>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h6>Faster Checkout</h6>
                        <p class="mb-0">Reduce checkout time by up to 50% with our optimized interface</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-chart-line"></i>
                    <div>
                        <h6>Increased Sales</h6>
                        <p class="mb-0">Boost sales with quick upselling and cross-selling features</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h6>Error Prevention</h6>
                        <p class="mb-0">Built-in validation prevents billing errors and inventory mistakes</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-mobile-alt"></i>
                    <div>
                        <h6>Mobile Ready</h6>
                        <p class="mb-0">Works perfectly on tablets and touch devices</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-users"></i>
                    <div>
                        <h6>Easy Training</h6>
                        <p class="mb-0">Intuitive interface requires minimal staff training</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-sync"></i>
                    <div>
                        <h6>Real-time Updates</h6>
                        <p class="mb-0">Instant inventory and sales updates across all locations</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Screenshots Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">See It In Action</h2>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>POS Interface</h5>
                    <p>Quick billing screen with product search</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Payment Screen</h5>
                    <p>Multiple payment options and split payments</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Receipt Preview</h5>
                    <p>Customizable receipt with logo and terms</p>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="row">
            <div class="col-12">
                <div class="cta-section">
                    <h3>Ready to Streamline Your Sales Process?</h3>
                    <p class="lead">Experience the power of efficient billing and sales management</p>
                    <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-lg me-3">Try Free Demo</a>
                    <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-primary btn-lg">View Pricing</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
