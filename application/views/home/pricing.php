<!-- Pricing Section -->
<section class="pricing-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h1 class="display-4 fw-bold">Choose Your Plan</h1>
                <p class="lead">Affordable pricing for businesses of all sizes</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <?php if(isset($pricing_plans) && !empty($pricing_plans)): ?>
                <?php foreach($pricing_plans as $plan): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="pricing-card h-100 <?php echo $plan->is_popular ? 'featured' : ''; ?>">
                            <div class="pricing-header">
                                <h3><?php echo $plan->name; ?></h3>
                                <p class="text-muted"><?php echo $plan->description; ?></p>
                            </div>
                            
                            <div class="pricing-price">
                                ₹<?php echo number_format($plan->price, 0); ?>
                                <small><?php echo $plan->billing_cycle; ?></small>
                            </div>
                            
                            <ul class="pricing-features">
                                <?php 
                                $features = explode(',', $plan->features);
                                foreach($features as $feature): 
                                ?>
                                    <li><i class="fas fa-check"></i> <?php echo trim($feature); ?></li>
                                <?php endforeach; ?>
                                
                                <?php if($plan->max_users > 0): ?>
                                    <li><i class="fas fa-check"></i> Up to <?php echo $plan->max_users; ?> Users</li>
                                <?php else: ?>
                                    <li><i class="fas fa-check"></i> Unlimited Users</li>
                                <?php endif; ?>
                                
                                <?php if($plan->max_locations > 0): ?>
                                    <li><i class="fas fa-check"></i> Up to <?php echo $plan->max_locations; ?> Locations</li>
                                <?php else: ?>
                                    <li><i class="fas fa-check"></i> Unlimited Locations</li>
                                <?php endif; ?>
                                
                                <li><i class="fas fa-check"></i> <?php echo ucfirst($plan->support_type); ?> Support</li>
                            </ul>
                            
                            <div class="pricing-footer">
                                <a href="<?php echo base_url('buy?plan=' . $plan->id); ?>" class="btn btn-primary btn-lg w-100">
                                    Choose Plan
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default pricing plans -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card h-100">
                        <div class="pricing-header">
                            <h3>Single Store</h3>
                            <p class="text-muted">Perfect for small retail businesses</p>
                        </div>
                        
                        <div class="pricing-price">
                            ₹15,000
                            <small>one-time</small>
                        </div>
                        
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Inventory Management</li>
                            <li><i class="fas fa-check"></i> GST Billing</li>
                            <li><i class="fas fa-check"></i> Barcode Scanning</li>
                            <li><i class="fas fa-check"></i> Basic Reports</li>
                            <li><i class="fas fa-check"></i> Customer Management</li>
                            <li><i class="fas fa-check"></i> Up to 3 Users</li>
                            <li><i class="fas fa-check"></i> 1 Location</li>
                            <li><i class="fas fa-check"></i> Email Support</li>
                        </ul>
                        
                        <div class="pricing-footer">
                            <a href="<?php echo base_url('buy?plan=1'); ?>" class="btn btn-primary btn-lg w-100">
                                Choose Plan
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card h-100 featured">
                        <div class="pricing-header">
                            <h3>Multi Store</h3>
                            <p class="text-muted">Ideal for growing businesses</p>
                        </div>
                        
                        <div class="pricing-price">
                            ₹25,000
                            <small>one-time</small>
                        </div>
                        
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> All Single Store Features</li>
                            <li><i class="fas fa-check"></i> Multi-Location Support</li>
                            <li><i class="fas fa-check"></i> Advanced Reports</li>
                            <li><i class="fas fa-check"></i> Supplier Management</li>
                            <li><i class="fas fa-check"></i> Role-based Access</li>
                            <li><i class="fas fa-check"></i> Up to 10 Users</li>
                            <li><i class="fas fa-check"></i> Up to 5 Locations</li>
                            <li><i class="fas fa-check"></i> Priority Support</li>
                        </ul>
                        
                        <div class="pricing-footer">
                            <a href="<?php echo base_url('buy?plan=2'); ?>" class="btn btn-primary btn-lg w-100">
                                Choose Plan
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card h-100">
                        <div class="pricing-header">
                            <h3>Enterprise</h3>
                            <p class="text-muted">Complete solution for large businesses</p>
                        </div>
                        
                        <div class="pricing-price">
                            ₹50,000
                            <small>one-time</small>
                        </div>
                        
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> All Multi Store Features</li>
                            <li><i class="fas fa-check"></i> Unlimited Users</li>
                            <li><i class="fas fa-check"></i> Unlimited Locations</li>
                            <li><i class="fas fa-check"></i> Advanced Analytics</li>
                            <li><i class="fas fa-check"></i> Custom Reports</li>
                            <li><i class="fas fa-check"></i> API Access</li>
                            <li><i class="fas fa-check"></i> Custom Features</li>
                            <li><i class="fas fa-check"></i> 24/7 Phone Support</li>
                        </ul>
                        
                        <div class="pricing-footer">
                            <a href="<?php echo base_url('buy?plan=3'); ?>" class="btn btn-primary btn-lg w-100">
                                Choose Plan
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold">Frequently Asked Questions</h2>
                <p class="lead">Got questions? We've got answers.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-item">
                    <button class="faq-question">What is included in the lifetime license?</button>
                    <div class="faq-answer">
                        <p>The lifetime license includes all current features, free updates, and technical support. You pay once and use the software forever without any recurring fees.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">Is there a free trial available?</button>
                    <div class="faq-answer">
                        <p>Yes, we offer a live demo with full functionality and sample data. You can also request a 30-day free trial to test the software with your own data.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">What kind of support do you provide?</button>
                    <div class="faq-answer">
                        <p>We provide email support for all plans, priority support for Multi Store plans, and 24/7 phone support for Enterprise plans. We also offer training and implementation assistance.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">Can I upgrade my plan later?</button>
                    <div class="faq-answer">
                        <p>Yes, you can upgrade your plan at any time. You only pay the difference between your current plan and the new plan.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">Is my data secure?</button>
                    <div class="faq-answer">
                        <p>Yes, we use industry-standard encryption and security practices. Your data is stored securely with regular backups and disaster recovery procedures.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="display-6 fw-bold mb-3">Still Have Questions?</h2>
                <p class="lead mb-0">Contact our sales team for personalized assistance</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo base_url('contact'); ?>" class="btn btn-light btn-lg">Contact Sales</a>
            </div>
        </div>
    </div>
</section>
