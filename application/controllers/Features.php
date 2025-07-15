<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Features extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        redirect('home/features');
    }

    public function sales_billing()
    {
        $data['title'] = 'Sales & Billing Features - TrulyPOS';
        $data['meta_description'] = 'Complete POS invoicing, billing, and payment management features for efficient sales operations.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/sales_billing', $data);
        $this->load->view('templates/footer');
    }

    public function purchases_vendors()
    {
        $data['title'] = 'Purchases & Vendors Features - TrulyPOS';
        $data['meta_description'] = 'Comprehensive purchase management, supplier database, and vendor relationship features.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/purchases_vendors', $data);
        $this->load->view('templates/footer');
    }

    public function inventory_management()
    {
        $data['title'] = 'Inventory & Stock Management Features - TrulyPOS';
        $data['meta_description'] = 'Real-time inventory tracking, stock alerts, barcode scanning, and warehouse management.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/inventory_management', $data);
        $this->load->view('templates/footer');
    }

    public function multi_location()
    {
        $data['title'] = 'Multi-Store & Multi-Location Features - TrulyPOS';
        $data['meta_description'] = 'Manage unlimited business locations, warehouses, and transfer stock between locations.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/multi_location', $data);
        $this->load->view('templates/footer');
    }

    public function customer_management()
    {
        $data['title'] = 'Customer Management & CRM Features - TrulyPOS';
        $data['meta_description'] = 'Complete customer database, credit management, loyalty programs, and CRM features.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/customer_management', $data);
        $this->load->view('templates/footer');
    }

    public function reporting_analytics()
    {
        $data['title'] = 'Reporting & Analytics Features - TrulyPOS';
        $data['meta_description'] = 'Comprehensive business reports, sales analytics, profit analysis, and GST reporting.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/reporting_analytics', $data);
        $this->load->view('templates/footer');
    }

    public function accounting()
    {
        $data['title'] = 'Expenses & Accounting Features - TrulyPOS';
        $data['meta_description'] = 'Complete expense management, cash flow tracking, and accounting features.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/accounting', $data);
        $this->load->view('templates/footer');
    }

    public function products_catalog()
    {
        $data['title'] = 'Products & Catalog Features - TrulyPOS';
        $data['meta_description'] = 'Product management, categories, brands, variable products, and catalog features.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/products_catalog', $data);
        $this->load->view('templates/footer');
    }

    public function user_management()
    {
        $data['title'] = 'User & Role Management Features - TrulyPOS';
        $data['meta_description'] = 'Multiple user roles, permissions, access control, and employee management.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/user_management', $data);
        $this->load->view('templates/footer');
    }

    public function hardware_integration()
    {
        $data['title'] = 'POS & Hardware Integration Features - TrulyPOS';
        $data['meta_description'] = 'Barcode scanners, printers, cash drawers, and POS hardware integration.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/hardware_integration', $data);
        $this->load->view('templates/footer');
    }

    public function taxation_compliance()
    {
        $data['title'] = 'Taxation & Compliance Features - TrulyPOS';
        $data['meta_description'] = 'GST compliance, tax management, HSN codes, and digital signatures.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/taxation_compliance', $data);
        $this->load->view('templates/footer');
    }

    public function mobile_online()
    {
        $data['title'] = 'Online & Mobile Features - TrulyPOS';
        $data['meta_description'] = 'Progressive Web App, Android app, and cloud deployment options.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/mobile_online', $data);
        $this->load->view('templates/footer');
    }

    public function integrations()
    {
        $data['title'] = 'Add-ons & Integrations Features - TrulyPOS';
        $data['meta_description'] = 'E-commerce integration, SMS, WhatsApp, KOT, and third-party integrations.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/integrations', $data);
        $this->load->view('templates/footer');
    }

    public function other_features()
    {
        $data['title'] = 'Other Features - TrulyPOS';
        $data['meta_description'] = 'Import/export, custom fields, document uploads, and additional features.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/other_features', $data);
        $this->load->view('templates/footer');
    }

    public function support_security()
    {
        $data['title'] = 'Support & Security Features - TrulyPOS';
        $data['meta_description'] = 'Data backup, security features, updates, and customer support.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('features/support_security', $data);
        $this->load->view('templates/footer');
    }
}
