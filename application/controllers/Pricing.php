<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Pricing Plans - TrulyPOS';
        $data['meta_description'] = 'Choose the perfect TrulyPOS package for your retail, distribution, pharmacy, or grocery business. Compare features and pricing for all plans.';
        
        // Retail/Distribution pricing plans
        $data['plans'] = [
            [
                'name' => 'Starter',
                'price' => '₹6,000',
                'period' => 'year',
                'monthly_price' => '₹600',
                'outlets' => 1,
                'users' => 2,
                'popular' => false,
                'features' => [
                    'Core POS & Billing',
                    'GST Invoicing',
                    'Basic Inventory',
                    'Unlimited Invoices',
                    'Customer Database',
                    'Basic Reports',
                    'Email Support'
                ],
                'button_text' => 'Start Free Trial',
                'button_class' => 'btn-outline-primary'
            ],
            [
                'name' => 'Growth',
                'price' => '₹12,000',
                'period' => 'year',
                'monthly_price' => '₹1,200',
                'outlets' => 3,
                'users' => 5,
                'popular' => true,
                'features' => [
                    'All Starter features',
                    'Multi-location Stock',
                    'Advanced Inventory',
                    'Role-based Access',
                    'Mobile App Access',
                    'Advanced Reports',
                    'WhatsApp Support',
                    'CRM & Loyalty'
                ],
                'button_text' => 'Buy Now',
                'button_class' => 'btn-primary'
            ],
            [
                'name' => 'Elite',
                'price' => '₹21,000',
                'period' => 'year',
                'monthly_price' => '₹2,100',
                'outlets' => 10,
                'users' => 15,
                'popular' => false,
                'features' => [
                    'All Growth features',
                    'Combo Products',
                    'Automated Reminders',
                    'Export to Tally',
                    'Custom Label Printing',
                    'Priority Support'
                ],
                'button_text' => 'Buy Now',
                'button_class' => 'btn-outline-primary'
            ],
            [
                'name' => 'Enterprise',
                'price' => 'Custom Quote',
                'period' => '',
                'monthly_price' => 'Custom Quote',
                'outlets' => 'Unlimited',
                'users' => 'Unlimited',
                'popular' => false,
                'features' => [
                    'All Elite features',
                    'Custom Integrations',
                    'API Access',
                    'Dedicated Account Manager',
                    'On-site/Remote Training',
                    'SLA-based Priority Support'
                ],
                'button_text' => 'Request Quote',
                'button_class' => 'btn-outline-primary'
            ]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('pricing/index', $data);
        $this->load->view('templates/footer');
    }
}
