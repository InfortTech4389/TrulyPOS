<!-- Buy Plan Page -->
<div class="buy-plan-page">
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="h2 fw-bold mb-2">Complete Your Purchase</h1>
                    <p class="lead mb-0">You're just one step away from transforming your business with TrulyPOS</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Form -->
    <section class="order-form-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <div class="row">
                                <!-- Order Form -->
                                <div class="col-md-8">
                                    <h4 class="fw-bold mb-4">Order Information</h4>
                                    
                                    <?= form_open('buy/checkout', ['id' => 'orderForm']) ?>
                                        <input type="hidden" name="plan" value="<?= $plan ?>">
                                        <input type="hidden" name="type" value="<?= $type ?>">
                                        
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
                                                <label for="phone" class="form-label">Phone Number *</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="company" class="form-label">Company Name *</label>
                                                <input type="text" class="form-control" id="company" name="company" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3 mt-2">
                                            <div class="col-md-6">
                                                <label for="billing_cycle" class="form-label">Billing Cycle *</label>
                                                <select class="form-select" id="billing_cycle" name="billing_cycle" required>
                                                    <option value="">Select Billing Cycle</option>
                                                    <option value="yearly" selected>Yearly (Save 20%)</option>
                                                    <option value="monthly">Monthly</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="gst" class="form-label">GST Number (Optional)</label>
                                                <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GST number if available">
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                                <label class="form-check-label" for="terms">
                                                    I agree to the <a href="#" target="_blank">Terms & Conditions</a> and <a href="#" target="_blank">Privacy Policy</a>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <div class="recaptcha-container">
                                                <?= $this->recaptcha->get_widget() ?>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                                <i class="fas fa-credit-card me-2"></i>
                                                Proceed to Payment
                                            </button>
                                        </div>
                                    <?= form_close() ?>
                                </div>
                                
                                <!-- Order Summary -->
                                <div class="col-md-4">
                                    <div class="order-summary bg-light p-4 rounded-3">
                                        <h5 class="fw-bold mb-3">Order Summary</h5>
                                        
                                        <div class="plan-details mb-3">
                                            <h6 class="fw-bold text-primary"><?= $plan_details['name'] ?> Plan</h6>
                                            <p class="text-muted small mb-2"><?= ucfirst($type) ?> Solution</p>
                                            
                                            <?php if(isset($plan_details['outlets'])): ?>
                                                <div class="spec-item">
                                                    <i class="fas fa-store text-primary me-2"></i>
                                                    <span><?= $plan_details['outlets'] ?> <?= $plan_details['outlets'] == 1 ? 'Outlet' : 'Outlets' ?></span>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if(isset($plan_details['users'])): ?>
                                                <div class="spec-item">
                                                    <i class="fas fa-users text-primary me-2"></i>
                                                    <span><?= $plan_details['users'] ?> <?= $plan_details['users'] == 1 ? 'User' : 'Users' ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="pricing-details">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Yearly Price:</span>
                                                <span class="fw-bold">₹<?= number_format($plan_details['yearly_price']) ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Monthly Price:</span>
                                                <span>₹<?= number_format($plan_details['monthly_price']) ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>You Save:</span>
                                                <span class="text-success fw-bold">₹<?= number_format(($plan_details['monthly_price'] * 12) - $plan_details['yearly_price']) ?></span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Total (Yearly):</span>
                                                <span class="fw-bold text-primary">₹<?= number_format($plan_details['yearly_price']) ?></span>
                                            </div>
                                            <p class="text-muted small mt-2">*Prices exclusive of GST</p>
                                        </div>
                                        
                                        <div class="features-included mt-4">
                                            <h6 class="fw-bold mb-2">Included Features:</h6>
                                            <ul class="list-unstyled">
                                                <?php foreach(array_slice($plan_details['features'], 0, 4) as $feature): ?>
                                                    <li class="mb-1">
                                                        <i class="fas fa-check text-success me-2"></i>
                                                        <small><?= $feature ?></small>
                                                    </li>
                                                <?php endforeach; ?>
                                                <?php if(count($plan_details['features']) > 4): ?>
                                                    <li class="mb-1">
                                                        <i class="fas fa-plus text-primary me-2"></i>
                                                        <small>+<?= count($plan_details['features']) - 4 ?> more features</small>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
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
.buy-plan-page .hero-section {
    background: linear-gradient(135deg, #007bff, #6610f2);
}

.order-summary {
    position: sticky;
    top: 20px;
}

.spec-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 14px;
}

.pricing-details {
    border-top: 1px solid #dee2e6;
    padding-top: 15px;
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
    .order-summary {
        position: static;
        margin-top: 30px;
    }
}
</style>

<!-- reCAPTCHA Script -->
<?= $this->recaptcha->get_script_tag() ?>
<?= $this->recaptcha->get_validation_js('orderForm') ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const billingCycle = document.getElementById('billing_cycle');
    const totalAmount = document.querySelector('.pricing-details .fw-bold.text-primary');
    const yearlyPrice = <?= $plan_details['yearly_price'] ?>;
    const monthlyPrice = <?= $plan_details['monthly_price'] ?>;
    
    billingCycle.addEventListener('change', function() {
        const isYearly = this.value === 'yearly';
        const amount = isYearly ? yearlyPrice : monthlyPrice;
        totalAmount.textContent = '₹' + amount.toLocaleString();
    });
    
    // Form validation
    const orderForm = document.getElementById('orderForm');
    orderForm.addEventListener('submit', function(e) {
        const phone = document.getElementById('phone').value;
        if (phone.length < 10) {
            e.preventDefault();
            alert('Please enter a valid 10-digit phone number');
        }
    });
});
</script>
