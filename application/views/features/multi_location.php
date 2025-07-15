<style>
.feature-hero {
    background: linear-gradient(135deg, #fd7e14 0%, #e55a10 100%);
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
    border-left: 4px solid #fd7e14;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 2.5rem;
    color: #fd7e14;
    margin-bottom: 1rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    border-left: 3px solid #17a2b8;
}

.benefit-item i {
    color: #17a2b8;
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
                    <i class="fas fa-store me-3"></i>
                    Multi-Store & Multi-Location
                </h1>
                <p class="lead">Scale your business across multiple locations with centralized control, real-time synchronization, and seamless stock transfers between stores and warehouses.</p>
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
                <h2 class="text-center mb-5">Multi-Location Management Features</h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h5>Unlimited Locations</h5>
                    <p>Manage unlimited stores, warehouses, and business locations from a single dashboard with centralized control.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Multiple stores management</li>
                        <li><i class="fas fa-check text-success me-2"></i>Warehouse integration</li>
                        <li><i class="fas fa-check text-success me-2"></i>Centralized dashboard</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Location-wise Tracking</h5>
                    <p>Track stock levels, sales performance, and financial metrics separately for each location while maintaining overall visibility.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Location-wise inventory</li>
                        <li><i class="fas fa-check text-success me-2"></i>Sales by location</li>
                        <li><i class="fas fa-check text-success me-2"></i>Performance comparison</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h5>Stock Transfers</h5>
                    <p>Seamlessly transfer stock between locations with automated inventory updates and transfer tracking.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Easy transfer process</li>
                        <li><i class="fas fa-check text-success me-2"></i>Real-time updates</li>
                        <li><i class="fas fa-check text-success me-2"></i>Transfer history</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <h5>Real-time Sync</h5>
                    <p>All location data synchronizes in real-time, ensuring accurate inventory and sales information across all stores.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Live synchronization</li>
                        <li><i class="fas fa-check text-success me-2"></i>Conflict resolution</li>
                        <li><i class="fas fa-check text-success me-2"></i>Offline capability</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h5>Location-based Roles</h5>
                    <p>Assign users to specific locations with role-based permissions and access control for each store.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Location-specific access</li>
                        <li><i class="fas fa-check text-success me-2"></i>Role-based permissions</li>
                        <li><i class="fas fa-check text-success me-2"></i>Manager hierarchy</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-area"></i>
                    </div>
                    <h5>Consolidated Reports</h5>
                    <p>Generate consolidated reports across all locations or individual location reports for detailed analysis.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Cross-location reports</li>
                        <li><i class="fas fa-check text-success me-2"></i>Location comparisons</li>
                        <li><i class="fas fa-check text-success me-2"></i>Performance metrics</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Benefits Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Multi-Location Benefits</h2>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-expand-arrows-alt"></i>
                    <div>
                        <h6>Scalable Growth</h6>
                        <p class="mb-0">Easily add new locations without complexity</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-eye"></i>
                    <div>
                        <h6>Complete Visibility</h6>
                        <p class="mb-0">Real-time view of all locations from one dashboard</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-balance-scale"></i>
                    <div>
                        <h6>Optimized Inventory</h6>
                        <p class="mb-0">Balance stock across locations efficiently</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h6>Data Security</h6>
                        <p class="mb-0">Secure data sharing with access controls</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h6>Time Savings</h6>
                        <p class="mb-0">Centralized management saves operational time</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-chart-line"></i>
                    <div>
                        <h6>Better Performance</h6>
                        <p class="mb-0">Compare and improve location performance</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Screenshots Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Multi-Location Dashboard</h2>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Location Dashboard</h5>
                    <p>Centralized multi-location overview</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Stock Transfer</h5>
                    <p>Inter-location stock transfer interface</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Performance Reports</h5>
                    <p>Location-wise performance comparison</p>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="row">
            <div class="col-12">
                <div class="cta-section">
                    <h3>Scale Your Business Across Multiple Locations</h3>
                    <p class="lead">Experience seamless multi-location management with centralized control</p>
                    <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-lg me-3">Try Free Demo</a>
                    <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-primary btn-lg">View Pricing</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
