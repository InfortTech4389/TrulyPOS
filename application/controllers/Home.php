<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load libraries
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('Notification_service');
        // Note: input and output are core CI classes, automatically available
        
        // Load helpers
        $this->load->helper(array('url', 'form', 'text', 'date'));
        
        // Load models
        $this->load->model('Content_model');
        $this->load->model('Contact_model');
        $this->load->model('Newsletter_model');
    }

    public function index()
    {
        $data['title'] = 'TrulyPOS - Smart Billing & Inventory Software';
        $data['meta_description'] = 'Powerful inventory and billing solution for distribution and retail businesses. GST billing, barcode scanning, multi-location support.';
        
        // Load dynamic content from database
        $data['features'] = $this->Content_model->get_features(6);
        $data['testimonials'] = $this->Content_model->get_testimonials(6);
        $data['pricing_plans'] = $this->Content_model->get_pricing_plans();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function features()
    {
        $data['title'] = 'Features - TrulyPOS';
        $data['meta_description'] = 'Complete list of features in TrulyPOS - Inventory Management, GST Billing, Barcode Scanning, Reports & Analytics.';
        
        // Load all features from database
        $data['features'] = $this->Content_model->get_features();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/features', $data);
        $this->load->view('templates/footer');
    }

    public function pricing()
    {
        $data['title'] = 'Pricing - TrulyPOS';
        $data['meta_description'] = 'Affordable pricing plans for TrulyPOS - Single Store, Multi Store, and Enterprise plans.';
        
        // Load pricing plans from database
        $data['pricing_plans'] = $this->Content_model->get_pricing_plans();
        $data['faqs'] = $this->Content_model->get_faqs();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/pricing', $data);
        $this->load->view('templates/footer');
    }

    public function demo()
    {
        $data['title'] = 'Demo - TrulyPOS';
        $data['meta_description'] = 'Try TrulyPOS with our live demo. Experience all features with sample data.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/demo', $data);
        $this->load->view('templates/footer');
    }

    public function contact()
    {
        $data['title'] = 'Contact Us - TrulyPOS';
        $data['meta_description'] = 'Get in touch with TrulyPOS team for support, demo, or any questions.';
        $data['success'] = '';
        $data['error'] = '';
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('phone', 'Phone', 'trim');
            $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
            $this->form_validation->set_rules('message', 'Message', 'required|trim');
            
            if ($this->form_validation->run()) {
                $contact_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'subject' => $this->input->post('subject'),
                    'message' => $this->input->post('message'),
                    'created_at' => date('Y-m-d H:i:s')
                );
                
                if ($this->Contact_model->insert_contact($contact_data)) {
                    $data['success'] = 'Thank you for your message. We will get back to you soon!';
                } else {
                    $data['error'] = 'Sorry, there was an error sending your message. Please try again.';
                }
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('templates/footer');
    }

    public function about()
    {
        $data['title'] = 'About Us - TrulyPOS';
        $data['meta_description'] = 'Learn about TrulyPOS team, our mission, vision, and commitment to helping businesses grow.';
        
        // Load team members from database
        $data['team_members'] = $this->Content_model->get_team_members();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer');
    }

    public function blog()
    {
        $data['title'] = 'Blog - TrulyPOS';
        $data['meta_description'] = 'Latest insights, tips, and updates from TrulyPOS team about retail technology and business growth.';
        
        // Load blog posts from database
        $data['blog_posts'] = $this->Content_model->get_blog_posts();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/blog', $data);
        $this->load->view('templates/footer');
    }

    public function blog_post($slug)
    {
        $blog_post = $this->Content_model->get_blog_post($slug);
        
        if (!$blog_post) {
            show_404();
        }
        
        $data['title'] = $blog_post->title . ' - TrulyPOS Blog';
        $data['meta_description'] = $blog_post->meta_description ?: $blog_post->excerpt;
        $data['blog_post'] = $blog_post;
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/blog_post', $data);
        $this->load->view('templates/footer');
    }

    public function faq()
    {
        $data['title'] = 'FAQ - TrulyPOS';
        $data['meta_description'] = 'Frequently asked questions about TrulyPOS features, pricing, support, and implementation.';
        
        // Load FAQs from database
        $data['faqs'] = $this->Content_model->get_faqs();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/faq', $data);
        $this->load->view('templates/footer');
    }

    public function newsletter_subscribe()
    {
        $response = array('success' => false, 'message' => '');
        
        if ($this->input->post()) {
            $email = $this->input->post('email');
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($this->Newsletter_model->subscribe($email)) {
                    // Send welcome notification
                    $notification_data = [
                        'email' => $email,
                        'name' => 'Subscriber'
                    ];
                    
                    $this->notification_service->send_notification('newsletter_welcome', $notification_data);
                    
                    $response['success'] = true;
                    $response['message'] = 'Thank you for subscribing to our newsletter!';
                } else {
                    $response['message'] = 'Sorry, there was an error. Please try again.';
                }
            } else {
                $response['message'] = 'Please enter a valid email address.';
            }
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
?>
