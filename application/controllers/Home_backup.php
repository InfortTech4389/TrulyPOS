<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('Contact_model');
        $this->load->model('Newsletter_model');
    }

    public function index()
    {
        $data['title'] = 'Truly POS - Smart Billing & Inventory Software';
        $data['meta_description'] = 'Powerful inventory and billing solution for distribution and retail businesses. GST billing, barcode scanning, multi-location support.';
        $data['features'] = $this->Content_model->get_features(6);
        $data['testimonials'] = $this->Content_model->get_testimonials(3);
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function features()
    {
        $data['title'] = 'Features - Truly POS';
        $data['meta_description'] = 'Complete list of features in Truly POS - Inventory Management, GST Billing, Barcode Scanning, Reports & Analytics.';
        $data['features'] = $this->Content_model->get_features();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/features', $data);
        $this->load->view('templates/footer');
    }

    public function demo()
    {
        $data['title'] = 'Live Demo - Truly POS';
        $data['meta_description'] = 'Try Truly POS live demo with sample data. Experience the power of our billing and inventory software.';
        $data['demo_credentials'] = [
            'admin' => ['username' => 'admin', 'password' => 'admin123'],
            'staff' => ['username' => 'staff', 'password' => 'staff123']
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/demo', $data);
        $this->load->view('templates/footer');
    }

    public function pricing()
    {
        $data['title'] = 'Pricing - Truly POS';
        $data['meta_description'] = 'Affordable pricing plans for Truly POS. Choose from single store to multi-store licenses.';
        $data['pricing_plans'] = $this->Content_model->get_pricing_plans();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/pricing', $data);
        $this->load->view('templates/footer');
    }

    public function buy()
    {
        $data['title'] = 'Buy Now - Truly POS';
        $data['meta_description'] = 'Purchase Truly POS license securely with our payment gateway.';
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('plan_id', 'Plan', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('company', 'Company', 'required');
            
            if ($this->form_validation->run()) {
                // Process payment
                $this->load->library('Payment_gateway');
                $payment_data = [
                    'amount' => $this->input->post('amount'),
                    'currency' => 'INR',
                    'receipt' => 'order_' . time(),
                    'notes' => [
                        'plan_id' => $this->input->post('plan_id'),
                        'customer_name' => $this->input->post('name'),
                        'customer_email' => $this->input->post('email')
                    ]
                ];
                
                $order = $this->payment_gateway->create_order($payment_data);
                
                if ($order) {
                    $data['order'] = $order;
                    $data['customer_data'] = $this->input->post();
                    
                    $this->load->view('templates/header', $data);
                    $this->load->view('home/payment', $data);
                    $this->load->view('templates/footer');
                    return;
                }
            }
        }
        
        $data['pricing_plans'] = $this->Content_model->get_pricing_plans();
        $this->load->view('templates/header', $data);
        $this->load->view('home/buy', $data);
        $this->load->view('templates/footer');
    }

    public function about()
    {
        $data['title'] = 'About Us - Truly POS';
        $data['meta_description'] = 'Learn about Truly POS team, our mission and vision to revolutionize retail and distribution business management.';
        $data['team_members'] = $this->Content_model->get_team_members();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer');
    }

    public function contact()
    {
        $data['title'] = 'Contact Us - Truly POS';
        $data['meta_description'] = 'Get in touch with Truly POS support team. We are here to help with sales, support and technical queries.';
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            if ($this->form_validation->run()) {
                $contact_data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'subject' => $this->input->post('subject'),
                    'message' => $this->input->post('message'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                if ($this->Contact_model->insert_contact($contact_data)) {
                    // Send email notification
                    $this->send_contact_email($contact_data);
                    
                    $this->session->set_flashdata('success', 'Thank you for your message. We will get back to you soon!');
                    redirect('contact');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                }
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('templates/footer');
    }

    public function blog()
    {
        $data['title'] = 'Blog - Truly POS';
        $data['meta_description'] = 'Latest updates, tips and insights about retail and distribution business management.';
        $data['posts'] = $this->Content_model->get_blog_posts();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/blog', $data);
        $this->load->view('templates/footer');
    }

    public function blog_post($slug)
    {
        $post = $this->Content_model->get_blog_post($slug);
        
        if (!$post) {
            show_404();
        }
        
        $data['title'] = $post->title . ' - Truly POS Blog';
        $data['meta_description'] = $post->excerpt;
        $data['post'] = $post;
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/blog_post', $data);
        $this->load->view('templates/footer');
    }

    public function faq()
    {
        $data['title'] = 'FAQ - Truly POS';
        $data['meta_description'] = 'Frequently asked questions about Truly POS features, pricing, installation and support.';
        $data['faqs'] = $this->Content_model->get_faqs();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/faq', $data);
        $this->load->view('templates/footer');
    }

    public function testimonials()
    {
        $data['title'] = 'Testimonials - Truly POS';
        $data['meta_description'] = 'Read what our customers say about Truly POS. Real feedback from distributors and retailers.';
        $data['testimonials'] = $this->Content_model->get_testimonials();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/testimonials', $data);
        $this->load->view('templates/footer');
    }

    private function send_contact_email($data)
    {
        $this->email->from($data['email'], $data['name']);
        $this->email->to('support@trulypos.com');
        $this->email->subject('New Contact Form Submission: ' . $data['subject']);
        
        $message = "New contact form submission:\n\n";
        $message .= "Name: " . $data['name'] . "\n";
        $message .= "Email: " . $data['email'] . "\n";
        $message .= "Phone: " . $data['phone'] . "\n";
        $message .= "Subject: " . $data['subject'] . "\n";
        $message .= "Message: " . $data['message'] . "\n";
        
        $this->email->message($message);
        $this->email->send();
    }
}
