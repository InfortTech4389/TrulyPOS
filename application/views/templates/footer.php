    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>Truly POS</h5>
                    <p>Smart Billing & Inventory Software for Distribution & Retail Businesses</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h6>Product</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('industries'); ?>" class="text-white-50">Industries</a></li>
                        <li><a href="<?php echo base_url('features'); ?>" class="text-white-50">Features</a></li>
                        <li><a href="<?php echo base_url('demo'); ?>" class="text-white-50">Live Demo</a></li>
                        <li><a href="<?php echo base_url('pricing'); ?>" class="text-white-50">Pricing</a></li>
                        <li><a href="<?php echo base_url('testimonials'); ?>" class="text-white-50">Testimonials</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h6>Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('about'); ?>" class="text-white-50">About Us</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>" class="text-white-50">Contact</a></li>
                        <li><a href="<?php echo base_url('blog'); ?>" class="text-white-50">Blog</a></li>
                        <li><a href="<?php echo base_url('careers'); ?>" class="text-white-50">Careers</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h6>Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('faq'); ?>" class="text-white-50">FAQ</a></li>
                        <li><a href="<?php echo base_url('support'); ?>" class="text-white-50">Help Center</a></li>
                        <li><a href="<?php echo base_url('documentation'); ?>" class="text-white-50">Documentation</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>" class="text-white-50">Contact Support</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h6>Legal</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('privacy'); ?>" class="text-white-50">Privacy Policy</a></li>
                        <li><a href="<?php echo base_url('terms'); ?>" class="text-white-50">Terms of Service</a></li>
                        <li><a href="<?php echo base_url('refund'); ?>" class="text-white-50">Refund Policy</a></li>
                        <li><a href="<?php echo base_url('license'); ?>" class="text-white-50">License</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> Truly POS. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Made with <i class="fas fa-heart text-danger"></i> by InfortTech</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Newsletter Popup -->
    <div class="modal fade" id="newsletterModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subscribe to our Newsletter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Stay updated with the latest features, updates, and tips for your business.</p>
                    <form id="newsletterForm">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    
    <!-- Custom JavaScript for current page -->
    <?php if(isset($custom_js)): ?>
        <?php foreach($custom_js as $js): ?>
            <script src="<?php echo base_url($js); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
</body>
</html>
