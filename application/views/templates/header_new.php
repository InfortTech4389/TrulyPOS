<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Truly POS - Smart Billing & Inventory Software'; ?></title>
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Powerful inventory and billing solution for distribution and retail businesses. GST billing, barcode scanning, multi-location support.'; ?>">
    <meta name="keywords" content="POS software, billing software, inventory management, GST billing, barcode scanning, retail software, distribution software">
    <meta name="author" content="Truly POS">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo isset($title) ? $title : 'Truly POS - Smart Billing & Inventory Software'; ?>">
    <meta property="og:description" content="<?php echo isset($meta_description) ? $meta_description : 'Powerful inventory and billing solution for distribution and retail businesses.'; ?>">
    <meta property="og:image" content="<?php echo base_url('assets/images/trulypos-logo.png'); ?>">
    <meta property="og:url" content="<?php echo current_url(); ?>">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($title) ? $title : 'Truly POS - Smart Billing & Inventory Software'; ?>">
    <meta name="twitter:description" content="<?php echo isset($meta_description) ? $meta_description : 'Powerful inventory and billing solution for distribution and retail businesses.'; ?>">
    <meta name="twitter:image" content="<?php echo base_url('assets/images/trulypos-logo.png'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
    
    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    
    <!-- Custom CSS for current page -->
    <?php if(isset($custom_css)): ?>
        <?php foreach($custom_css as $css): ?>
            <link href="<?php echo base_url($css); ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('assets/images/trulypos-logo.png'); ?>" alt="Truly POS" height="40">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="industriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Who We Serve
                        </a>
                        <div class="dropdown-menu mega-menu" aria-labelledby="industriesDropdown">
                            <div class="mega-menu-container">
                                <!-- Left Panel: Categories -->
                                <div class="menu-categories">
                                    <div class="category-item active" data-category="apparel">
                                        <span>Apparel & Footwear</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                    <div class="category-item" data-category="electronics">
                                        <span>Electronics & Computers</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                    <div class="category-item" data-category="hypermarket">
                                        <span>Hypermarket & Departmental Stores</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                    <div class="category-item" data-category="lifestyle">
                                        <span>Lifestyle & Fashion</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                    <div class="category-item" data-category="pharma">
                                        <span>Pharma & Healthcare</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                    <div class="category-item" data-category="grocery">
                                        <span>Supermarket & Groceries</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                    <div class="category-item" data-category="specialized">
                                        <span>Specialized Retail</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                                
                                <!-- Right Panel: Subcategories -->
                                <div class="menu-subcategories">
                                    <!-- Apparel & Footwear Subcategories -->
                                    <div class="subcategory-group active" id="apparel-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-tshirt"></i>
                                                </div>
                                                <span>Apparel</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                                <span>Clothing</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-store"></i>
                                                </div>
                                                <span>Boutiques</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-mask"></i>
                                                </div>
                                                <span>Fancy Costume</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-shoe-prints"></i>
                                                </div>
                                                <span>Footwear</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-shopping-bag"></i>
                                                </div>
                                                <span>Readymade Garment</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-running"></i>
                                                </div>
                                                <span>Shoes</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-cut"></i>
                                                </div>
                                                <span>Textile</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Electronics & Computers Subcategories -->
                                    <div class="subcategory-group" id="electronics-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-camera"></i>
                                                </div>
                                                <span>Camera & Accessories</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-desktop"></i>
                                                </div>
                                                <span>Computer Hardware</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-bolt"></i>
                                                </div>
                                                <span>Electrical</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-microchip"></i>
                                                </div>
                                                <span>Electronics</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-home"></i>
                                                </div>
                                                <span>Home Appliances</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-mobile-alt"></i>
                                                </div>
                                                <span>Mobile & Accessories</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-gamepad"></i>
                                                </div>
                                                <span>Games & Accessories</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Hypermarket & Departmental Subcategories -->
                                    <div class="subcategory-group" id="hypermarket-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                <span>Hypermarket</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-store-alt"></i>
                                                </div>
                                                <span>Departmental Store</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </div>
                                                <span>Superstore</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-link"></i>
                                                </div>
                                                <span>Retail Chain</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-shopping-bag"></i>
                                                </div>
                                                <span>Shopping Mall</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-store"></i>
                                                </div>
                                                <span>Convenience Store</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Lifestyle & Fashion Subcategories -->
                                    <div class="subcategory-group" id="lifestyle-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-female"></i>
                                                </div>
                                                <span>Fashion Store</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-magic"></i>
                                                </div>
                                                <span>Beauty & Cosmetics</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-gem"></i>
                                                </div>
                                                <span>Jewelry</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-ring"></i>
                                                </div>
                                                <span>Accessories</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-heart"></i>
                                                </div>
                                                <span>Lifestyle Products</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-spa"></i>
                                                </div>
                                                <span>Wellness</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Pharma & Healthcare Subcategories -->
                                    <div class="subcategory-group" id="pharma-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-pills"></i>
                                                </div>
                                                <span>Pharmacy</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-clinic-medical"></i>
                                                </div>
                                                <span>Medical Store</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-heartbeat"></i>
                                                </div>
                                                <span>Healthcare Products</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-stethoscope"></i>
                                                </div>
                                                <span>Surgical Equipment</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-leaf"></i>
                                                </div>
                                                <span>Ayurvedic Store</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-tooth"></i>
                                                </div>
                                                <span>Dental Clinic</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Supermarket & Groceries Subcategories -->
                                    <div class="subcategory-group" id="grocery-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </div>
                                                <span>Supermarket</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-store"></i>
                                                </div>
                                                <span>Grocery Store</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </div>
                                                <span>Mini Market</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-leaf"></i>
                                                </div>
                                                <span>Organic Store</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-bread-slice"></i>
                                                </div>
                                                <span>Bakery</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-cheese"></i>
                                                </div>
                                                <span>Dairy Products</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!-- Specialized Retail Subcategories -->
                                    <div class="subcategory-group" id="specialized-subcategories">
                                        <div class="subcategory-grid">
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-book"></i>
                                                </div>
                                                <span>Books & Stationery</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <span>Sports & Fitness</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-puzzle-piece"></i>
                                                </div>
                                                <span>Toys & Games</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-car"></i>
                                                </div>
                                                <span>Automotive Parts</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-paw"></i>
                                                </div>
                                                <span>Pet Supplies</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-wrench"></i>
                                                </div>
                                                <span>Hardware & Tools</span>
                                            </a>
                                            <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcategory-item">
                                                <div class="subcategory-icon">
                                                    <i class="fas fa-tree"></i>
                                                </div>
                                                <span>Garden & Nursery</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('features'); ?>">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('demo'); ?>">Live Demo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('pricing'); ?>">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('contact'); ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('blog'); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('testimonials'); ?>">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="<?php echo base_url('buy'); ?>">Buy Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Flash Messages -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('warning'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('info')): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('info'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
