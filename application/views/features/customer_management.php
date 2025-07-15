<style>
.feature-hero {
    background: linear-gradient(135deg, #e83e8c 0%, #d63384 100%);
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
    border-left: 4px solid #e83e8c;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 2.5rem;
    color: #e83e8c;
    margin-bottom: 1rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    border-left: 3px solid #6f42c1;
}

.benefit-item i {
    color: #6f42c1;
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
                    <i class="fas fa-users me-3"></i>
                    Customer Management & CRM
                </h1>
                <p class="lead">Build stronger customer relationships with comprehensive customer database, credit management, loyalty programs, and advanced CRM features.</p>
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
                <h2 class="text-center mb-5">Complete Customer Management Features</h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <h5>Customer Database</h5>
                    <p>Comprehensive customer profiles with contact details, purchase history, and preferences for personalized service.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Complete contact information</li>
                        <li><i class="fas fa-check text-success me-2"></i>Purchase history tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Customer preferences</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h5>Credit Management</h5>
                    <p>Advanced credit control with credit limits, outstanding tracking, and due date management for better cash flow.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Credit limit setup</li>
                        <li><i class="fas fa-check text-success me-2"></i>Outstanding balance tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Due date alerts</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h5>Loyalty & Rewards</h5>
                    <p>Build customer loyalty with points-based rewards, discount programs, and special offers for repeat customers.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Points accumulation</li>
                        <li><i class="fas fa-check text-success me-2"></i>Reward redemption</li>
                        <li><i class="fas fa-check text-success me-2"></i>Tier-based benefits</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h5>Payment Tracking</h5>
                    <p>Complete payment history with outstanding amounts, partial payments, and collection reminders.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Payment history</li>
                        <li><i class="fas fa-check text-success me-2"></i>Outstanding reports</li>
                        <li><i class="fas fa-check text-success me-2"></i>Collection reminders</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <h5>Customer Groups</h5>
                    <p>Organize customers into groups (wholesale, retail, VIP) with different pricing and discount structures.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Customer segmentation</li>
                        <li><i class="fas fa-check text-success me-2"></i>Group-based pricing</li>
                        <li><i class="fas fa-check text-success me-2"></i>Targeted promotions</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5>Customer Analytics</h5>
                    <p>Analyze customer behavior, purchasing patterns, and profitability to make data-driven marketing decisions.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Purchase patterns</li>
                        <li><i class="fas fa-check text-success me-2"></i>Customer lifetime value</li>
                        <li><i class="fas fa-check text-success me-2"></i>Profitability analysis</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Benefits Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">CRM Benefits for Your Business</h2>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-heart"></i>
                    <div>
                        <h6>Customer Retention</h6>
                        <p class="mb-0">Increase customer loyalty and reduce churn rates</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-dollar-sign"></i>
                    <div>
                        <h6>Increased Revenue</h6>
                        <p class="mb-0">Boost sales with targeted offers and upselling</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-handshake"></i>
                    <div>
                        <h6>Better Service</h6>
                        <p class="mb-0">Provide personalized service based on customer data</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h6>Faster Collections</h6>
                        <p class="mb-0">Improve cash flow with automated payment reminders</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-target"></i>
                    <div>
                        <h6>Targeted Marketing</h6>
                        <p class="mb-0">Create focused campaigns for different customer segments</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-database"></i>
                    <div>
                        <h6>Centralized Data</h6>
                        <p class="mb-0">All customer information in one place for easy access</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Screenshots Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Customer Management Interface</h2>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Customer Profile</h5>
                    <p>Complete customer information dashboard</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Credit Management</h5>
                    <p>Outstanding balance tracking</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Loyalty Program</h5>
                    <p>Points and rewards management</p>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="row">
            <div class="col-12">
                <div class="cta-section">
                    <h3>Build Stronger Customer Relationships</h3>
                    <p class="lead">Transform your customer management with advanced CRM features</p>
                    <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-lg me-3">Try Free Demo</a>
                    <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-primary btn-lg">View Pricing</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
