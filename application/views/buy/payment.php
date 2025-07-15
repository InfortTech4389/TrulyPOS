<!-- Payment Page -->
<div class="payment-page">
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="h2 fw-bold mb-2">Complete Your Payment</h1>
                    <p class="lead mb-0">Secure payment powered by Razorpay</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Section -->
    <section class="payment-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <div class="row">
                                <!-- Payment Details -->
                                <div class="col-md-8">
                                    <h4 class="fw-bold mb-4">Payment Details</h4>
                                    
                                    <div class="order-info bg-light p-3 rounded-3 mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Customer:</strong> <?= $order['customer_name'] ?></p>
                                                <p class="mb-1"><strong>Email:</strong> <?= $order['customer_email'] ?></p>
                                                <p class="mb-0"><strong>Phone:</strong> <?= $order['customer_phone'] ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Company:</strong> <?= $order['company_name'] ?></p>
                                                <p class="mb-1"><strong>Plan:</strong> <?= $plan_details['name'] ?></p>
                                                <p class="mb-0"><strong>Billing:</strong> <?= ucfirst($order['billing_cycle']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="payment-methods mb-4">
                                        <h5 class="fw-bold mb-3">Payment Methods</h5>
                                        <div class="payment-options">
                                            <div class="payment-option active" data-method="card">
                                                <i class="fas fa-credit-card"></i>
                                                <span>Credit/Debit Card</span>
                                            </div>
                                            <div class="payment-option" data-method="netbanking">
                                                <i class="fas fa-university"></i>
                                                <span>Net Banking</span>
                                            </div>
                                            <div class="payment-option" data-method="upi">
                                                <i class="fas fa-mobile-alt"></i>
                                                <span>UPI</span>
                                            </div>
                                            <div class="payment-option" data-method="wallet">
                                                <i class="fas fa-wallet"></i>
                                                <span>Wallet</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="security-info mb-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-shield-alt text-success me-2"></i>
                                            <span class="text-muted">Your payment is secured with 256-bit SSL encryption</span>
                                        </div>
                                    </div>
                                    
                                    <button id="payNowBtn" class="btn btn-success btn-lg w-100">
                                        <i class="fas fa-lock me-2"></i>
                                        Pay ₹<?= number_format($order['amount']) ?> Securely
                                    </button>
                                </div>
                                
                                <!-- Order Summary -->
                                <div class="col-md-4">
                                    <div class="order-summary bg-light p-4 rounded-3">
                                        <h5 class="fw-bold mb-3">Order Summary</h5>
                                        
                                        <div class="plan-details mb-3">
                                            <h6 class="fw-bold text-primary"><?= $plan_details['name'] ?> Plan</h6>
                                            <p class="text-muted small mb-2"><?= ucfirst($order['plan_type']) ?> Solution</p>
                                        </div>
                                        
                                        <div class="pricing-details">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Plan Amount:</span>
                                                <span>₹<?= number_format($order['amount']) ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>GST (18%):</span>
                                                <span>₹<?= number_format($order['amount'] * 0.18) ?></span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-bold">Total Amount:</span>
                                                <span class="fw-bold text-primary">₹<?= number_format($order['amount'] * 1.18) ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="features-included mt-4">
                                            <h6 class="fw-bold mb-2">What's Included:</h6>
                                            <ul class="list-unstyled">
                                                <?php foreach(array_slice($plan_details['features'], 0, 5) as $feature): ?>
                                                    <li class="mb-1">
                                                        <i class="fas fa-check text-success me-2"></i>
                                                        <small><?= $feature ?></small>
                                                    </li>
                                                <?php endforeach; ?>
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

<!-- Razorpay Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<style>
.payment-page .hero-section {
    background: linear-gradient(135deg, #007bff, #6610f2);
}

.payment-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 15px;
}

.payment-option {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 15px;
    border: 2px solid #dee2e6;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.payment-option:hover {
    border-color: #007bff;
    background-color: #f8f9fa;
}

.payment-option.active {
    border-color: #007bff;
    background-color: #e3f2fd;
}

.payment-option i {
    font-size: 24px;
    margin-bottom: 8px;
    color: #007bff;
}

.payment-option span {
    font-size: 12px;
    font-weight: 500;
}

.order-summary {
    position: sticky;
    top: 20px;
}

.security-info {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #28a745;
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-success:hover {
    background: linear-gradient(135deg, #20c997, #17a2b8);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
}

@media (max-width: 768px) {
    .payment-options {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .order-summary {
        position: static;
        margin-top: 30px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Payment method selection
    const paymentOptions = document.querySelectorAll('.payment-option');
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            paymentOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Razorpay configuration
    const options = {
        key: '<?= $razorpay_key ?>',
        amount: <?= $razorpay_order['amount'] ?>,
        currency: '<?= $razorpay_order['currency'] ?>',
        order_id: '<?= $razorpay_order['id'] ?>',
        name: 'TrulyPOS',
        description: '<?= $plan_details['name'] ?> Plan - <?= ucfirst($order['plan_type']) ?> Solution',
        image: '<?= base_url('assets/images/logo.png') ?>',
        prefill: {
            name: '<?= $order['customer_name'] ?>',
            email: '<?= $order['customer_email'] ?>',
            contact: '<?= $order['customer_phone'] ?>'
        },
        notes: {
            order_id: '<?= $order_id ?>',
            plan: '<?= $order['plan_name'] ?>',
            type: '<?= $order['plan_type'] ?>'
        },
        theme: {
            color: '#007bff'
        },
        handler: function (response) {
            // Payment successful
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= base_url('payment/process') ?>';
            
            const inputs = [
                { name: 'razorpay_payment_id', value: response.razorpay_payment_id },
                { name: 'razorpay_order_id', value: response.razorpay_order_id },
                { name: 'razorpay_signature', value: response.razorpay_signature }
            ];
            
            inputs.forEach(input => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = input.name;
                hiddenInput.value = input.value;
                form.appendChild(hiddenInput);
            });
            
            document.body.appendChild(form);
            form.submit();
        },
        modal: {
            ondismiss: function() {
                // Payment cancelled
                console.log('Payment cancelled');
            }
        }
    };
    
    const rzp = new Razorpay(options);
    
    // Pay Now button click
    document.getElementById('payNowBtn').addEventListener('click', function() {
        rzp.open();
    });
    
    // Handle payment errors
    rzp.on('payment.failed', function (response) {
        alert('Payment failed: ' + response.error.description);
    });
});
</script>
