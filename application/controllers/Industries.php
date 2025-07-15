<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industries extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Who We Serve - Industries - TrulyPOS';
        $data['meta_description'] = 'Truly POS supports businesses across industries. Explore industry-specific solutions designed for your business needs.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/index', $data);
        $this->load->view('templates/footer');
    }

    public function apparel_footwear()
    {
        $data['title'] = 'Apparel & Footwear POS Solutions - TrulyPOS';
        $data['meta_description'] = 'Complete POS solution for apparel, clothing, boutiques, footwear, and textile businesses. Manage inventory, sizes, colors, and seasonal collections.';
        $data['industry'] = 'Apparel & Footwear';
        $data['industry_type'] = 'apparel';
        $data['icon'] = 'fas fa-tshirt';
        $data['businesses'] = [
            'Apparel' => ['icon' => 'fas fa-tshirt', 'description' => 'Complete apparel management'],
            'Clothing' => ['icon' => 'fas fa-user-tie', 'description' => 'Clothing store solutions'],
            'Boutiques' => ['icon' => 'fas fa-store', 'description' => 'Boutique management system'],
            'Fancy Costume' => ['icon' => 'fas fa-mask', 'description' => 'Costume rental tracking'],
            'Footwear' => ['icon' => 'fas fa-shoe-prints', 'description' => 'Shoe store management'],
            'Readymade Garment' => ['icon' => 'fas fa-shopping-bag', 'description' => 'Garment wholesale'],
            'Shoes' => ['icon' => 'fas fa-running', 'description' => 'Shoe retail solutions'],
            'Textile' => ['icon' => 'fas fa-cut', 'description' => 'Textile business management']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function electronics_computers()
    {
        $data['title'] = 'Electronics & Computers POS Solutions - TrulyPOS';
        $data['meta_description'] = 'POS system for electronics, computers, mobile phones, and technology retail businesses. Manage warranties, serial numbers, and repairs.';
        $data['industry'] = 'Electronics & Computers';
        $data['industry_type'] = 'electronics';
        $data['icon'] = 'fas fa-laptop';
        $data['businesses'] = [
            'Camera & Accessories' => ['icon' => 'fas fa-camera', 'description' => 'Camera store management'],
            'Computer Hardware' => ['icon' => 'fas fa-desktop', 'description' => 'Hardware retail solutions'],
            'Electrical' => ['icon' => 'fas fa-plug', 'description' => 'Electrical goods tracking'],
            'Electronics' => ['icon' => 'fas fa-microchip', 'description' => 'Electronics retail system'],
            'Home Appliances' => ['icon' => 'fas fa-blender', 'description' => 'Appliance store management'],
            'Mobile Phone & Accessories' => ['icon' => 'fas fa-mobile-alt', 'description' => 'Mobile retail solutions'],
            'Videos & Games Accessories' => ['icon' => 'fas fa-gamepad', 'description' => 'Gaming accessories tracking']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hypermarket_departmental()
    {
        $data['title'] = 'Hypermarket & Departmental Store POS - TrulyPOS';
        $data['meta_description'] = 'Advanced POS system for hypermarkets, departmental stores, and large retail chains. Multi-location, bulk inventory, and complex billing.';
        $data['industry'] = 'Hypermarket & Departmental';
        $data['industry_type'] = 'hypermarket';
        $data['icon'] = 'fas fa-building';
        $data['businesses'] = [
            'Hypermarket' => ['icon' => 'fas fa-store-alt', 'description' => 'Large format retail'],
            'Departmental Store' => ['icon' => 'fas fa-shopping-cart', 'description' => 'Multi-department management'],
            'Superstore' => ['icon' => 'fas fa-warehouse', 'description' => 'Superstore operations'],
            'Retail Chain' => ['icon' => 'fas fa-link', 'description' => 'Chain store management'],
            'Shopping Mall' => ['icon' => 'fas fa-university', 'description' => 'Mall tenant management'],
            'Convenience Store' => ['icon' => 'fas fa-store', 'description' => 'Quick retail solutions']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function lifestyle_fashion()
    {
        $data['title'] = 'Lifestyle & Fashion POS Solutions - TrulyPOS';
        $data['meta_description'] = 'POS system for lifestyle, fashion, beauty, and wellness businesses. Manage trends, seasonal inventory, and customer preferences.';
        $data['industry'] = 'Lifestyle & Fashion';
        $data['industry_type'] = 'lifestyle';
        $data['icon'] = 'fas fa-gem';
        $data['businesses'] = [
            'Fashion Store' => ['icon' => 'fas fa-female', 'description' => 'Fashion retail management'],
            'Beauty & Cosmetics' => ['icon' => 'fas fa-magic', 'description' => 'Beauty product tracking'],
            'Jewelry' => ['icon' => 'fas fa-gem', 'description' => 'Jewelry inventory system'],
            'Accessories' => ['icon' => 'fas fa-ring', 'description' => 'Fashion accessories'],
            'Lifestyle Products' => ['icon' => 'fas fa-heart', 'description' => 'Lifestyle merchandise'],
            'Wellness' => ['icon' => 'fas fa-spa', 'description' => 'Wellness product management']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function pharma_healthcare()
    {
        $data['title'] = 'Pharma & Healthcare POS Solutions - TrulyPOS';
        $data['meta_description'] = 'Specialized POS for pharmacies, medical stores, and healthcare businesses. Manage prescriptions, expiry dates, and medical inventory.';
        $data['industry'] = 'Pharma & Healthcare';
        $data['industry_type'] = 'pharma';
        $data['icon'] = 'fas fa-pills';
        $data['businesses'] = [
            'Pharmacy' => ['icon' => 'fas fa-pills', 'description' => 'Pharmacy management system'],
            'Medical Store' => ['icon' => 'fas fa-clinic-medical', 'description' => 'Medical retail solutions'],
            'Healthcare Products' => ['icon' => 'fas fa-heartbeat', 'description' => 'Healthcare merchandise'],
            'Surgical Equipment' => ['icon' => 'fas fa-stethoscope', 'description' => 'Medical equipment tracking'],
            'Ayurvedic Store' => ['icon' => 'fas fa-leaf', 'description' => 'Ayurvedic medicine management'],
            'Dental Clinic' => ['icon' => 'fas fa-tooth', 'description' => 'Dental practice management']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function supermarket_groceries()
    {
        $data['title'] = 'Supermarket & Groceries POS Solutions - TrulyPOS';
        $data['meta_description'] = 'Complete POS solution for supermarkets, grocery stores, and food retail. Manage perishables, bulk items, and quick billing.';
        $data['industry'] = 'Supermarket & Groceries';
        $data['industry_type'] = 'supermarket';
        $data['icon'] = 'fas fa-shopping-basket';
        $data['businesses'] = [
            'Supermarket' => ['icon' => 'fas fa-shopping-basket', 'description' => 'Supermarket management'],
            'Grocery Store' => ['icon' => 'fas fa-apple-alt', 'description' => 'Grocery retail solutions'],
            'Mini Market' => ['icon' => 'fas fa-store', 'description' => 'Small format retail'],
            'Organic Store' => ['icon' => 'fas fa-seedling', 'description' => 'Organic products tracking'],
            'Bakery' => ['icon' => 'fas fa-bread-slice', 'description' => 'Bakery management system'],
            'Dairy Products' => ['icon' => 'fas fa-cheese', 'description' => 'Dairy business solutions']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function specialized_retail()
    {
        $data['title'] = 'Specialized Retail POS Solutions - TrulyPOS';
        $data['meta_description'] = 'POS solutions for specialized retail businesses including books, sports, toys, automotive, and niche markets.';
        $data['industry'] = 'Specialized Retail';
        $data['industry_type'] = 'specialized';
        $data['icon'] = 'fas fa-cogs';
        $data['businesses'] = [
            'Books & Stationery' => ['icon' => 'fas fa-book', 'description' => 'Bookstore management'],
            'Sports & Fitness' => ['icon' => 'fas fa-dumbbell', 'description' => 'Sports equipment tracking'],
            'Toys & Games' => ['icon' => 'fas fa-puzzle-piece', 'description' => 'Toy store solutions'],
            'Automotive Parts' => ['icon' => 'fas fa-car', 'description' => 'Auto parts management'],
            'Pet Supplies' => ['icon' => 'fas fa-paw', 'description' => 'Pet store solutions'],
            'Hardware & Tools' => ['icon' => 'fas fa-wrench', 'description' => 'Hardware store management'],
            'Garden & Nursery' => ['icon' => 'fas fa-tree', 'description' => 'Garden center solutions']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    public function restaurant()
    {
        $data['title'] = 'Restaurant POS Solutions - TrulyPOS';
        $data['meta_description'] = 'Modern POS software designed for restaurants, bakeries, bars, quick-service outlets, and food delivery businesses. Manage orders, billing, kitchen, and inventory with ease.';
        $data['industry'] = 'Restaurant';
        $data['industry_type'] = 'restaurant';
        $data['icon'] = 'fas fa-utensils';
        $data['businesses'] = [
            'Restaurant' => ['icon' => 'fas fa-utensils', 'description' => 'All-in-one POS for dine-in, take-away, and delivery'],
            'Bakery & Sweet Shop' => ['icon' => 'fas fa-birthday-cake', 'description' => 'Quick billing for cakes, sweets, and snacks'],
            'Bars & Breweries' => ['icon' => 'fas fa-beer', 'description' => 'Manage bar tabs, split bills, and stock management'],
            'Delivery / Take Away' => ['icon' => 'fas fa-truck', 'description' => 'Integrated online orders and delivery tracking'],
            'Quick Service Restaurant' => ['icon' => 'fas fa-fast-forward', 'description' => 'Lightning-fast order entry and express billing'],
            'Multi-Chain Operations' => ['icon' => 'fas fa-network-wired', 'description' => 'Centralized menu and chain-level management']
        ];
        
        // Restaurant-specific pricing plans
        $data['restaurant_plans'] = [
            [
                'name' => 'Essentials',
                'price' => '₹8,000',
                'period' => 'year',
                'monthly_price' => '₹800',
                'description' => 'Perfect for small cafes, bakeries, and sweet shops',
                'popular' => false,
                'features' => [
                    'Table & Counter Management',
                    'Basic KOT Printing',
                    'Menu Management',
                    'Basic Billing',
                    'Inventory Tracking',
                    'GST Compliance',
                    'Email Support'
                ]
            ],
            [
                'name' => 'Pro',
                'price' => '₹15,000',
                'period' => 'year',
                'monthly_price' => '₹1,500',
                'description' => 'Ideal for busy dine-in, QSR, and delivery outlets',
                'popular' => true,
                'features' => [
                    'All Essentials features',
                    'Online Order Integration',
                    'Recipe Management',
                    'Menu Modifiers & Combos',
                    'Kitchen Display System',
                    'Split Bills & Discounts',
                    'CRM & Loyalty Program',
                    'WhatsApp Support'
                ]
            ],
            [
                'name' => 'Premium',
                'price' => '₹25,000',
                'period' => 'year',
                'monthly_price' => '₹2,500',
                'description' => 'Advanced automation for multi-location restaurants',
                'popular' => false,
                'features' => [
                    'All Pro features',
                    'Multi-location Management',
                    'Advanced Analytics',
                    'Automated Inventory Alerts',
                    'SMS/WhatsApp Notifications',
                    'Staff Management',
                    'Priority Support'
                ]
            ],
            [
                'name' => 'Enterprise',
                'price' => 'Custom Quote',
                'period' => '',
                'monthly_price' => 'Custom Quote',
                'description' => 'Custom solutions for chains and franchises',
                'popular' => false,
                'features' => [
                    'All Premium features',
                    'Custom Integrations',
                    'API Access',
                    'Dedicated Account Manager',
                    'On-site Training',
                    'SLA-based Support',
                    'Custom Development'
                ]
            ]
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('industries/detail', $data);
        $this->load->view('templates/footer');
    }

    // Method to get industry data for menu
    public function get_industry_data()
    {
        return [
            'Apparel & Footwear' => [
                'icon' => 'fas fa-tshirt',
                'businesses' => ['Apparel', 'Clothing', 'Boutiques', 'Fancy Costume', 'Footwear', 'Readymade Garment', 'Shoes', 'Textile']
            ],
            'Electronics & Computers' => [
                'icon' => 'fas fa-laptop',
                'businesses' => ['Camera & Accessories', 'Computer Hardware', 'Electrical', 'Electronics', 'Home Appliances', 'Mobile Phone & Accessories', 'Videos & Games Accessories']
            ],
            'Hypermarket & Departmental' => [
                'icon' => 'fas fa-building',
                'businesses' => ['Hypermarket', 'Departmental Store', 'Superstore', 'Retail Chain', 'Shopping Mall', 'Convenience Store']
            ],
            'Lifestyle & Fashion' => [
                'icon' => 'fas fa-gem',
                'businesses' => ['Fashion Store', 'Beauty & Cosmetics', 'Jewelry', 'Accessories', 'Lifestyle Products', 'Wellness']
            ],
            'Pharma & Healthcare' => [
                'icon' => 'fas fa-pills',
                'businesses' => ['Pharmacy', 'Medical Store', 'Healthcare Products', 'Surgical Equipment', 'Ayurvedic Store', 'Dental Clinic']
            ],
            'Supermarket & Groceries' => [
                'icon' => 'fas fa-shopping-basket',
                'businesses' => ['Supermarket', 'Grocery Store', 'Mini Market', 'Organic Store', 'Bakery', 'Dairy Products']
            ],
            'Specialized Retail' => [
                'icon' => 'fas fa-cogs',
                'businesses' => ['Books & Stationery', 'Sports & Fitness', 'Toys & Games', 'Automotive Parts', 'Pet Supplies', 'Hardware & Tools', 'Garden & Nursery']
            ],
            'Restaurant' => [
                'icon' => 'fas fa-utensils',
                'businesses' => ['Restaurant', 'Bakery & Sweet Shop', 'Bars & Breweries', 'Delivery / Take Away', 'Quick Service Restaurant', 'Multi-Chain Operations']
            ]
        ];
    }
}
