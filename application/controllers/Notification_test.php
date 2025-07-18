<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Notification_service');
        $this->load->helper('url');
    }

    public function index()
    {
        echo "<h1>TrulyPOS Notification System Test</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
            .test-section { background: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 8px; border-left: 4px solid #007bff; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .info { color: blue; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; text-decoration: none; display: inline-block; }
            .btn:hover { background: #0056b3; }
            .btn-success { background: #28a745; }
            .btn-warning { background: #ffc107; color: #333; }
            .btn-danger { background: #dc3545; }
            code { background: #f8f9fa; padding: 2px 5px; border-radius: 3px; color: #e83e8c; }
        </style>";

        echo "<div class='info'>This page allows you to test all notification types in the TrulyPOS system.</div>";
        
        echo "<div class='test-section'>";
        echo "<h3>📧 Available Email & WhatsApp Notifications</h3>";
        echo "<ul>";
        echo "<li><strong>Contact Form:</strong> Customer inquiry acknowledgment + admin notification</li>";
        echo "<li><strong>Order Confirmation:</strong> Purchase confirmation with order details</li>";
        echo "<li><strong>License Delivery:</strong> License key delivery after payment</li>";
        echo "<li><strong>Demo Request:</strong> Demo scheduling acknowledgment + sales notification</li>";
        echo "<li><strong>Newsletter Welcome:</strong> Welcome email for new subscribers</li>";
        echo "</ul>";
        echo "</div>";
        
        echo "<div class='test-section'>";
        echo "<h3>🧪 Test Notifications</h3>";
        echo "<p>Click any button below to test that notification type:</p>";
        
        echo "<a href='" . base_url('notification_test/test_contact') . "' class='btn btn-success'>📞 Test Contact Form</a>";
        echo "<a href='" . base_url('notification_test/test_order') . "' class='btn btn-success'>🛒 Test Order Confirmation</a>";
        echo "<a href='" . base_url('notification_test/test_license') . "' class='btn btn-success'>🔑 Test License Delivery</a>";
        echo "<a href='" . base_url('notification_test/test_demo') . "' class='btn btn-success'>🎯 Test Demo Request</a>";
        echo "<a href='" . base_url('notification_test/test_newsletter') . "' class='btn btn-success'>📰 Test Newsletter Welcome</a>";
        echo "</div>";
        
        echo "<div class='test-section'>";
        echo "<h3>⚙️ WhatsApp Configuration</h3>";
        echo "<p>To enable WhatsApp notifications, configure one of these services in <code>application/config/whatsapp.php</code>:</p>";
        echo "<ul>";
        echo "<li><strong>Twilio:</strong> Set Account SID, Auth Token, and WhatsApp number</li>";
        echo "<li><strong>MSG91:</strong> Set Auth Key and Template ID</li>";
        echo "<li><strong>UltraMsg:</strong> Set Token and Instance ID</li>";
        echo "<li><strong>Basic:</strong> Generates WhatsApp links (manual sending)</li>";
        echo "</ul>";
        echo "</div>";
        
        echo "<div class='test-section'>";
        echo "<h3>📊 Notification Statistics</h3>";
        $stats = $this->notification_service->get_notification_stats(30);
        if (!empty($stats)) {
            echo "<p><strong>Last 30 days:</strong></p>";
            echo "<ul>";
            echo "<li>Total Notifications: " . $stats['total'] . "</li>";
            echo "<li>Email Success: " . $stats['email_success'] . "</li>";
            echo "<li>Email Failed: " . $stats['email_failed'] . "</li>";
            echo "<li>WhatsApp Success: " . $stats['whatsapp_success'] . "</li>";
            echo "<li>WhatsApp Failed: " . $stats['whatsapp_failed'] . "</li>";
            echo "</ul>";
            
            if (!empty($stats['by_type'])) {
                echo "<p><strong>By Type:</strong></p>";
                echo "<ul>";
                foreach ($stats['by_type'] as $type => $count) {
                    echo "<li>" . ucfirst(str_replace('_', ' ', $type)) . ": " . $count . "</li>";
                }
                echo "</ul>";
            }
        } else {
            echo "<p>No notification statistics available yet.</p>";
        }
        echo "</div>";
        
        echo "<p><a href='" . base_url() . "'>← Back to Homepage</a></p>";
    }
    
    public function test_contact()
    {
        echo "<h1>Testing Contact Form Notification</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        $test_data = [
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'phone' => '+919876543210',
            'company' => 'Test Company Ltd',
            'subject' => 'Technical Support',
            'message' => 'I need help setting up my POS system. Can someone assist me with the installation process?',
            'ip_address' => '192.168.1.100',
            'user_agent' => 'Mozilla/5.0 (Test Browser)'
        ];
        
        try {
            $results = $this->notification_service->send_notification('contact_form', $test_data);
            
            echo "<div class='success'>✅ Contact form notification test completed!</div>";
            echo "<h3>Test Results:</h3>";
            echo "<pre>" . print_r($results, true) . "</pre>";
            
        } catch (Exception $e) {
            echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('notification_test') . "'>← Back to Tests</a></p>";
    }
    
    public function test_order()
    {
        echo "<h1>Testing Order Confirmation Notification</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        $test_data = [
            'customer_name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'phone' => '+919876543211',
            'company_name' => 'Retail Store ABC',
            'order_id' => 'ORD-' . time(),
            'plan_name' => 'Growth',
            'plan_type' => 'retail',
            'billing_cycle' => 'yearly',
            'amount' => 25000,
            'customer_email' => 'jane.doe@example.com',
            'customer_phone' => '+919876543211'
        ];
        
        try {
            $results = $this->notification_service->send_notification('order_confirmation', $test_data);
            
            echo "<div class='success'>✅ Order confirmation notification test completed!</div>";
            echo "<h3>Test Results:</h3>";
            echo "<pre>" . print_r($results, true) . "</pre>";
            
        } catch (Exception $e) {
            echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('notification_test') . "'>← Back to Tests</a></p>";
    }
    
    public function test_license()
    {
        echo "<h1>Testing License Delivery Notification</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        $test_data = [
            'customer_name' => 'Mike Johnson',
            'email' => 'mike.johnson@example.com',
            'phone' => '+919876543212',
            'license_key' => 'TPOS-' . strtoupper(substr(md5(time()), 0, 8)),
            'plan_name' => 'Enterprise',
            'order_id' => 'ORD-' . time(),
            'download_link' => 'https://trulypos.com/download'
        ];
        
        try {
            $results = $this->notification_service->send_notification('license_delivery', $test_data);
            
            echo "<div class='success'>✅ License delivery notification test completed!</div>";
            echo "<h3>Test Results:</h3>";
            echo "<pre>" . print_r($results, true) . "</pre>";
            
        } catch (Exception $e) {
            echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('notification_test') . "'>← Back to Tests</a></p>";
    }
    
    public function test_demo()
    {
        echo "<h1>Testing Demo Request Notification</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        $test_data = [
            'name' => 'Sarah Wilson',
            'email' => 'sarah.wilson@example.com',
            'phone' => '+919876543213',
            'company' => 'Restaurant XYZ',
            'business_type' => 'Restaurant',
            'plan_interest' => 'Growth',
            'preferred_time' => 'Tomorrow 2 PM',
            'requirements' => 'Need a POS system for a multi-location restaurant chain with inventory management.'
        ];
        
        try {
            $results = $this->notification_service->send_notification('demo_request', $test_data);
            
            echo "<div class='success'>✅ Demo request notification test completed!</div>";
            echo "<h3>Test Results:</h3>";
            echo "<pre>" . print_r($results, true) . "</pre>";
            
        } catch (Exception $e) {
            echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('notification_test') . "'>← Back to Tests</a></p>";
    }
    
    public function test_newsletter()
    {
        echo "<h1>Testing Newsletter Welcome Notification</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        $test_data = [
            'email' => 'newsletter.test@example.com',
            'name' => 'Newsletter Subscriber'
        ];
        
        try {
            $results = $this->notification_service->send_notification('newsletter_welcome', $test_data);
            
            echo "<div class='success'>✅ Newsletter welcome notification test completed!</div>";
            echo "<h3>Test Results:</h3>";
            echo "<pre>" . print_r($results, true) . "</pre>";
            
        } catch (Exception $e) {
            echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('notification_test') . "'>← Back to Tests</a></p>";
    }
    
    public function whatsapp_test()
    {
        echo "<h1>WhatsApp Configuration Test</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .info { color: blue; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        echo "<div class='info'>Testing WhatsApp notification configuration...</div>";
        
        $test_data = [
            'phone' => '+919876543210',
            'customer_name' => 'Test Customer',
            'order_id' => 'TEST-123',
            'amount' => '25000',
            'plan_name' => 'Growth'
        ];
        
        try {
            $result = $this->notification_service->send_whatsapp('order_confirmation', $test_data);
            
            if ($result) {
                echo "<div class='success'>✅ WhatsApp test message sent successfully!</div>";
                echo "<h3>Result:</h3>";
                echo "<pre>" . print_r($result, true) . "</pre>";
            } else {
                echo "<div class='error'>❌ WhatsApp test failed. Check your configuration.</div>";
                echo "<p>Make sure you have configured your WhatsApp service in <code>application/config/whatsapp.php</code></p>";
            }
            
        } catch (Exception $e) {
            echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('notification_test') . "'>← Back to Tests</a></p>";
    }
}
?>
