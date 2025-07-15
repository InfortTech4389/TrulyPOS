<!-- Industry Detail Page -->
<div class="industry-detail-page">
    <!-- Hero Section -->
    <section class="hero-section bg-gradient text-white py-4">
        <div class="container">
            <div class="row align-items-center min-vh-25">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb" class="mb-2">
                        <ol class="breadcrumb text-white-50 mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('industries') ?>" class="text-white-50">Industries</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page"><?= $industry ?></li>
                        </ol>
                    </nav>
                    <div class="hero-content d-flex align-items-center mb-3">
                        <div class="hero-icon me-3">
                            <i class="<?= $icon ?> fa-3x text-warning"></i>
                        </div>
                        <div>
                            <h1 class="h2 fw-bold mb-2"><?= $industry ?></h1>
                            <p class="mb-0" style="font-size: 1.1rem;">POS solutions tailored for <?= strtolower($industry) ?> businesses</p>
                        </div>
                    </div>
                    <p class="mb-3" style="font-size: 1rem;">Streamline your <?= strtolower($industry) ?> operations with our industry-specific POS features. From inventory management to customer engagement, we've got you covered.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="<?= base_url('contact') ?>" class="btn btn-warning">Get Free Demo</a>
                        <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light">View Pricing</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="hero-visual">
                        <i class="<?= $icon ?> fa-5x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Types Grid -->
    <section class="business-types-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h3 fw-bold mb-3">Business Types We Support</h2>
                <p class="text-muted">Specialized solutions for every type of <?= strtolower($industry) ?> business</p>
            </div>
            
            <div class="row g-4">
                <?php foreach($businesses as $business => $details): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="business-type-card h-100 bg-light p-4 rounded-3 text-center">
                            <div class="icon-wrapper mb-3 <?= isset($industry_type) ? $industry_type : 'default' ?>-theme">
                                <i class="<?= $details['icon'] ?> fa-3x"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark"><?= $business ?></h5>
                            <p class="text-muted small mb-3"><?= $details['description'] ?></p>
                            <a href="<?= base_url('contact') ?>" class="btn btn-sm btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Industry Features -->
    <section class="industry-features-section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h3 fw-bold mb-3">Key Features for <?= $industry ?></h2>
                <p class="text-muted">Everything you need to run your <?= strtolower($industry) ?> business efficiently</p>
            </div>
            
            <div class="row g-4">
                <?php 
                $features = [];
                switch($industry) {
                    case 'Apparel & Footwear':
                        $features = [
                            ['icon' => 'fas fa-palette', 'title' => 'Size & Color Management', 'description' => 'Track inventory by size, color, and style variations'],
                            ['icon' => 'fas fa-tags', 'title' => 'Seasonal Pricing', 'description' => 'Manage seasonal discounts and promotional pricing'],
                            ['icon' => 'fas fa-chart-line', 'title' => 'Fashion Analytics', 'description' => 'Analyze trends and bestselling styles'],
                            ['icon' => 'fas fa-truck', 'title' => 'Supplier Management', 'description' => 'Manage multiple suppliers and purchase orders'],
                            ['icon' => 'fas fa-barcode', 'title' => 'Barcode Integration', 'description' => 'Quick scanning for fast billing process'],
                            ['icon' => 'fas fa-receipt', 'title' => 'GST Compliance', 'description' => 'Automated GST calculations and filing']
                        ];
                        break;
                    case 'Electronics & Computers':
                        $features = [
                            ['icon' => 'fas fa-shield-alt', 'title' => 'Warranty Tracking', 'description' => 'Track warranty periods and service history'],
                            ['icon' => 'fas fa-hashtag', 'title' => 'Serial Number Management', 'description' => 'Manage unique serial numbers for each product'],
                            ['icon' => 'fas fa-tools', 'title' => 'Repair Management', 'description' => 'Track repairs and service requests'],
                            ['icon' => 'fas fa-boxes', 'title' => 'Bulk Inventory', 'description' => 'Handle large quantities and wholesale operations'],
                            ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Integration', 'description' => 'Mobile apps for on-the-go management'],
                            ['icon' => 'fas fa-chart-bar', 'title' => 'Tech Analytics', 'description' => 'Analyze product performance and trends']
                        ];
                        break;
                    case 'Hypermarket & Departmental':
                        $features = [
                            ['icon' => 'fas fa-store-alt', 'title' => 'Multi-Location Support', 'description' => 'Manage multiple stores from one dashboard'],
                            ['icon' => 'fas fa-users', 'title' => 'Multi-User Access', 'description' => 'Role-based access for different staff levels'],
                            ['icon' => 'fas fa-warehouse', 'title' => 'Bulk Operations', 'description' => 'Handle large-scale inventory operations'],
                            ['icon' => 'fas fa-cash-register', 'title' => 'Multiple Payment Methods', 'description' => 'Accept cards, cash, UPI, and wallets'],
                            ['icon' => 'fas fa-chart-pie', 'title' => 'Department Analytics', 'description' => 'Track performance by department'],
                            ['icon' => 'fas fa-shopping-cart', 'title' => 'Queue Management', 'description' => 'Manage customer queues efficiently']
                        ];
                        break;
                    case 'Lifestyle & Fashion':
                        $features = [
                            ['icon' => 'fas fa-star', 'title' => 'Trend Analysis', 'description' => 'Track fashion trends and customer preferences'],
                            ['icon' => 'fas fa-heart', 'title' => 'Customer Loyalty', 'description' => 'Build customer loyalty programs'],
                            ['icon' => 'fas fa-gift', 'title' => 'Gift Management', 'description' => 'Handle gift cards and vouchers'],
                            ['icon' => 'fas fa-calendar', 'title' => 'Seasonal Collections', 'description' => 'Manage seasonal inventory and promotions'],
                            ['icon' => 'fas fa-eye', 'title' => 'Visual Merchandising', 'description' => 'Track product placement and displays'],
                            ['icon' => 'fas fa-percentage', 'title' => 'Dynamic Pricing', 'description' => 'Flexible pricing and discount management']
                        ];
                        break;
                    case 'Pharma & Healthcare':
                        $features = [
                            ['icon' => 'fas fa-prescription', 'title' => 'Prescription Management', 'description' => 'Handle prescriptions and dosage tracking'],
                            ['icon' => 'fas fa-calendar-times', 'title' => 'Expiry Date Tracking', 'description' => 'Monitor medicine expiry dates'],
                            ['icon' => 'fas fa-shield-virus', 'title' => 'Compliance Management', 'description' => 'Ensure regulatory compliance'],
                            ['icon' => 'fas fa-pills', 'title' => 'Medicine Database', 'description' => 'Comprehensive medicine information'],
                            ['icon' => 'fas fa-user-md', 'title' => 'Doctor Integration', 'description' => 'Connect with healthcare providers'],
                            ['icon' => 'fas fa-file-medical', 'title' => 'Health Records', 'description' => 'Maintain customer health records']
                        ];
                        break;
                    case 'Supermarket & Groceries':
                        $features = [
                            ['icon' => 'fas fa-weight', 'title' => 'Weight-Based Billing', 'description' => 'Handle loose items and weight-based products'],
                            ['icon' => 'fas fa-thermometer-half', 'title' => 'Perishable Management', 'description' => 'Track perishable goods and expiry'],
                            ['icon' => 'fas fa-rocket', 'title' => 'Quick Checkout', 'description' => 'Fast billing for grocery items'],
                            ['icon' => 'fas fa-shopping-basket', 'title' => 'Bulk Purchases', 'description' => 'Handle wholesale and bulk orders'],
                            ['icon' => 'fas fa-leaf', 'title' => 'Organic Tracking', 'description' => 'Separate organic and regular products'],
                            ['icon' => 'fas fa-truck', 'title' => 'Delivery Management', 'description' => 'Manage home delivery services']
                        ];
                        break;
                    case 'Specialized Retail':
                        $features = [
                            ['icon' => 'fas fa-cog', 'title' => 'Custom Features', 'description' => 'Tailored features for unique business needs'],
                            ['icon' => 'fas fa-search', 'title' => 'Advanced Search', 'description' => 'Find products quickly with smart search'],
                            ['icon' => 'fas fa-clipboard-list', 'title' => 'Special Orders', 'description' => 'Handle special orders and pre-orders'],
                            ['icon' => 'fas fa-handshake', 'title' => 'Vendor Relations', 'description' => 'Manage specialized supplier relationships'],
                            ['icon' => 'fas fa-graduation-cap', 'title' => 'Staff Training', 'description' => 'Training modules for specialized products'],
                            ['icon' => 'fas fa-award', 'title' => 'Expert Support', 'description' => 'Specialized support for niche industries']
                        ];
                        break;
                    case 'Restaurant':
                        $features = [
                            ['icon' => 'fas fa-utensils', 'title' => 'Table Management', 'description' => 'Manage dine-in, counter, and delivery orders'],
                            ['icon' => 'fas fa-print', 'title' => 'Kitchen Order Tickets', 'description' => 'Print KOT for kitchen with order details'],
                            ['icon' => 'fas fa-mobile-alt', 'title' => 'Online Integration', 'description' => 'Connect with Swiggy, Zomato, and other platforms'],
                            ['icon' => 'fas fa-edit', 'title' => 'Menu Customization', 'description' => 'Flexible menu with modifiers and variants'],
                            ['icon' => 'fas fa-receipt', 'title' => 'Split Bills & Discounts', 'description' => 'Handle split payments and loyalty programs'],
                            ['icon' => 'fas fa-clipboard-list', 'title' => 'Recipe Management', 'description' => 'Track ingredients and control food costs'],
                            ['icon' => 'fas fa-network-wired', 'title' => 'Multi-Location', 'description' => 'Manage multiple outlets from one system'],
                            ['icon' => 'fas fa-file-invoice', 'title' => 'GST & FSSAI Compliance', 'description' => 'Automated tax and food safety compliance'],
                            ['icon' => 'fas fa-wifi', 'title' => 'Offline Billing', 'description' => 'Continue operations during internet outages']
                        ];
                        break;
                    default:
                        $features = [
                            ['icon' => 'fas fa-cash-register', 'title' => 'Point of Sale', 'description' => 'Fast and efficient billing system'],
                            ['icon' => 'fas fa-boxes', 'title' => 'Inventory Management', 'description' => 'Track stock levels and movements'],
                            ['icon' => 'fas fa-users', 'title' => 'Customer Management', 'description' => 'Maintain customer database'],
                            ['icon' => 'fas fa-chart-line', 'title' => 'Reports & Analytics', 'description' => 'Business insights and reports'],
                            ['icon' => 'fas fa-receipt', 'title' => 'GST Compliance', 'description' => 'Automated tax calculations'],
                            ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile Access', 'description' => 'Access from anywhere, anytime']
                        ];
                }
                ?>
                
                <?php foreach($features as $feature): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card h-100 bg-white p-4 rounded-3 shadow-sm">
                            <div class="feature-icon mb-3">
                                <div class="icon-wrapper <?= isset($industry_type) ? $industry_type : 'default' ?>-theme">
                                    <i class="<?= $feature['icon'] ?> fa-2x"></i>
                                </div>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark"><?= $feature['title'] ?></h5>
                            <p class="text-muted mb-0"><?= $feature['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="h3 fw-bold mb-4">Why Choose TrulyPOS for Your <?= $industry ?> Business?</h2>
                    <div class="benefits-list">
                        <div class="benefit-item d-flex align-items-start mb-3">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Industry-Specific Features</h6>
                                <p class="text-muted mb-0">Features designed specifically for <?= strtolower($industry) ?> businesses</p>
                            </div>
                        </div>
                        <div class="benefit-item d-flex align-items-start mb-3">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Easy Implementation</h6>
                                <p class="text-muted mb-0">Quick setup and seamless migration from existing systems</p>
                            </div>
                        </div>
                        <div class="benefit-item d-flex align-items-start mb-3">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">24/7 Support</h6>
                                <p class="text-muted mb-0">Round-the-clock technical support and assistance</p>
                            </div>
                        </div>
                        <div class="benefit-item d-flex align-items-start mb-3">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Scalable Solution</h6>
                                <p class="text-muted mb-0">Grows with your business from single store to multiple locations</p>
                            </div>
                        </div>
                        <div class="benefit-item d-flex align-items-start mb-3">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Cost-Effective</h6>
                                <p class="text-muted mb-0">Competitive pricing with excellent ROI</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="benefits-visual">
                        <i class="<?= $icon ?> display-1 text-primary opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Restaurant Pricing Section (only for restaurant industry) -->
    <?php if(isset($restaurant_plans)): ?>
    <section class="restaurant-pricing py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h3 fw-bold mb-3">Restaurant POS Pricing Plans</h2>
                <p class="text-muted">Choose the perfect plan for your restaurant, café, bakery, or food business</p>
                <div class="pricing-toggle d-flex justify-content-center align-items-center mb-4">
                    <span class="me-3">Monthly</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="restaurantPricingToggle" checked>
                        <label class="form-check-label" for="restaurantPricingToggle"></label>
                    </div>
                    <span class="ms-3">Yearly <span class="badge bg-success">Save 20%</span></span>
                </div>
            </div>
            
            <div class="row g-4">
                <?php foreach($restaurant_plans as $plan): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="restaurant-pricing-card h-100 <?= $plan['popular'] ? 'popular' : '' ?>">
                            <?php if($plan['popular']): ?>
                                <div class="popular-badge">Most Popular</div>
                            <?php endif; ?>
                            
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <h4 class="plan-name fw-bold mb-2"><?= $plan['name'] ?></h4>
                                    <p class="plan-description text-muted small mb-3"><?= $plan['description'] ?></p>
                                    
                                    <div class="price-section mb-4">
                                        <div class="price-display">
                                            <span class="price-amount restaurant-yearly-price"><?= $plan['price'] ?></span>
                                            <span class="price-amount restaurant-monthly-price" style="display: none;"><?= $plan['monthly_price'] ?></span>
                                            <?php if($plan['period']): ?>
                                                <span class="price-period">
                                                    <span class="restaurant-yearly-period">/<?= $plan['period'] ?></span>
                                                    <span class="restaurant-monthly-period" style="display: none;">/month</span>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($plan['name'] != 'Enterprise'): ?>
                                            <div class="price-note text-muted small">
                                                <span class="restaurant-yearly-note">Billed annually</span>
                                                <span class="restaurant-monthly-note" style="display: none;">Billed monthly</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="features-list mb-4">
                                        <?php foreach($plan['features'] as $feature): ?>
                                            <div class="feature-item">
                                                <i class="fas fa-check text-success me-2"></i>
                                                <?= $feature ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="<?= base_url('buy?plan=' . strtolower($plan['name']) . '&type=restaurant') ?>" class="btn btn-primary w-100 btn-lg">
                                            <?= $plan['name'] == 'Enterprise' ? 'Request Quote' : 'Get Started' ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-5">
                <p class="text-muted small mb-3">All prices exclusive of GST. <a href="#">Terms & Conditions</a> apply.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-primary">Request Demo</a>
                    <a href="<?= base_url('pricing') ?>" class="btn btn-outline-secondary">View Retail Pricing</a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA Section -->
    <section class="cta-section bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="h3 fw-bold mb-3">Ready to Transform Your <?= $industry ?> Business?</h2>
            <p class="lead mb-4">Join thousands of <?= strtolower($industry) ?> businesses already using TrulyPOS. Get started today with a free demo.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?= base_url('contact') ?>" class="btn btn-light btn-lg">Get Free Demo</a>
                <a href="<?= base_url('pricing') ?>" class="btn btn-outline-light btn-lg">View Pricing</a>
                <a href="<?= base_url('industries') ?>" class="btn btn-outline-light btn-lg">Back to Industries</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h3 fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Common questions about TrulyPOS for <?= strtolower($industry) ?> businesses</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                                    Is TrulyPOS suitable for small <?= strtolower($industry) ?> businesses?
                                </button>
                            </h3>
                            <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! TrulyPOS is designed to scale with your business. Whether you're a small single-location business or a large multi-location enterprise, our solution adapts to your needs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                                    How long does it take to implement TrulyPOS?
                                </button>
                            </h3>
                            <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Implementation typically takes 1-3 days depending on your business size and complexity. Our team handles data migration and provides comprehensive training.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                    Do you provide training for my staff?
                                </button>
                            </h3>
                            <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We provide comprehensive training for your staff, including hands-on sessions, user manuals, and ongoing support to ensure everyone is comfortable with the system.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                                    Is my data secure with TrulyPOS?
                                </button>
                            </h3>
                            <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we take data security seriously. All data is encrypted, regularly backed up, and stored in secure cloud infrastructure with enterprise-grade security measures.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.industry-detail-page .bg-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.industry-detail-page .hero-section {
    padding: 3rem 0;
}

.min-vh-25 {
    min-height: 25vh;
}

.business-type-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    background: white;
}

.business-type-card h5 {
    color: #333 !important;
}

.business-type-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: #007bff;
}

.feature-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.feature-card h5 {
    color: #333 !important;
}

.feature-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    border-color: #007bff;
}

.feature-icon .icon-wrapper {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    position: relative;
    box-shadow: 0 4px 15px rgba(33, 150, 243, 0.2);
}

.feature-icon .icon-wrapper i {
    color: #1976d2;
    font-size: 1.8rem;
}

.feature-icon .icon-wrapper::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
    border-radius: 50%;
    z-index: -1;
    opacity: 0.1;
}

.feature-card:hover .feature-icon .icon-wrapper {
    background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
    box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
    transform: scale(1.1);
}

.feature-card:hover .feature-icon .icon-wrapper i {
    color: white;
}

/* Industry-specific color themes for icons */
.apparel-theme {
    background: linear-gradient(135deg, #e91e63, #f06292);
}

.apparel-theme:hover {
    background: linear-gradient(135deg, #c2185b, #e91e63);
}

.electronics-theme {
    background: linear-gradient(135deg, #2196f3, #64b5f6);
}

.electronics-theme:hover {
    background: linear-gradient(135deg, #1976d2, #2196f3);
}

.hypermarket-theme {
    background: linear-gradient(135deg, #4caf50, #81c784);
}

.hypermarket-theme:hover {
    background: linear-gradient(135deg, #388e3c, #4caf50);
}

.lifestyle-theme {
    background: linear-gradient(135deg, #9c27b0, #ba68c8);
}

.lifestyle-theme:hover {
    background: linear-gradient(135deg, #7b1fa2, #9c27b0);
}

.pharma-theme {
    background: linear-gradient(135deg, #00bcd4, #4dd0e1);
}

.pharma-theme:hover {
    background: linear-gradient(135deg, #0097a7, #00bcd4);
}

.supermarket-theme {
    background: linear-gradient(135deg, #ff9800, #ffb74d);
}

.supermarket-theme:hover {
    background: linear-gradient(135deg, #f57c00, #ff9800);
}

.specialized-theme {
    background: linear-gradient(135deg, #607d8b, #90a4ae);
}

.specialized-theme:hover {
    background: linear-gradient(135deg, #455a64, #607d8b);
}

.restaurant-theme {
    background: linear-gradient(135deg, #ff5722, #ff7043);
}

.restaurant-theme:hover {
    background: linear-gradient(135deg, #d84315, #ff5722);
}

.default-theme {
    background: linear-gradient(135deg, #007bff, #6610f2);
}

.default-theme:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
}

/* Restaurant Pricing Styles */
.restaurant-pricing-card {
    position: relative;
    transition: transform 0.3s ease;
}

.restaurant-pricing-card:hover {
    transform: translateY(-5px);
}

.restaurant-pricing-card.popular {
    position: relative;
    z-index: 1;
}

.restaurant-pricing-card.popular .card {
    border: 2px solid #ff5722;
    transform: scale(1.05);
}

.restaurant-pricing-card .popular-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: #ff5722;
    color: white;
    padding: 5px 20px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    z-index: 2;
}

.restaurant-pricing-card .price-amount {
    font-size: 2.2rem;
    font-weight: bold;
    color: #ff5722;
}

.restaurant-pricing-card .price-period {
    font-size: 1rem;
    color: #6c757d;
}

.restaurant-pricing-card .plan-description {
    min-height: 40px;
}

.restaurant-pricing-card .feature-item {
    text-align: left;
    padding: 6px 0;
    border-bottom: 1px solid #f8f9fa;
    font-size: 14px;
}

.restaurant-pricing-card .feature-item:last-child {
    border-bottom: none;
}

@media (max-width: 768px) {
    .hero-content {
        flex-direction: column;
        text-align: center;
    }
    
    .hero-content .hero-icon {
        margin-right: 0;
        margin-bottom: 1rem;
    }
    
    .h2 {
        font-size: 1.8rem;
    }
    
    .industry-detail-page .hero-section {
        padding: 2rem 0;
    }
    
    .d-flex.gap-3 {
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .btn {
        width: 100%;
    }
    
    .feature-icon .icon-wrapper {
        width: 60px;
        height: 60px;
    }
    
    .feature-icon .icon-wrapper i {
        font-size: 1.5rem;
    }
}

@media (max-width: 576px) {
    .hero-content {
        margin-bottom: 1rem !important;
    }
    
    .hero-icon i {
        font-size: 2rem !important;
    }
    
    .hero-visual i {
        font-size: 3rem !important;
    }
    
    .feature-icon .icon-wrapper {
        width: 50px;
        height: 50px;
    }
    
    .feature-icon .icon-wrapper i {
        font-size: 1.3rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Restaurant pricing toggle functionality
    const restaurantPricingToggle = document.getElementById('restaurantPricingToggle');
    if (restaurantPricingToggle) {
        const restaurantYearlyPrices = document.querySelectorAll('.restaurant-yearly-price');
        const restaurantMonthlyPrices = document.querySelectorAll('.restaurant-monthly-price');
        const restaurantYearlyPeriods = document.querySelectorAll('.restaurant-yearly-period');
        const restaurantMonthlyPeriods = document.querySelectorAll('.restaurant-monthly-period');
        const restaurantYearlyNotes = document.querySelectorAll('.restaurant-yearly-note');
        const restaurantMonthlyNotes = document.querySelectorAll('.restaurant-monthly-note');
        
        restaurantPricingToggle.addEventListener('change', function() {
            const isYearly = this.checked;
            
            restaurantYearlyPrices.forEach(price => {
                price.style.display = isYearly ? 'inline' : 'none';
            });
            
            restaurantMonthlyPrices.forEach(price => {
                price.style.display = isYearly ? 'none' : 'inline';
            });
            
            restaurantYearlyPeriods.forEach(period => {
                period.style.display = isYearly ? 'inline' : 'none';
            });
            
            restaurantMonthlyPeriods.forEach(period => {
                period.style.display = isYearly ? 'none' : 'inline';
            });
            
            restaurantYearlyNotes.forEach(note => {
                note.style.display = isYearly ? 'inline' : 'none';
            });
            
            restaurantMonthlyNotes.forEach(note => {
                note.style.display = isYearly ? 'none' : 'inline';
            });
        });
    }
});
</script>
