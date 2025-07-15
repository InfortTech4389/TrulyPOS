<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->library('Payment_gateway');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
        $this->load->helper('form');
    }

    public function index()
    {
        $plan = $this->input->get('plan');
        $type = $this->input->get('type'); // 'retail' or 'restaurant'
        
        if (!$plan) {
            redirect('pricing');
        }

        $data['title'] = 'Buy ' . ucfirst($plan) . ' Plan - TrulyPOS';
        $data['plan'] = $plan;
        $data['type'] = $type ?: 'retail';
        
        // Get plan details
        $data['plan_details'] = $this->get_plan_details($plan, $data['type']);
        
        if (!$data['plan_details']) {
            redirect('pricing');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('buy/index', $data);
        $this->load->view('templates/footer');
    }

    public function checkout()
    {
        $this->load->library('form_validation');
        
        // Validation rules
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]');
        $this->form_validation->set_rules('company', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('plan', 'Plan', 'required');
        $this->form_validation->set_rules('billing_cycle', 'Billing Cycle', 'required|in_list[monthly,yearly]');
        $this->form_validation->set_rules('type', 'Plan Type', 'required|in_list[retail,restaurant]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('buy?plan=' . $this->input->post('plan') . '&type=' . $this->input->post('type'));
        }

        // Verify reCAPTCHA
        if (!$this->recaptcha->verify()) {
            $this->session->set_flashdata('error', $this->recaptcha->get_error_message());
            redirect('buy?plan=' . $this->input->post('plan') . '&type=' . $this->input->post('type'));
        }

        $plan = $this->input->post('plan');
        $type = $this->input->post('type');
        $billing_cycle = $this->input->post('billing_cycle');
        
        $plan_details = $this->get_plan_details($plan, $type);
        
        if (!$plan_details) {
            $this->session->set_flashdata('error', 'Invalid plan selected');
            redirect('pricing');
        }

        // Calculate amount based on billing cycle
        $amount = $billing_cycle == 'yearly' ? $plan_details['yearly_price'] : $plan_details['monthly_price'];
        
        // Create order in database
        $order_data = [
            'customer_name' => $this->input->post('name'),
            'customer_email' => $this->input->post('email'),
            'customer_phone' => $this->input->post('phone'),
            'company_name' => $this->input->post('company'),
            'plan_name' => $plan,
            'plan_type' => $type,
            'billing_cycle' => $billing_cycle,
            'amount' => $amount,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $order_id = $this->Order_model->insert_order($order_data);
        
        if (!$order_id) {
            $this->session->set_flashdata('error', 'Failed to create order');
            redirect('buy?plan=' . $plan . '&type=' . $type);
        }

        // Create Razorpay order
        $razorpay_order_data = [
            'amount' => $amount,
            'currency' => 'INR',
            'receipt' => 'order_' . $order_id,
            'notes' => [
                'order_id' => $order_id,
                'plan' => $plan,
                'type' => $type
            ]
        ];

        $razorpay_order = $this->payment_gateway->create_order($razorpay_order_data);
        
        if (!$razorpay_order) {
            $this->session->set_flashdata('error', 'Failed to create payment order');
            redirect('buy?plan=' . $plan . '&type=' . $type);
        }

        // Update order with Razorpay order ID
        $this->Order_model->update_order($order_id, ['razorpay_order_id' => $razorpay_order['id']]);

        // Prepare data for payment page
        $data['title'] = 'Complete Payment - TrulyPOS';
        $data['order'] = $order_data;
        $data['order_id'] = $order_id;
        $data['plan_details'] = $plan_details;
        $data['razorpay_order'] = $razorpay_order;
        $data['razorpay_key'] = $this->payment_gateway->get_key_id();

        $this->load->view('templates/header', $data);
        $this->load->view('buy/payment', $data);
        $this->load->view('templates/footer');
    }

    private function get_plan_details($plan, $type)
    {
        $plans = [
            'retail' => [
                'starter' => [
                    'name' => 'Starter',
                    'yearly_price' => 6000,
                    'monthly_price' => 600,
                    'outlets' => 1,
                    'users' => 2,
                    'features' => ['Core POS & Billing', 'GST Invoicing', 'Basic Inventory', 'Unlimited Invoices', 'Customer Database', 'Basic Reports', 'Email Support']
                ],
                'growth' => [
                    'name' => 'Growth',
                    'yearly_price' => 12000,
                    'monthly_price' => 1200,
                    'outlets' => 3,
                    'users' => 5,
                    'features' => ['All Starter features', 'Multi-location Stock', 'Advanced Inventory', 'Role-based Access', 'Mobile App Access', 'Advanced Reports', 'WhatsApp Support', 'CRM & Loyalty']
                ],
                'elite' => [
                    'name' => 'Elite',
                    'yearly_price' => 21000,
                    'monthly_price' => 2100,
                    'outlets' => 10,
                    'users' => 15,
                    'features' => ['All Growth features', 'Combo Products', 'Automated Reminders', 'Export to Tally', 'Custom Label Printing', 'Priority Support']
                ]
            ],
            'restaurant' => [
                'essentials' => [
                    'name' => 'Essentials',
                    'yearly_price' => 8000,
                    'monthly_price' => 800,
                    'features' => ['Table & Counter Management', 'Basic KOT Printing', 'Menu Management', 'Basic Billing', 'Inventory Tracking', 'GST Compliance', 'Email Support']
                ],
                'pro' => [
                    'name' => 'Pro',
                    'yearly_price' => 15000,
                    'monthly_price' => 1500,
                    'features' => ['All Essentials features', 'Online Order Integration', 'Recipe Management', 'Menu Modifiers & Combos', 'Kitchen Display System', 'Split Bills & Discounts', 'CRM & Loyalty Program', 'WhatsApp Support']
                ],
                'premium' => [
                    'name' => 'Premium',
                    'yearly_price' => 25000,
                    'monthly_price' => 2500,
                    'features' => ['All Pro features', 'Multi-location Management', 'Advanced Analytics', 'Automated Inventory Alerts', 'SMS/WhatsApp Notifications', 'Staff Management', 'Priority Support']
                ]
            ]
        ];

        return isset($plans[$type][$plan]) ? $plans[$type][$plan] : null;
    }
}
