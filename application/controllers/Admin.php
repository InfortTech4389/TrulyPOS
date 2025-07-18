<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load core libraries (redundant with autoload but explicit for clarity)
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('Notification_service');
        $this->load->helper(array('url', 'form', 'date'));
        
        // Load models
        $this->load->model('Contact_model');
        $this->load->model('Content_model');
        $this->load->model('Newsletter_model');
        $this->load->model('Order_model');
        $this->load->model('License_model');
        $this->load->model('Testimonial_model');
        $this->load->model('Settings_model');
        
        // Load input library explicitly
        $this->load->library('input');
        
        // Check if user is logged in (basic session check)
        $current_method = $this->router->fetch_method();
        if (!$this->session->userdata('admin_logged_in') && 
            !in_array($current_method, array('login', 'authenticate'))) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard - TrulyPOS';
        
        // Get dashboard statistics
        $data['stats'] = array(
            'total_contacts' => $this->get_contact_count(),
            'total_subscribers' => $this->get_subscriber_count(),
            'total_orders' => $this->get_order_count(),
            'total_licenses' => $this->get_license_count(),
            'pending_orders' => $this->get_pending_orders_count(),
            'revenue_today' => $this->get_revenue_today(),
            'revenue_month' => $this->get_revenue_month(),
            'new_customers_month' => $this->get_new_customers_month()
        );
        
        // Get recent activities
        $data['recent_contacts'] = $this->get_recent_contacts(5);
        $data['recent_orders'] = $this->get_recent_orders(5);
        $data['recent_licenses'] = $this->get_recent_licenses(5);
        
        // Get notification statistics
        $data['notification_stats'] = $this->notification_service->get_notification_stats(30);
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function login()
    {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
        
        $data['title'] = 'Admin Login - TrulyPOS';
        $this->load->view('admin/login', $data);
    }

    public function authenticate()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Simple authentication (in production, use proper password hashing)
            if ($username === 'admin' && $password === 'trulypos2025') {
                $this->session->set_userdata('admin_logged_in', TRUE);
                $this->session->set_userdata('admin_username', $username);
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_username');
        $this->session->set_flashdata('success', 'Logged out successfully');
        redirect('admin/login');
    }

    public function contacts()
    {
        $data['title'] = 'Contacts - Admin Panel';
        $data['contacts'] = $this->Contact_model->get_contacts();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/contacts', $data);
        $this->load->view('admin/footer');
    }

    public function testimonials()
    {
        $data['title'] = 'Testimonials - Admin Panel';
        $data['testimonials'] = $this->Testimonial_model->get_all_testimonials();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/testimonials', $data);
        $this->load->view('admin/footer');
    }

    public function orders()
    {
        $data['title'] = 'Orders - Admin Panel';
        $data['orders'] = $this->Order_model->get_orders();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/orders', $data);
        $this->load->view('admin/footer');
    }

    // Helper methods for dashboard statistics
    private function get_contact_count()
    {
        return $this->Contact_model->get_contact_count();
    }
    
    private function get_subscriber_count()
    {
        return $this->Newsletter_model->get_subscriber_count();
    }
    
    private function get_order_count()
    {
        return $this->Order_model->get_order_count();
    }
    
    private function get_license_count()
    {
        return $this->License_model->get_active_licenses_count();
    }
    
    private function get_pending_orders_count()
    {
        return $this->Order_model->get_pending_orders_count();
    }
    
    private function get_revenue_today()
    {
        return $this->Order_model->get_revenue_today();
    }
    
    private function get_revenue_month()
    {
        return $this->Order_model->get_revenue_month();
    }
    
    private function get_new_customers_month()
    {
        return $this->Order_model->get_new_customers_month();
    }
    
    private function get_recent_contacts($limit = 5)
    {
        return $this->Contact_model->get_contacts($limit);
    }
    
    private function get_recent_orders($limit = 5)
    {
        return $this->Order_model->get_orders($limit);
    }
    
    private function get_recent_licenses($limit = 5)
    {
        return $this->License_model->get_recent_licenses($limit);
    }

    // Customer Management
    public function customers($page = 1)
    {
        $data['title'] = 'Customer Management - TrulyPOS Admin';
        
        // Pagination configuration
        $config['base_url'] = site_url('admin/customers/');
        $config['total_rows'] = $this->Order_model->get_customers_count();
        $config['per_page'] = 20;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;
        
        // Pagination styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $config['per_page'];
        $data['customers'] = $this->Order_model->get_customers($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_customers'] = $config['total_rows'];
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/customers', $data);
        $this->load->view('admin/footer');
    }

    public function customer_details($customer_id)
    {
        $data['title'] = 'Customer Details - TrulyPOS Admin';
        $data['customer'] = $this->Order_model->get_customer_details($customer_id);
        
        if (!$data['customer']) {
            show_404();
        }
        
        $data['orders'] = $this->Order_model->get_customer_orders($customer_id);
        $data['licenses'] = $this->License_model->get_customer_licenses($customer_id);
        $data['total_spent'] = $this->Order_model->get_customer_total_spent($customer_id);
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/customer_details', $data);
        $this->load->view('admin/footer');
    }

    // Payment Management
    public function payments($page = 1)
    {
        $data['title'] = 'Payment Management - TrulyPOS Admin';
        
        // Pagination configuration
        $config['base_url'] = site_url('admin/payments/');
        $config['total_rows'] = $this->Order_model->get_payments_count();
        $config['per_page'] = 20;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = FALSE;
        $config['uri_segment'] = 3;
        
        // Apply pagination styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $config['per_page'];
        $data['payments'] = $this->Order_model->get_payments($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_payments'] = $config['total_rows'];
        
        // Payment statistics
        $data['stats'] = array(
            'total_revenue' => $this->Order_model->get_total_revenue(),
            'pending_payments' => $this->Order_model->get_pending_payments_count(),
            'completed_payments' => $this->Order_model->get_completed_payments_count(),
            'failed_payments' => $this->Order_model->get_failed_payments_count()
        );
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/payments', $data);
        $this->load->view('admin/footer');
    }

    public function payment_details($payment_id)
    {
        $data['title'] = 'Payment Details - TrulyPOS Admin';
        $data['payment'] = $this->Order_model->get_payment_details($payment_id);
        
        if (!$data['payment']) {
            show_404();
        }
        
        $data['order'] = $this->Order_model->get_order_by_payment($payment_id);
        $data['customer'] = $this->Order_model->get_customer_by_payment($payment_id);
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/payment_details', $data);
        $this->load->view('admin/footer');
    }

    public function update_payment_status()
    {
        $payment_id = $this->input->post('payment_id');
        $status = $this->input->post('status');
        $notes = $this->input->post('notes');
        
        $result = $this->Order_model->update_payment_status($payment_id, $status, $notes);
        
        if ($result) {
            // Send notification to customer about status change
            $payment = $this->Order_model->get_payment_details($payment_id);
            $customer = $this->Order_model->get_customer_by_payment($payment_id);
            
            $notification_data = array(
                'payment_id' => $payment_id,
                'status' => $status,
                'amount' => $payment['amount'],
                'customer_name' => $customer['name']
            );
            
            $this->notification_service->send_notification(
                'payment_status_update',
                $customer['email'],
                $customer['phone'],
                $notification_data
            );
            
            $this->session->set_flashdata('success', 'Payment status updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to update payment status');
        }
        
        redirect('admin/payment_details/' . $payment_id);
    }

    // Enquiry Management (Contact Management)
    public function enquiries($page = 1)
    {
        $data['title'] = 'Enquiry Management - TrulyPOS Admin';
        
        // Pagination configuration
        $config['base_url'] = site_url('admin/enquiries/');
        $config['total_rows'] = $this->Contact_model->get_contact_count();
        $config['per_page'] = 20;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        
        // Apply pagination styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $config['per_page'];
        $data['enquiries'] = $this->Contact_model->get_contacts($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_enquiries'] = $config['total_rows'];
        
        // Enquiry statistics
        $data['stats'] = array(
            'total_enquiries' => $this->Contact_model->get_contact_count(),
            'new_enquiries' => $this->Contact_model->get_new_enquiries_count(),
            'responded_enquiries' => $this->Contact_model->get_responded_enquiries_count(),
            'pending_enquiries' => $this->Contact_model->get_pending_enquiries_count()
        );
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/enquiries', $data);
        $this->load->view('admin/footer');
    }

    public function enquiry_details($enquiry_id)
    {
        $data['title'] = 'Enquiry Details - TrulyPOS Admin';
        $data['enquiry'] = $this->Contact_model->get_contact_details($enquiry_id);
        
        if (!$data['enquiry']) {
            show_404();
        }
        
        // Mark as viewed if not already
        $this->Contact_model->mark_as_viewed($enquiry_id);
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/enquiry_details', $data);
        $this->load->view('admin/footer');
    }

    public function respond_enquiry()
    {
        $this->form_validation->set_rules('enquiry_id', 'Enquiry ID', 'required|numeric');
        $this->form_validation->set_rules('response_message', 'Response Message', 'required|trim');
        $this->form_validation->set_rules('response_type', 'Response Type', 'required|in_list[email,whatsapp,both]');
        
        if ($this->form_validation->run()) {
            $enquiry_id = $this->input->post('enquiry_id');
            $response_message = $this->input->post('response_message');
            $response_type = $this->input->post('response_type');
            
            // Get enquiry details
            $enquiry = $this->Contact_model->get_contact_details($enquiry_id);
            
            if ($enquiry) {
                // Save response
                $response_data = array(
                    'contact_id' => $enquiry_id,
                    'response_message' => $response_message,
                    'response_type' => $response_type,
                    'responded_by' => $this->session->userdata('admin_username'),
                    'responded_at' => date('Y-m-d H:i:s')
                );
                
                $this->Contact_model->save_response($response_data);
                
                // Send response notification
                $notification_data = array(
                    'customer_name' => $enquiry['name'],
                    'original_message' => $enquiry['message'],
                    'response_message' => $response_message,
                    'enquiry_date' => $enquiry['created_at']
                );
                
                $channels = array();
                if ($response_type === 'email' || $response_type === 'both') {
                    $channels[] = 'email';
                }
                if ($response_type === 'whatsapp' || $response_type === 'both') {
                    $channels[] = 'whatsapp';
                }
                
                foreach ($channels as $channel) {
                    $this->notification_service->send_notification(
                        'enquiry_response',
                        $enquiry['email'],
                        $enquiry['phone'],
                        $notification_data,
                        $channel
                    );
                }
                
                $this->session->set_flashdata('success', 'Response sent successfully');
            } else {
                $this->session->set_flashdata('error', 'Enquiry not found');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        
        redirect('admin/enquiry_details/' . $this->input->post('enquiry_id'));
    }

    // License Management
    public function licenses($page = 1)
    {
        $data['title'] = 'License Management - TrulyPOS Admin';
        
        // Pagination configuration
        $config['base_url'] = site_url('admin/licenses/');
        $config['total_rows'] = $this->License_model->get_licenses_count();
        $config['per_page'] = 20;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        
        // Apply pagination styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $config['per_page'];
        $data['licenses'] = $this->License_model->get_licenses($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_licenses'] = $config['total_rows'];
        
        // License statistics
        $data['stats'] = array(
            'active_licenses' => $this->License_model->get_active_licenses_count(),
            'expired_licenses' => $this->License_model->get_expired_licenses_count(),
            'expiring_soon' => $this->License_model->get_expiring_soon_count(),
            'total_licenses' => $this->License_model->get_licenses_count()
        );
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/licenses', $data);
        $this->load->view('admin/footer');
    }

    public function license_details($license_id)
    {
        $data['title'] = 'License Details - TrulyPOS Admin';
        $data['license'] = $this->License_model->get_license_details($license_id);
        
        if (!$data['license']) {
            show_404();
        }
        
        $data['customer'] = $this->Order_model->get_customer_by_license($license_id);
        $data['order'] = $this->Order_model->get_order_by_license($license_id);
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/license_details', $data);
        $this->load->view('admin/footer');
    }

    // Newsletter Management
    public function newsletter($page = 1)
    {
        $data['title'] = 'Newsletter Management - TrulyPOS Admin';
        
        // Pagination configuration
        $config['base_url'] = site_url('admin/newsletter/');
        $config['total_rows'] = $this->Newsletter_model->get_subscriber_count();
        $config['per_page'] = 20;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $config['per_page'];
        $data['subscribers'] = $this->Newsletter_model->get_subscribers($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_subscribers'] = $config['total_rows'];
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/newsletter', $data);
        $this->load->view('admin/footer');
    }

    public function send_newsletter()
    {
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');
        
        if ($this->form_validation->run()) {
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            
            // Get all active subscribers
            $subscribers = $this->Newsletter_model->get_active_subscribers();
            $sent_count = 0;
            
            foreach ($subscribers as $subscriber) {
                $notification_data = array(
                    'subscriber_name' => $subscriber['name'] ?: 'Valued Customer',
                    'newsletter_subject' => $subject,
                    'newsletter_content' => $message,
                    'unsubscribe_link' => site_url('newsletter/unsubscribe/' . $subscriber['unsubscribe_token'])
                );
                
                $result = $this->notification_service->send_notification(
                    'newsletter',
                    $subscriber['email'],
                    null,
                    $notification_data,
                    'email'
                );
                
                if ($result) {
                    $sent_count++;
                }
            }
            
            $this->session->set_flashdata('success', "Newsletter sent to {$sent_count} subscribers");
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        
        redirect('admin/newsletter');
    }

    // Notification Management
    public function notifications()
    {
        $data['title'] = 'Notification Management - TrulyPOS Admin';
        $data['notification_stats'] = $this->notification_service->get_notification_stats(30);
        $data['recent_notifications'] = $this->notification_service->get_recent_notifications(50);
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/notifications', $data);
        $this->load->view('admin/footer');
    }

    // Settings Management
    public function settings()
    {
        $data['title'] = 'Settings - TrulyPOS Admin';
        $data['settings'] = $this->Settings_model->get_all_settings();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/settings', $data);
        $this->load->view('admin/footer');
    }

    public function update_settings()
    {
        $settings = $this->input->post();
        unset($settings['submit']); // Remove submit button from data
        
        $result = $this->Settings_model->update_settings($settings);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Settings updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to update settings');
        }
        
        redirect('admin/settings');
    }
}
?>
