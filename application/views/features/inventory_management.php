<style>
.feature-hero {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
    border-left: 4px solid #28a745;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 2.5rem;
    color: #28a745;
    margin-bottom: 1rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    border-left: 3px solid #dc3545;
}

.benefit-item i {
    color: #dc3545;
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
                    <i class="fas fa-boxes me-3"></i>
                    Inventory & Stock Management
                </h1>
                <p class="lead">Complete inventory control with real-time tracking, automated alerts, and comprehensive stock management features. Never run out of stock or overstock again.</p>
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
                <h2 class="text-center mb-5">Advanced Inventory Management Features</h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h5>Real-time Stock Updates</h5>
                    <p>Instant stock updates across all locations when items are sold, purchased, or transferred. Never lose track of your inventory.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Automatic stock deduction</li>
                        <li><i class="fas fa-check text-success me-2"></i>Multi-location sync</li>
                        <li><i class="fas fa-check text-success me-2"></i>Live inventory dashboard</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h5>Low Stock Alerts</h5>
                    <p>Set minimum stock levels and get automated alerts when inventory runs low. Prevent stockouts and maintain optimal inventory levels.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Customizable alert thresholds</li>
                        <li><i class="fas fa-check text-success me-2"></i>Email & SMS notifications</li>
                        <li><i class="fas fa-check text-success me-2"></i>Reorder point suggestions</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h5>Multi-Unit Stock</h5>
                    <p>Manage products with multiple units (box, pieces, kg, liters) and automatic unit conversions for accurate inventory tracking.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Multiple unit definitions</li>
                        <li><i class="fas fa-check text-success me-2"></i>Automatic conversions</li>
                        <li><i class="fas fa-check text-success me-2"></i>Unit-wise pricing</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h5>Stock Adjustment</h5>
                    <p>Easily adjust stock levels for damaged goods, theft, or physical count corrections. Maintain accurate inventory records.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Bulk adjustments</li>
                        <li><i class="fas fa-check text-success me-2"></i>Reason tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Approval workflow</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <h5>Expiry Management</h5>
                    <p>Track product expiry dates and get alerts for items nearing expiration. Reduce wastage and ensure product quality.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Expiry date tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>FIFO/LIFO support</li>
                        <li><i class="fas fa-check text-success me-2"></i>Expiry alerts</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-barcode"></i>
                    </div>
                    <h5>Barcode Management</h5>
                    <p>Generate and print barcode labels for all products. Fast scanning for quick billing and inventory operations.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Barcode generation</li>
                        <li><i class="fas fa-check text-success me-2"></i>Label printing</li>
                        <li><i class="fas fa-check text-success me-2"></i>Scanner integration</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h5>Batch & Lot Tracking</h5>
                    <p>Track products by batch numbers and lot codes for better traceability and quality control. Essential for regulated industries.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Batch number tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Lot code management</li>
                        <li><i class="fas fa-check text-success me-2"></i>Traceability reports</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Benefits Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Inventory Management Benefits</h2>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-chart-line"></i>
                    <div>
                        <h6>Reduced Stockouts</h6>
                        <p class="mb-0">Automated alerts prevent stockouts and lost sales</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-dollar-sign"></i>
                    <div>
                        <h6>Lower Inventory Costs</h6>
                        <p class="mb-0">Optimize stock levels and reduce carrying costs</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h6>Accurate Tracking</h6>
                        <p class="mb-0">Real-time accuracy with automated updates</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h6>Time Savings</h6>
                        <p class="mb-0">Automated processes save hours of manual work</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-eye"></i>
                    <div>
                        <h6>Better Visibility</h6>
                        <p class="mb-0">Complete visibility across all locations</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-recycle"></i>
                    <div>
                        <h6>Reduced Waste</h6>
                        <p class="mb-0">Expiry management reduces product wastage</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Screenshots Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Inventory Management Interface</h2>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Stock Overview</h5>
                    <p>Real-time inventory dashboard</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Low Stock Alerts</h5>
                    <p>Automated alert system</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Barcode Generator</h5>
                    <p>Generate and print barcodes</p>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="row">
            <div class="col-12">
                <div class="cta-section">
                    <h3>Take Control of Your Inventory Today</h3>
                    <p class="lead">Experience advanced inventory management with real-time tracking</p>
                    <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-lg me-3">Try Free Demo</a>
                    <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-primary btn-lg">View Pricing</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
