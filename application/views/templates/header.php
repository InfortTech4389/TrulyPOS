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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="industriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Who We Serve
                        </a>
                        <div class="dropdown-menu mega-menu" aria-labelledby="industriesDropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Industries</h6>
                                        <div class="industry-menu-list">
                                            <a class="dropdown-item industry-item active" href="#" data-industry="apparel">
                                                <i class="fas fa-tshirt me-2"></i>Apparel & Footwear
                                            </a>
                                            <a class="dropdown-item industry-item" href="#" data-industry="electronics">
                                                <i class="fas fa-laptop me-2"></i>Electronics & Computers
                                            </a>
                                            <a class="dropdown-item industry-item" href="#" data-industry="hypermarket">
                                                <i class="fas fa-building me-2"></i>Hypermarket & Departmental
                                            </a>
                                            <a class="dropdown-item industry-item" href="#" data-industry="lifestyle">
                                                <i class="fas fa-gem me-2"></i>Lifestyle & Fashion
                                            </a>
                                            <a class="dropdown-item industry-item" href="#" data-industry="pharma">
                                                <i class="fas fa-pills me-2"></i>Pharma & Healthcare
                                            </a>
                                            <a class="dropdown-item industry-item" href="#" data-industry="grocery">
                                                <i class="fas fa-shopping-basket me-2"></i>Supermarket & Groceries
                                            </a>
                                            <a class="dropdown-item industry-item" href="#" data-industry="specialized">
                                                <i class="fas fa-cogs me-2"></i>Specialized Retail
                                            </a>
                                        </div>
                                        <hr>
                                        <a class="dropdown-item text-primary fw-bold" href="<?php echo base_url('industries'); ?>">
                                            <i class="fas fa-arrow-right me-2"></i>View All Industries
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="business-types-grid">
                                            <!-- Apparel & Footwear -->
                                            <div class="business-category active" id="apparel-businesses">
                                                <h6 class="dropdown-header">Apparel & Footwear Businesses</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-tshirt"></i>
                                                                <span>Apparel</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-user-tie"></i>
                                                                <span>Clothing</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-store"></i>
                                                                <span>Boutiques</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-mask"></i>
                                                                <span>Fancy Costume</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-shoe-prints"></i>
                                                                <span>Footwear</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-shopping-bag"></i>
                                                                <span>Readymade Garment</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-dark text-white">
                                                                <i class="fas fa-running"></i>
                                                                <span>Shoes</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-muted text-white">
                                                                <i class="fas fa-cut"></i>
                                                                <span>Textile</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Electronics & Computers -->
                                            <div class="business-category" id="electronics-businesses">
                                                <h6 class="dropdown-header">Electronics & Computers</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-camera"></i>
                                                                <span>Camera & Accessories</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-desktop"></i>
                                                                <span>Computer Hardware</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-plug"></i>
                                                                <span>Electrical</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-microchip"></i>
                                                                <span>Electronics</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-blender"></i>
                                                                <span>Home Appliances</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-mobile-alt"></i>
                                                                <span>Mobile & Accessories</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/electronics-computers'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-dark text-white">
                                                                <i class="fas fa-gamepad"></i>
                                                                <span>Videos & Games</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Hypermarket & Departmental -->
                                            <div class="business-category" id="hypermarket-businesses">
                                                <h6 class="dropdown-header">Hypermarket & Departmental</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-store-alt"></i>
                                                                <span>Hypermarket</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-shopping-cart"></i>
                                                                <span>Departmental Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-warehouse"></i>
                                                                <span>Superstore</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-link"></i>
                                                                <span>Retail Chain</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-university"></i>
                                                                <span>Shopping Mall</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-store"></i>
                                                                <span>Convenience Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Lifestyle & Fashion -->
                                            <div class="business-category" id="lifestyle-businesses">
                                                <h6 class="dropdown-header">Lifestyle & Fashion</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-female"></i>
                                                                <span>Fashion Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-magic"></i>
                                                                <span>Beauty & Cosmetics</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-gem"></i>
                                                                <span>Jewelry</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-ring"></i>
                                                                <span>Accessories</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-heart"></i>
                                                                <span>Lifestyle Products</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-spa"></i>
                                                                <span>Wellness</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Pharma & Healthcare -->
                                            <div class="business-category" id="pharma-businesses">
                                                <h6 class="dropdown-header">Pharma & Healthcare</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-pills"></i>
                                                                <span>Pharmacy</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-clinic-medical"></i>
                                                                <span>Medical Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-heartbeat"></i>
                                                                <span>Healthcare Products</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-stethoscope"></i>
                                                                <span>Surgical Equipment</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-leaf"></i>
                                                                <span>Ayurvedic Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-tooth"></i>
                                                                <span>Dental Clinic</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Supermarket & Groceries -->
                                            <div class="business-category" id="grocery-businesses">
                                                <h6 class="dropdown-header">Supermarket & Groceries</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-shopping-basket"></i>
                                                                <span>Supermarket</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-apple-alt"></i>
                                                                <span>Grocery Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-store"></i>
                                                                <span>Mini Market</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-seedling"></i>
                                                                <span>Organic Store</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-bread-slice"></i>
                                                                <span>Bakery</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-cheese"></i>
                                                                <span>Dairy Products</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Specialized Retail -->
                                            <div class="business-category" id="specialized-businesses">
                                                <h6 class="dropdown-header">Specialized Retail</h6>
                                                <div class="row g-2">
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-primary text-white">
                                                                <i class="fas fa-book"></i>
                                                                <span>Books & Stationery</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-success text-white">
                                                                <i class="fas fa-dumbbell"></i>
                                                                <span>Sports & Fitness</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-warning text-white">
                                                                <i class="fas fa-puzzle-piece"></i>
                                                                <span>Toys & Games</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-danger text-white">
                                                                <i class="fas fa-car"></i>
                                                                <span>Automotive Parts</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-info text-white">
                                                                <i class="fas fa-paw"></i>
                                                                <span>Pet Supplies</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-secondary text-white">
                                                                <i class="fas fa-wrench"></i>
                                                                <span>Hardware & Tools</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="<?php echo base_url('industries/specialized-retail'); ?>" class="business-type-link">
                                                            <div class="business-type-card bg-dark text-white">
                                                                <i class="fas fa-tree"></i>
                                                                <span>Garden & Nursery</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
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
