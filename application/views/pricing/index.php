<!-- Hero Section -->
<section class="pricing-hero bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Choose Your Perfect Plan</h1>
                <p class="lead mb-4">Powerful POS solutions for retail, distribution, pharmacy, grocery, and other businesses. All plans include GST compliance, inventory management, and professional support.</p>
                <div class="pricing-toggle d-flex justify-content-center align-items-center mb-4">
                    <span class="me-3">Monthly</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="pricingToggle" checked>
                        <label class="form-check-label" for="pricingToggle"></label>
                    </div>
                    <span class="ms-3">Yearly <span class="badge bg-success">Save 20%</span></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section class="pricing-plans py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach($plans as $plan): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="pricing-card h-100 <?= $plan['popular'] ? 'popular' : '' ?>">
                        <?php if($plan['popular']): ?>
                            <div class="popular-badge">Most Popular</div>
                        <?php endif; ?>
                        
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <h3 class="plan-name fw-bold mb-3"><?= $plan['name'] ?></h3>
                                
                                <div class="price-section mb-4">
                                    <div class="price-display">
                                        <span class="price-amount yearly-price"><?= $plan['price'] ?></span>
                                        <span class="price-amount monthly-price" style="display: none;"><?= $plan['monthly_price'] ?></span>
                                        <?php if($plan['period']): ?>
                                            <span class="price-period">
                                                <span class="yearly-period">/<?= $plan['period'] ?></span>
                                                <span class="monthly-period" style="display: none;">/month</span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($plan['name'] != 'Enterprise'): ?>
                                        <div class="price-note text-muted small">
                                            <span class="yearly-note">Billed annually</span>
                                            <span class="monthly-note" style="display: none;">Billed monthly</span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="plan-specs mb-4">
                                    <div class="spec-item">
                                        <i class="fas fa-store text-primary me-2"></i>
                                        <strong><?= $plan['outlets'] ?></strong> <?= $plan['outlets'] == 1 ? 'Outlet' : 'Outlets' ?>
                                    </div>
                                    <div class="spec-item">
                                        <i class="fas fa-users text-primary me-2"></i>
                                        <strong><?= $plan['users'] ?></strong> <?= $plan['users'] == 1 ? 'User' : 'Users' ?>
                                    </div>
                                </div>

                                <div class="features-list mb-4">
                                    <?php foreach($plan['features'] as $feature): ?>
                                        <div class="feature-item">
                                            <i class="fas fa-check text-success me-2"></i>
                                            <?= $feature ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <a href="<?= base_url('buy?plan=' . strtolower($plan['name']) . '&type=retail') ?>" class="btn <?= $plan['button_class'] ?> w-100 btn-lg"><?= $plan['button_text'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Restaurant CTA Section -->
<section class="restaurant-cta py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="cta-card bg-white p-5 rounded-3 shadow-sm">
                    <div class="mb-4">
                        <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold mb-3">Need POS for Restaurant, Café, Bakery, or QSR?</h3>
                        <p class="text-muted mb-4">Discover our specialized restaurant POS solutions with table management, kitchen order tickets, online integration, and more.</p>
                        <a href="<?= base_url('industries/restaurant') ?>" class="btn btn-primary btn-lg me-3">See Restaurant Packages</a>
                        <a href="<?= base_url('contact') ?>" class="btn btn-outline-primary btn-lg">Request Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Comparison -->
<section class="features-comparison py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Compare All Features</h2>
            <p class="text-muted">See what's included in each plan</p>
        </div>
        
        <div class="comparison-table-responsive">
            <table class="table table-striped comparison-table">
                <thead class="table-dark">
                    <tr>
                        <th>Features</th>
                        <th>Starter</th>
                        <th>Growth</th>
                        <th>Elite</th>
                        <th>Enterprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Core POS & Billing</strong></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>GST Invoicing</strong></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>Inventory Management</strong></td>
                        <td>Basic</td>
                        <td>Advanced</td>
                        <td>Advanced</td>
                        <td>Advanced</td>
                    </tr>
                    <tr>
                        <td><strong>Multi-location Support</strong></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>Mobile App Access</strong></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>CRM & Loyalty</strong></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>Tally Integration</strong></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>API Access</strong></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td><strong>Support Level</strong></td>
                        <td>Email</td>
                        <td>WhatsApp</td>
                        <td>Priority</td>
                        <td>SLA-based</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                    <p class="text-muted">Get answers to common questions about our pricing and features</p>
                </div>
                
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                                What's included in all plans?
                            </button>
                        </h2>
                        <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                All plans include core POS functionality, GST compliance, customer database, basic reports, and email support. Higher plans add multi-location support, advanced features, and priority support.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                                Is there training and support included?
                            </button>
                        </h2>
                        <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! All plans include setup assistance and training. Growth and higher plans get WhatsApp support, while Elite and Enterprise plans include priority support and dedicated account management.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                How do I upgrade my plan?
                            </button>
                        </h2>
                        <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can upgrade anytime from your dashboard or contact our support team. Upgrades are prorated, so you only pay the difference for the remaining billing period.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                                Can I try before I buy?
                            </button>
                        </h2>
                        <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! All plans come with a 15-day free trial. No credit card required to start your trial.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section class="bottom-cta py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">Ready to Get Started?</h2>
                <p class="text-muted mb-4">Join thousands of businesses already using TrulyPOS to grow their operations</p>
                <a href="<?= base_url('buy?plan=starter&type=retail') ?>" class="btn btn-primary btn-lg me-3">Start Free Trial</a>
                <a href="<?= base_url('contact') ?>" class="btn btn-outline-primary btn-lg">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<!-- Terms Note -->
<section class="terms-note py-3 bg-light">
    <div class="container">
        <div class="text-center text-muted small">
            <p class="mb-0">All prices are exclusive of GST. <a href="#">Terms & Conditions</a> apply. Enterprise pricing available on request.</p>
        </div>
    </div>
</section>

<style>
.pricing-hero {
    background: linear-gradient(135deg, #007bff, #6610f2);
}

.pricing-toggle .form-check-input {
    transform: scale(1.2);
}

.pricing-card {
    position: relative;
    transition: transform 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-5px);
}

.pricing-card.popular {
    position: relative;
    z-index: 1;
}

.pricing-card.popular .card {
    border: 2px solid #007bff;
    transform: scale(1.05);
}

.popular-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: #007bff;
    color: white;
    padding: 5px 20px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    z-index: 2;
}

.price-amount {
    font-size: 2.5rem;
    font-weight: bold;
    color: #007bff;
}

.price-period {
    font-size: 1rem;
    color: #6c757d;
}

.spec-item {
    margin-bottom: 8px;
    font-size: 14px;
}

.feature-item {
    text-align: left;
    padding: 8px 0;
    border-bottom: 1px solid #f8f9fa;
}

.feature-item:last-child {
    border-bottom: none;
}

.restaurant-cta {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.cta-card {
    border: 1px solid #dee2e6;
}

.comparison-table-responsive {
    overflow-x: auto;
}

.comparison-table {
    min-width: 600px;
}

.comparison-table th {
    white-space: nowrap;
    text-align: center;
}

.comparison-table td {
    text-align: center;
    vertical-align: middle;
}

@media (max-width: 768px) {
    .price-amount {
        font-size: 2rem;
    }
    
    .pricing-card.popular .card {
        transform: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pricingToggle = document.getElementById('pricingToggle');
    const yearlyPrices = document.querySelectorAll('.yearly-price');
    const monthlyPrices = document.querySelectorAll('.monthly-price');
    const yearlyPeriods = document.querySelectorAll('.yearly-period');
    const monthlyPeriods = document.querySelectorAll('.monthly-period');
    const yearlyNotes = document.querySelectorAll('.yearly-note');
    const monthlyNotes = document.querySelectorAll('.monthly-note');
    
    pricingToggle.addEventListener('change', function() {
        const isYearly = this.checked;
        
        yearlyPrices.forEach(price => {
            price.style.display = isYearly ? 'inline' : 'none';
        });
        
        monthlyPrices.forEach(price => {
            price.style.display = isYearly ? 'none' : 'inline';
        });
        
        yearlyPeriods.forEach(period => {
            period.style.display = isYearly ? 'inline' : 'none';
        });
        
        monthlyPeriods.forEach(period => {
            period.style.display = isYearly ? 'none' : 'inline';
        });
        
        yearlyNotes.forEach(note => {
            note.style.display = isYearly ? 'inline' : 'none';
        });
        
        monthlyNotes.forEach(note => {
            note.style.display = isYearly ? 'none' : 'inline';
        });
    });
});
</script>
