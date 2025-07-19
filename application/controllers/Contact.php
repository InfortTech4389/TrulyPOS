<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('Notification_service');
        $this->load->library('recaptcha');
        $this->load->helper('form');
        $this->load->model('Contact_model');
        $this->load->model('Settings_model');
    }

    public function index()
    {
        $data['title'] = 'Contact Us - TrulyPOS';
        $data['meta_description'] = 'Get in touch with TrulyPOS team. Contact us for support, sales inquiries, or general questions.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('templates/footer');
    }

    public function submit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('company', 'Company', 'trim|max_length[200]');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('message', 'Message', 'required|trim|max_length[1000]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('contact');
        }

        // Verify reCAPTCHA
        if (!$this->recaptcha->verify()) {
            $this->session->set_flashdata('error', $this->recaptcha->get_error_message());
            redirect('contact');
        }

        // Process form data
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'company' => $this->input->post('company'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Save to database (you would need to create contacts table)
        // $this->db->insert('contacts', $data);

        // Send notifications using the new service
        $notification_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'ip_address' => $data['ip_address'],
            'user_agent' => $data['user_agent']
        ];

        $results = $this->notification_service->send_notification('contact_form', $notification_data);

        $this->session->set_flashdata('success', 'Thank you for your message. We will get back to you soon!');
        redirect('contact');
    }

    public function demo()
    {
        $data['title'] = 'Request Demo - TrulyPOS';
        $data['meta_description'] = 'Request a free demo of TrulyPOS and see how it can transform your business operations.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('contact/demo', $data);
        $this->load->view('templates/footer');
    }

    public function demo_submit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('company', 'Company', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('business_type', 'Business Type', 'required|trim');
        $this->form_validation->set_rules('plan_interest', 'Plan Interest', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('contact/demo');
        }

        // Verify reCAPTCHA
        if (!$this->recaptcha->verify()) {
            $this->session->set_flashdata('error', $this->recaptcha->get_error_message());
            redirect('contact/demo');
        }

        // Process demo request
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'company' => $this->input->post('company'),
            'business_type' => $this->input->post('business_type'),
            'plan_interest' => $this->input->post('plan_interest'),
            'preferred_time' => $this->input->post('preferred_time'),
            'requirements' => $this->input->post('requirements'),
            'ip_address' => $this->input->ip_address(),
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Save demo request
        // $this->db->insert('demo_requests', $data);

        // Send demo notifications using the new service
        $notification_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'],
            'business_type' => $data['business_type'],
            'plan_interest' => $data['plan_interest'],
            'preferred_time' => $data['preferred_time'],
            'requirements' => $data['requirements']
        ];

        $results = $this->notification_service->send_notification('demo_request', $notification_data);

        $this->session->set_flashdata('success', 'Demo request submitted successfully! Our team will contact you within 24 hours.');
        redirect('contact/demo');
    }

    private function send_notification_email($data)
    {
        $this->load->library('email');
        
        $this->email->from($data['email'], $data['name']);
        $this->email->to('support@trulypos.com');
        $this->email->subject('New Contact Form Submission - ' . $data['subject']);
        
        $message = "New contact form submission:\n\n";
        $message .= "Name: " . $data['name'] . "\n";
        $message .= "Email: " . $data['email'] . "\n";
        $message .= "Phone: " . $data['phone'] . "\n";
        $message .= "Company: " . $data['company'] . "\n";
        $message .= "Subject: " . $data['subject'] . "\n";
        $message .= "Message: " . $data['message'] . "\n";
        $message .= "IP Address: " . $data['ip_address'] . "\n";
        $message .= "Submitted At: " . $data['created_at'] . "\n";
        
        $this->email->message($message);
        $this->email->send();
    }

    private function send_demo_notification($data)
    {
        $this->load->library('email');
        
        $this->email->from('noreply@trulypos.com', 'TrulyPOS Demo Request');
        $this->email->to('sales@trulypos.com');
        $this->email->subject('New Demo Request - ' . $data['company']);
        
        $message = "New demo request:\n\n";
        $message .= "Name: " . $data['name'] . "\n";
        $message .= "Email: " . $data['email'] . "\n";
        $message .= "Phone: " . $data['phone'] . "\n";
        $message .= "Company: " . $data['company'] . "\n";
        $message .= "Business Type: " . $data['business_type'] . "\n";
        $message .= "Plan Interest: " . $data['plan_interest'] . "\n";
        $message .= "Preferred Time: " . $data['preferred_time'] . "\n";
        $message .= "Requirements: " . $data['requirements'] . "\n";
        $message .= "Submitted At: " . $data['created_at'] . "\n";
        
        $this->email->message($message);
        $this->email->send();
    }
}
