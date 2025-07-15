<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'TrulyPOS - Smart Billing & Inventory Software';
        $data['meta_description'] = 'Powerful inventory and billing solution for distribution and retail businesses. GST billing, barcode scanning, multi-location support.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function features()
    {
        $data['title'] = 'Features - TrulyPOS';
        $data['meta_description'] = 'Complete list of features in TrulyPOS - Inventory Management, GST Billing, Barcode Scanning, Reports & Analytics.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/features', $data);
        $this->load->view('templates/footer');
    }

    public function pricing()
    {
        $data['title'] = 'Pricing - TrulyPOS';
        $data['meta_description'] = 'Affordable pricing plans for TrulyPOS - Single Store, Multi Store, and Enterprise plans.';
        
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
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('templates/footer');
    }

    public function about()
    {
        $data['title'] = 'About Us - TrulyPOS';
        $data['meta_description'] = 'Learn about TrulyPOS team, our mission, vision, and commitment to helping businesses grow.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer');
    }

    public function blog()
    {
        $data['title'] = 'Blog - TrulyPOS';
        $data['meta_description'] = 'Latest insights, tips, and updates from TrulyPOS team about retail technology and business growth.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/blog', $data);
        $this->load->view('templates/footer');
    }

    public function faq()
    {
        $data['title'] = 'FAQ - TrulyPOS';
        $data['meta_description'] = 'Frequently asked questions about TrulyPOS features, pricing, support, and implementation.';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/faq', $data);
        $this->load->view('templates/footer');
    }
}
?>
