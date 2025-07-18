<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load libraries
        $this->load->library('database');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('Notification_service');
        $this->load->library('Payment_gateway');
        $this->load->library('input');
        $this->load->library('output');
        
        // Load helpers
        $this->load->helper(array('url'));
        
        // Load models
        $this->load->model('Order_model');
        $this->load->model('License_model');
        $this->load->model('Content_model');
        $this->load->model('Settings_model');
    }

    public function process()
    {
        if ($this->input->post()) {
            $payment_id = $this->input->post('razorpay_payment_id');
            $order_id = $this->input->post('razorpay_order_id');
            $signature = $this->input->post('razorpay_signature');
            
            // Verify payment signature
            if ($this->payment_gateway->verify_payment($payment_id, $order_id, $signature)) {
                // Payment successful
                $order = $this->Order_model->get_order_by_razorpay_id($order_id);
                
                if ($order) {
                    // Update order status
                    $this->Order_model->update_order($order->id, [
                        'status' => 'paid', 
                        'razorpay_payment_id' => $payment_id,
                        'paid_at' => date('Y-m-d H:i:s')
                    ]);
                    
                    // Generate license key
                    $license_key = $this->generate_license_key();
                    
                    // Save license
                    $license_data = [
                        'order_id' => $order->id,
                        'license_key' => $license_key,
                        'plan_name' => $order->plan_name,
                        'customer_name' => $order->customer_name,
                        'customer_email' => $order->customer_email,
                        'status' => 'active',
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    
                    $this->License_model->insert_license($license_data);
                    
                    // Send license email using notification service
                    $notification_data = [
                        'customer_name' => $order->customer_name,
                        'email' => $order->customer_email,
                        'phone' => $order->customer_phone,
                        'license_key' => $license_key,
                        'plan_name' => $order->plan_name,
                        'order_id' => $order->id,
                        'download_link' => 'https://trulypos.com/download'
                    ];
                    
                    $this->notification_service->send_notification('license_delivery', $notification_data);
                    
                    // Redirect to success page
                    $this->session->set_userdata('order_id', $order->id);
                    redirect('payment/success');
                } else {
                    redirect('payment/cancel');
                }
            } else {
                // Payment verification failed
                redirect('payment/cancel');
            }
        } else {
            redirect('pricing');
        }
    }

    public function success()
    {
        $order_id = $this->session->userdata('order_id');
        
        if (!$order_id) {
            redirect('home');
        }
        
        $data['title'] = 'Payment Success - Truly POS';
        $data['order'] = $this->Order_model->get_order($order_id);
        $data['license'] = $this->License_model->get_license_by_order($order_id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('payment/success', $data);
        $this->load->view('templates/footer');
    }

    public function cancel()
    {
        $data['title'] = 'Payment Cancelled - Truly POS';
        
        $this->load->view('templates/header', $data);
        $this->load->view('payment/cancel', $data);
        $this->load->view('templates/footer');
    }

    public function verify()
    {
        $license_key = $this->input->post('license_key');
        
        if ($license_key) {
            $license = $this->License_model->get_license_by_key($license_key);
            
            if ($license) {
                $response = [
                    'success' => true,
                    'message' => 'License is valid',
                    'data' => [
                        'license_key' => $license->license_key,
                        'plan' => $license->plan_name,
                        'customer' => $license->customer_name,
                        'status' => $license->status,
                        'created_at' => $license->created_at
                    ]
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Invalid license key'
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'License key is required'
            ];
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    private function generate_license_key()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $key = '';
        
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $key .= $characters[rand(0, strlen($characters) - 1)];
            }
            if ($i < 3) {
                $key .= '-';
            }
        }
        
        return $key;
    }

    private function send_license_email($order, $license_key)
    {
        $this->email->from('noreply@trulypos.com', 'Truly POS');
        $this->email->to($order->customer_email);
        $this->email->subject('Your Truly POS License Key');
        
        $message = "Dear " . $order->customer_name . ",\n\n";
        $message .= "Thank you for purchasing Truly POS!\n\n";
        $message .= "Your license details:\n";
        $message .= "License Key: " . $license_key . "\n";
        $message .= "Plan: " . $order->plan_name . "\n";
        $message .= "Order ID: " . $order->id . "\n\n";
        $message .= "You can download the software from: https://trulypos.com/download\n\n";
        $message .= "For support, contact us at support@trulypos.com\n\n";
        $message .= "Thank you for choosing Truly POS!\n";
        $message .= "Team Truly POS";
        
        $this->email->message($message);
        $this->email->send();
    }
}
