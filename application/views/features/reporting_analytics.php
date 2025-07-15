<style>
.feature-hero {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
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
    border-left: 4px solid #007bff;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 1rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    border-left: 3px solid #ffc107;
}

.benefit-item i {
    color: #ffc107;
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
                    <i class="fas fa-chart-line me-3"></i>
                    Reporting & Analytics
                </h1>
                <p class="lead">Make data-driven decisions with comprehensive business reports, sales analytics, and financial insights. Get complete visibility into your business performance.</p>
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
                <h2 class="text-center mb-5">Comprehensive Business Reports</h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h5>Sales Reports</h5>
                    <p>Detailed sales analytics with trends, comparisons, and performance metrics to track your business growth.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Daily/Monthly/Yearly sales</li>
                        <li><i class="fas fa-check text-success me-2"></i>Sales trends analysis</li>
                        <li><i class="fas fa-check text-success me-2"></i>Product performance</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h5>Profit & Loss Report</h5>
                    <p>Complete P&L statements with cost analysis, gross margins, and net profit calculations for better financial planning.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Revenue analysis</li>
                        <li><i class="fas fa-check text-success me-2"></i>Cost breakdown</li>
                        <li><i class="fas fa-check text-success me-2"></i>Margin calculations</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h5>GST/Tax Reports</h5>
                    <p>GST-compliant reports for easy tax filing with detailed breakdowns by tax rates and HSN codes.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>GSTR-1 ready reports</li>
                        <li><i class="fas fa-check text-success me-2"></i>Tax liability summary</li>
                        <li><i class="fas fa-check text-success me-2"></i>HSN-wise reporting</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h5>Top-Selling Products</h5>
                    <p>Identify your best-performing products and categories to optimize inventory and marketing strategies.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Best selling items</li>
                        <li><i class="fas fa-check text-success me-2"></i>Category performance</li>
                        <li><i class="fas fa-check text-success me-2"></i>Slow-moving analysis</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h5>Stock Reports</h5>
                    <p>Current stock levels, valuation, and movement reports for effective inventory management.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Stock valuation</li>
                        <li><i class="fas fa-check text-success me-2"></i>Stock movement</li>
                        <li><i class="fas fa-check text-success me-2"></i>Aging analysis</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5>Custom Period Reports</h5>
                    <p>Generate reports for any date range with flexible filtering options to analyze specific periods.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Custom date ranges</li>
                        <li><i class="fas fa-check text-success me-2"></i>Comparative analysis</li>
                        <li><i class="fas fa-check text-success me-2"></i>Flexible filters</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <h5>Payment Reports</h5>
                    <p>Track all payment transactions, outstanding amounts, and payment method analysis.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Payment method analysis</li>
                        <li><i class="fas fa-check text-success me-2"></i>Outstanding tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Collection reports</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <h5>Register Reports</h5>
                    <p>Daily cash register reports with opening/closing balances and transaction summaries.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Register closure</li>
                        <li><i class="fas fa-check text-success me-2"></i>Cash flow tracking</li>
                        <li><i class="fas fa-check text-success me-2"></i>Shift summaries</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Benefits Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Business Intelligence Benefits</h2>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-lightbulb"></i>
                    <div>
                        <h6>Data-Driven Decisions</h6>
                        <p class="mb-0">Make informed decisions based on real business data</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <h6>Identify Opportunities</h6>
                        <p class="mb-0">Spot trends and opportunities for business growth</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-cogs"></i>
                    <div>
                        <h6>Optimize Operations</h6>
                        <p class="mb-0">Streamline operations based on performance insights</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-item">
                    <i class="fas fa-chart-pie"></i>
                    <div>
                        <h6>Financial Clarity</h6>
                        <p class="mb-0">Clear understanding of profitability and costs</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-file-export"></i>
                    <div>
                        <h6>Export Reports</h6>
                        <p class="mb-0">Export to Excel, PDF for further analysis</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h6>Real-time Insights</h6>
                        <p class="mb-0">Access up-to-date business metrics anytime</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Screenshots Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">Business Intelligence Dashboard</h2>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Sales Dashboard</h5>
                    <p>Real-time sales analytics</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>Profit Analysis</h5>
                    <p>Detailed profit and loss reports</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="screenshot-placeholder">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <h5>GST Reports</h5>
                    <p>Tax compliance reporting</p>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="row">
            <div class="col-12">
                <div class="cta-section">
                    <h3>Get Complete Business Insights</h3>
                    <p class="lead">Transform your data into actionable business intelligence</p>
                    <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-lg me-3">Try Free Demo</a>
                    <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-primary btn-lg">View Pricing</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
