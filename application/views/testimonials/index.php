<!-- Main Content -->
<main class="main-content">
    <!-- Hero Section -->
    <section class="hero-section bg-gradient text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">Customer Testimonials</h1>
                    <p class="lead mb-4">Real stories from real businesses across India who have transformed their operations with Truly POS</p>
                    <div class="d-flex justify-content-center align-items-center gap-4">
                        <div class="text-center">
                            <h3 class="fw-bold mb-1">10,000+</h3>
                            <p class="mb-0">Happy Customers</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold mb-1">4.9/5</h3>
                            <p class="mb-0">Customer Rating</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold mb-1">99%</h3>
                            <p class="mb-0">Satisfaction Rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-3">Filter by Business Type:</h5>
                    <div class="testimonial-filters">
                        <button class="btn btn-outline-primary filter-btn active" data-filter="all">All</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="grocery">Grocery</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="fashion">Fashion</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="pharmacy">Pharmacy</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="electronics">Electronics</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="bookstore">Bookstore</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="mobile">Mobile Store</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="restaurant">Restaurant</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="others">Others</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row" id="testimonials-grid">
                <?php foreach($testimonials as $testimonial): ?>
                <div class="col-lg-4 col-md-6 mb-4 testimonial-item" data-category="<?php echo strtolower(str_replace(' ', '', $testimonial['category'])); ?>">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-header">
                            <div class="customer-info">
                                <div class="customer-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="customer-details">
                                    <h6 class="customer-name"><?php echo $testimonial['name']; ?></h6>
                                    <p class="business-name"><?php echo $testimonial['business']; ?></p>
                                    <p class="location"><?php echo $testimonial['location']; ?></p>
                                </div>
                            </div>
                            <div class="rating">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'text-warning' : 'text-muted'; ?>"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="testimonial-body">
                            <p class="testimonial-text"><?php echo $testimonial['review']; ?></p>
                            <div class="category-badge">
                                <span class="badge bg-primary"><?php echo $testimonial['category']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="mb-4">Ready to Transform Your Business?</h2>
                    <p class="lead mb-4">Join thousands of happy customers who have already revolutionized their business operations with Truly POS</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?php echo base_url('demo'); ?>" class="btn btn-light btn-lg">Try Live Demo</a>
                        <a href="<?php echo base_url('contact'); ?>" class="btn btn-outline-light btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Testimonials Page Styles */
.testimonial-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.filter-btn {
    border-radius: 20px;
    padding: 8px 16px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.filter-btn.active,
.filter-btn:hover {
    background-color: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.testimonial-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e9ecef;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.testimonial-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.customer-avatar {
    font-size: 40px;
    color: var(--primary-color);
}

.customer-details h6 {
    margin: 0;
    font-weight: 600;
    color: #333;
}

.business-name {
    font-weight: 500;
    color: var(--primary-color);
    margin: 2px 0;
    font-size: 14px;
}

.location {
    font-size: 12px;
    color: #666;
    margin: 0;
}

.rating {
    font-size: 14px;
}

.testimonial-body {
    position: relative;
}

.testimonial-text {
    font-size: 14px;
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.category-badge {
    display: flex;
    justify-content: flex-end;
}

.category-badge .badge {
    font-size: 11px;
    padding: 4px 8px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .testimonial-filters {
        justify-content: center;
    }
    
    .filter-btn {
        font-size: 12px;
        padding: 6px 12px;
    }
    
    .customer-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .customer-avatar {
        font-size: 30px;
    }
    
    .testimonial-card {
        padding: 15px;
    }
}

/* Animation for filtering */
.testimonial-item {
    transition: all 0.3s ease;
}

.testimonial-item.hidden {
    display: none;
}

.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const testimonialItems = document.querySelectorAll('.testimonial-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            testimonialItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (filterValue === 'all' || 
                    category === filterValue || 
                    (filterValue === 'mobile' && category === 'mobilestore') ||
                    (filterValue === 'restaurant' && category === 'café') ||
                    (filterValue === 'others' && !['grocery', 'fashion', 'pharmacy', 'electronics', 'bookstore', 'mobilestore', 'café'].includes(category))) {
                    item.classList.remove('hidden');
                    item.classList.add('fade-in');
                } else {
                    item.classList.add('hidden');
                    item.classList.remove('fade-in');
                }
            });
        });
    });
});
</script>
