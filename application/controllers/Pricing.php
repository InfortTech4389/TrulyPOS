<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load helpers
        $this->load->helper('url');
        
        // Load libraries
        $this->load->library('database');
        
        // Load models
        $this->load->model('Content_model');
    }

    public function index()
    {
        $data['title'] = 'Pricing Plans - TrulyPOS';
        $data['meta_description'] = 'Choose the perfect TrulyPOS package for your retail, distribution, pharmacy, or grocery business. Compare features and pricing for all plans.';
        
        // Load pricing plans from database
        $pricing_plans_db = $this->Content_model->get_pricing_plans();
        
        // Convert database plans to view format
        $data['plans'] = [];
        
        if (!empty($pricing_plans_db)) {
            foreach ($pricing_plans_db as $plan) {
                // Parse features from comma-separated string
                $features = !empty($plan->features) ? explode(',', $plan->features) : [];
                
                // Format price based on currency and billing cycle
                $formatted_price = $this->format_price($plan->price, $plan->currency);
                $monthly_price = $this->calculate_monthly_price($plan->price, $plan->billing_cycle, $plan->currency);
                
                // Determine outlets and users display
                $outlets = ($plan->max_locations == -1) ? 'Unlimited' : $plan->max_locations;
                $users = ($plan->max_users == -1) ? 'Unlimited' : $plan->max_users;
                
                // Convert to view format
                $data['plans'][] = [
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'description' => $plan->description,
                    'price' => $formatted_price,
                    'period' => $plan->billing_cycle,
                    'monthly_price' => $monthly_price,
                    'outlets' => $outlets,
                    'users' => $users,
                    'popular' => (bool) $plan->is_popular,
                    'features' => $features,
                    'support_type' => $plan->support_type,
                    'button_text' => $this->get_button_text($plan),
                    'button_class' => $plan->is_popular ? 'btn-primary' : 'btn-outline-primary',
                    'status' => $plan->status
                ];
            }
        }
        
        // Fallback to static plans if database is empty
        if (empty($data['plans'])) {
            $data['plans'] = $this->get_fallback_plans();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pricing/index', $data);
        $this->load->view('templates/footer');
    }
    
    private function format_price($price, $currency = 'INR')
    {
        if ($price == 0) {
            return 'Custom Quote';
        }
        
        $symbol = $currency === 'INR' ? '₹' : '$';
        return $symbol . number_format($price);
    }
    
    private function calculate_monthly_price($price, $billing_cycle, $currency = 'INR')
    {
        if ($price == 0) {
            return 'Custom Quote';
        }
        
        $symbol = $currency === 'INR' ? '₹' : '$';
        
        switch ($billing_cycle) {
            case 'yearly':
                return $symbol . number_format($price / 12);
            case 'lifetime':
                return 'One-time payment';
            case 'monthly':
                return $symbol . number_format($price);
            default:
                return $symbol . number_format($price);
        }
    }
    
    private function get_button_text($plan)
    {
        if ($plan->price == 0) {
            return 'Request Quote';
        }
        
        switch ($plan->billing_cycle) {
            case 'lifetime':
                return 'Buy Now';
            case 'yearly':
            case 'monthly':
                return $plan->is_popular ? 'Start Free Trial' : 'Subscribe Now';
            default:
                return 'Get Started';
        }
    }
    
    private function get_fallback_plans()
    {
        // Original static plans as fallback
        return [
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
            ]
        ];
    }
}
