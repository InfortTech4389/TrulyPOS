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
            <img src="<?php echo base_url('assets/images/Trulylogo.jpg'); ?>" alt="Truly POS" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <!-- MEGA MENU DROPDOWN -->
                <li class="nav-item dropdown mega-dropdown" style="position: relative;">
                    <a class="nav-link dropdown-toggle" href="#" id="industriesDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Who We Serve
                    </a>
                    <div class="dropdown-menu mega-menu px-0 py-0 border-0 shadow" aria-labelledby="industriesDropdown">
                        <div class="mega-menu-inner d-flex" style="background: #fff;">
                            <!-- LEFT PANEL: CATEGORIES -->
                            <div class="mega-menu-cats border-end px-3 py-4" style="width: 260px;">
                                <ul class="list-unstyled mb-0" id="megaMenuCats">
                                    <li class="cat-link active" data-target="apparel">
                                        <i class="fas fa-tshirt me-2"></i> Apparel <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="electronics">
                                        <i class="fas fa-bolt me-2"></i> Electronics <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="hypermarket">
                                        <i class="fas fa-store me-2"></i> Hyperstores <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="lifestyle">
                                        <i class="fas fa-gem me-2"></i> Lifestyle <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="pharma">
                                        <i class="fas fa-pills me-2"></i> Pharma  <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="grocery">
                                        <i class="fas fa-shopping-basket me-2"></i> Supermarkets<span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="specialized">
                                        <i class="fas fa-puzzle-piece me-2"></i> Specialized Retail <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                    <li class="cat-link" data-target="multi-chain">
                                        <i class="fas fa-network-wired me-2"></i> Multi-Chain <span class="float-end text-muted"><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- RIGHT PANEL: SUBCATEGORIES -->
                            <div class="mega-menu-content px-4 py-4 flex-grow-1 style="width: 460px">
                                <!-- Apparel & Footwear -->
                                <div class="subcat-panel active" id="subcat-apparel">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-apparel"><i class="fas fa-tshirt"></i></span><span class="subcat-label">Apparel</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-clothing"><i class="fas fa-user-tie"></i></span><span class="subcat-label">Clothing</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-boutique"><i class="fas fa-store"></i></span><span class="subcat-label">Boutiques</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-fancy"><i class="fas fa-theater-masks"></i></span><span class="subcat-label">Fancy Costume</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-footwear"><i class="fas fa-shoe-prints"></i></span><span class="subcat-label">Footwear</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-readymade"><i class="fas fa-shopping-bag"></i></span><span class="subcat-label">Readymade Garment</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-shoes"><i class="fas fa-running"></i></span><span class="subcat-label">Shoes</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/apparel-footwear'); ?>" class="subcat-box"><span class="subcat-icon bg-textile"><i class="fas fa-cut"></i></span><span class="subcat-label">Textile</span></a></div>
                                    </div>
                                </div>
                                <!-- Electronics & Computers -->
                                <div class="subcat-panel" id="subcat-electronics">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-camera"></i></span><span class="subcat-label">Camera & Accessories</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-desktop"></i></span><span class="subcat-label">Computer Hardware</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-bolt"></i></span><span class="subcat-label">Electrical</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-microchip"></i></span><span class="subcat-label">Electronics</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-home"></i></span><span class="subcat-label">Home Appliances</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-mobile-alt"></i></span><span class="subcat-label">Mobile & Accessories</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/electronics-computers'); ?>" class="subcat-box"><span class="subcat-icon bg-electronics"><i class="fas fa-gamepad"></i></span><span class="subcat-label">Games & Accessories</span></a></div>
                                    </div>
                                </div>
                                <!-- Hypermarket & Departmental Stores -->
                                <div class="subcat-panel" id="subcat-hypermarket">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcat-box"><span class="subcat-icon bg-hyper"><i class="fas fa-building"></i></span><span class="subcat-label">Hypermarket</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcat-box"><span class="subcat-icon bg-hyper"><i class="fas fa-store-alt"></i></span><span class="subcat-label">Departmental Store</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcat-box"><span class="subcat-icon bg-hyper"><i class="fas fa-shopping-cart"></i></span><span class="subcat-label">Superstore</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcat-box"><span class="subcat-icon bg-hyper"><i class="fas fa-link"></i></span><span class="subcat-label">Retail Chain</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcat-box"><span class="subcat-icon bg-hyper"><i class="fas fa-shopping-bag"></i></span><span class="subcat-label">Shopping Mall</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/hypermarket-departmental'); ?>" class="subcat-box"><span class="subcat-icon bg-hyper"><i class="fas fa-store"></i></span><span class="subcat-label">Convenience Store</span></a></div>
                                    </div>
                                </div>
                                <!-- Lifestyle & Fashion -->
                                <div class="subcat-panel" id="subcat-lifestyle">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcat-box"><span class="subcat-icon bg-lifestyle"><i class="fas fa-female"></i></span><span class="subcat-label">Fashion Store</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcat-box"><span class="subcat-icon bg-lifestyle"><i class="fas fa-magic"></i></span><span class="subcat-label">Beauty & Cosmetics</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcat-box"><span class="subcat-icon bg-lifestyle"><i class="fas fa-gem"></i></span><span class="subcat-label">Jewelry</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcat-box"><span class="subcat-icon bg-lifestyle"><i class="fas fa-ring"></i></span><span class="subcat-label">Accessories</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcat-box"><span class="subcat-icon bg-lifestyle"><i class="fas fa-heart"></i></span><span class="subcat-label">Lifestyle Products</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/lifestyle-fashion'); ?>" class="subcat-box"><span class="subcat-icon bg-lifestyle"><i class="fas fa-spa"></i></span><span class="subcat-label">Wellness</span></a></div>
                                    </div>
                                </div>
                                <!-- Pharma & Healthcare -->
                                <div class="subcat-panel" id="subcat-pharma">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcat-box"><span class="subcat-icon bg-pharma"><i class="fas fa-pills"></i></span><span class="subcat-label">Pharmacy</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcat-box"><span class="subcat-icon bg-pharma"><i class="fas fa-clinic-medical"></i></span><span class="subcat-label">Medical Store</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcat-box"><span class="subcat-icon bg-pharma"><i class="fas fa-heartbeat"></i></span><span class="subcat-label">Healthcare Products</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcat-box"><span class="subcat-icon bg-pharma"><i class="fas fa-stethoscope"></i></span><span class="subcat-label">Surgical Equipment</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcat-box"><span class="subcat-icon bg-pharma"><i class="fas fa-leaf"></i></span><span class="subcat-label">Ayurvedic Store</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/pharma-healthcare'); ?>" class="subcat-box"><span class="subcat-icon bg-pharma"><i class="fas fa-tooth"></i></span><span class="subcat-label">Dental Clinic</span></a></div>
                                    </div>
                                </div>
                                <!-- Supermarket & Groceries -->
                                <div class="subcat-panel" id="subcat-grocery">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcat-box"><span class="subcat-icon bg-grocery"><i class="fas fa-shopping-basket"></i></span><span class="subcat-label">Supermarket</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcat-box"><span class="subcat-icon bg-grocery"><i class="fas fa-store"></i></span><span class="subcat-label">Grocery Store</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcat-box"><span class="subcat-icon bg-grocery"><i class="fas fa-shopping-cart"></i></span><span class="subcat-label">Mini Market</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcat-box"><span class="subcat-icon bg-grocery"><i class="fas fa-leaf"></i></span><span class="subcat-label">Organic Store</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcat-box"><span class="subcat-icon bg-grocery"><i class="fas fa-bread-slice"></i></span><span class="subcat-label">Bakery</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/supermarket-groceries'); ?>" class="subcat-box"><span class="subcat-icon bg-grocery"><i class="fas fa-cheese"></i></span><span class="subcat-label">Dairy Products</span></a></div>
                                    </div>
                                </div>
                                <!-- Specialized Retail -->
                                <div class="subcat-panel" id="subcat-specialized">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-book"></i></span><span class="subcat-label">Books & Stationery</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-dumbbell"></i></span><span class="subcat-label">Sports & Fitness</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-puzzle-piece"></i></span><span class="subcat-label">Toys & Games</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-car"></i></span><span class="subcat-label">Automotive Parts</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-paw"></i></span><span class="subcat-label">Pet Supplies</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-wrench"></i></span><span class="subcat-label">Hardware & Tools</span></a></div>
                                        <div class="col"><a href="<?php echo base_url('industries/specialized-retail'); ?>" class="subcat-box"><span class="subcat-icon bg-special"><i class="fas fa-tree"></i></span><span class="subcat-label">Garden & Nursery</span></a></div>
                                    </div>
                                </div>
                                <!-- Multi-Chain operations -->
                                <div class="subcat-panel" id="subcat-multi-chain">
                                    <div class="row row-cols-4 g-3">
                                        <div class="col"><a href="#" class="subcat-box"><span class="subcat-icon bg-multi"><i class="fas fa-network-wired"></i></span><span class="subcat-label">Franchise Stores</span></a></div>
                                        <div class="col"><a href="#" class="subcat-box"><span class="subcat-icon bg-multi"><i class="fas fa-store"></i></span><span class="subcat-label">Company-Owned Outlets</span></a></div>
                                        <div class="col"><a href="#" class="subcat-box"><span class="subcat-icon bg-multi"><i class="fas fa-globe"></i></span><span class="subcat-label">International Chains</span></a></div>
                                    </div>
                                </div>
                            </div><!-- mega-menu-content -->
                        </div><!-- mega-menu-inner -->
                    </div>
                </li>
                <!-- END MEGA MENU DROPDOWN -->
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
                    <a class="nav-link" href="<?php echo base_url('contact'); ?>">Contact</a>
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
