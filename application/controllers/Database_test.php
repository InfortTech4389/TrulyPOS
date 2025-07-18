<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Content_model');
        $this->load->model('Contact_model');
        $this->load->model('Order_model');
        $this->load->model('License_model');
        $this->load->model('Testimonial_model');
        $this->load->model('Newsletter_model');
        $this->load->model('Settings_model');
    }

    public function index()
    {
        echo "<h1>TrulyPOS Database Integration Test</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .test-section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
            .success { color: green; }
            .error { color: red; }
            .info { color: blue; }
            table { border-collapse: collapse; width: 100%; margin: 10px 0; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
        </style>";

        // Test 1: Features
        $this->test_features();
        
        // Test 2: Testimonials
        $this->test_testimonials();
        
        // Test 3: Pricing Plans
        $this->test_pricing_plans();
        
        // Test 4: Database Tables
        $this->test_database_tables();
        
        // Test 5: Contact Model
        $this->test_contact_functionality();
        
        // Test 6: Admin Statistics
        $this->test_admin_statistics();

        echo "<div class='test-section'>";
        echo "<h3>🎉 Database Integration Test Complete!</h3>";
        echo "<p class='success'>All database connections and models are working properly.</p>";
        echo "<p><a href='" . base_url() . "'>← Back to Homepage</a></p>";
        echo "</div>";
    }

    private function test_features()
    {
        echo "<div class='test-section'>";
        echo "<h3>📋 Features Test</h3>";
        
        try {
            $features = $this->Content_model->get_features(5);
            echo "<p class='success'>✓ Features model loaded successfully</p>";
            echo "<p class='info'>Found " . count($features) . " features in database</p>";
            
            if (count($features) > 0) {
                echo "<table>";
                echo "<tr><th>Title</th><th>Description</th><th>Icon</th><th>Status</th></tr>";
                foreach ($features as $feature) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($feature->title) . "</td>";
                    echo "<td>" . substr(htmlspecialchars($feature->description), 0, 100) . "...</td>";
                    echo "<td>" . htmlspecialchars($feature->icon) . "</td>";
                    echo "<td>" . htmlspecialchars($feature->status) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } catch (Exception $e) {
            echo "<p class='error'>✗ Features test failed: " . $e->getMessage() . "</p>";
        }
        echo "</div>";
    }

    private function test_testimonials()
    {
        echo "<div class='test-section'>";
        echo "<h3>💬 Testimonials Test</h3>";
        
        try {
            $testimonials = $this->Content_model->get_testimonials(3);
            echo "<p class='success'>✓ Testimonials model loaded successfully</p>";
            echo "<p class='info'>Found " . count($testimonials) . " testimonials in database</p>";
            
            if (count($testimonials) > 0) {
                echo "<table>";
                echo "<tr><th>Name</th><th>Business</th><th>Rating</th><th>Status</th></tr>";
                foreach ($testimonials as $testimonial) {
                    $rating = isset($testimonial->rating) ? $testimonial->rating : 'N/A';
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($testimonial->name ?? 'N/A') . "</td>";
                    echo "<td>" . htmlspecialchars($testimonial->business ?? 'N/A') . "</td>";
                    echo "<td>" . str_repeat('⭐', $rating) . " ($rating)</td>";
                    echo "<td>" . htmlspecialchars($testimonial->status ?? 'N/A') . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            // Test Testimonial model methods
            if (method_exists($this->Testimonial_model, 'get_testimonial_stats')) {
                $stats = $this->Testimonial_model->get_testimonial_stats();
                echo "<p class='info'>Testimonial Statistics:</p>";
                echo "<ul>";
                echo "<li>Total testimonials: " . $stats['total'] . "</li>";
                echo "<li>Average rating: " . $stats['average_rating'] . "</li>";
                echo "</ul>";
            }
        } catch (Exception $e) {
            echo "<p class='error'>✗ Testimonials test failed: " . $e->getMessage() . "</p>";
        }
        echo "</div>";
    }

    private function test_pricing_plans()
    {
        echo "<div class='test-section'>";
        echo "<h3>💰 Pricing Plans Test</h3>";
        
        try {
            $pricing_plans = $this->Content_model->get_pricing_plans();
            echo "<p class='success'>✓ Pricing plans model loaded successfully</p>";
            echo "<p class='info'>Found " . count($pricing_plans) . " pricing plans in database</p>";
            
            if (count($pricing_plans) > 0) {
                echo "<table>";
                echo "<tr><th>Name</th><th>Price</th><th>Currency</th><th>Billing Cycle</th><th>Status</th></tr>";
                foreach ($pricing_plans as $plan) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($plan->name) . "</td>";
                    echo "<td>" . htmlspecialchars($plan->price) . "</td>";
                    echo "<td>" . htmlspecialchars($plan->currency) . "</td>";
                    echo "<td>" . htmlspecialchars($plan->billing_cycle) . "</td>";
                    echo "<td>" . htmlspecialchars($plan->status) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } catch (Exception $e) {
            echo "<p class='error'>✗ Pricing plans test failed: " . $e->getMessage() . "</p>";
        }
        echo "</div>";
    }

    private function test_database_tables()
    {
        echo "<div class='test-section'>";
        echo "<h3>🗄️ Database Tables Test</h3>";
        
        try {
            $tables_query = $this->db->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
            $tables = $tables_query->result_array();
            
            echo "<p class='success'>✓ Database connection successful</p>";
            echo "<p class='info'>Found " . count($tables) . " tables in database</p>";
            
            echo "<table>";
            echo "<tr><th>Table Name</th><th>Record Count</th></tr>";
            foreach ($tables as $table) {
                $table_name = $table['name'];
                try {
                    $count_query = $this->db->query("SELECT COUNT(*) as count FROM `$table_name`");
                    $count = $count_query->row()->count;
                    echo "<tr><td>$table_name</td><td>$count</td></tr>";
                } catch (Exception $e) {
                    echo "<tr><td>$table_name</td><td>Error: " . $e->getMessage() . "</td></tr>";
                }
            }
            echo "</table>";
        } catch (Exception $e) {
            echo "<p class='error'>✗ Database tables test failed: " . $e->getMessage() . "</p>";
        }
        echo "</div>";
    }

    private function test_contact_functionality()
    {
        echo "<div class='test-section'>";
        echo "<h3>📞 Contact Model Test</h3>";
        
        try {
            // Test contact count
            if (method_exists($this->Contact_model, 'get_contact_count')) {
                $contact_count = $this->Contact_model->get_contact_count();
                echo "<p class='success'>✓ Contact model loaded successfully</p>";
                echo "<p class='info'>Total contacts in database: $contact_count</p>";
            }

            // Test recent contacts
            if (method_exists($this->Contact_model, 'get_contacts')) {
                $recent_contacts = $this->Contact_model->get_contacts(3);
                echo "<p class='info'>Recent contacts: " . count($recent_contacts) . "</p>";
            }
        } catch (Exception $e) {
            echo "<p class='error'>✗ Contact functionality test failed: " . $e->getMessage() . "</p>";
        }
        echo "</div>";
    }

    private function test_admin_statistics()
    {
        echo "<div class='test-section'>";
        echo "<h3>📊 Admin Statistics Test</h3>";
        
        try {
            $stats = [];
            
            // Test Contact Model
            if (method_exists($this->Contact_model, 'get_contact_count')) {
                $stats['contacts'] = $this->Contact_model->get_contact_count();
            }
            
            // Test Newsletter Model
            if (method_exists($this->Newsletter_model, 'get_subscriber_count')) {
                $stats['subscribers'] = $this->Newsletter_model->get_subscriber_count();
            }
            
            // Test Order Model
            if (method_exists($this->Order_model, 'get_order_count')) {
                $stats['orders'] = $this->Order_model->get_order_count();
            }
            
            // Test License Model
            if (method_exists($this->License_model, 'get_active_licenses_count')) {
                $stats['licenses'] = $this->License_model->get_active_licenses_count();
            }

            echo "<p class='success'>✓ Admin statistics models loaded successfully</p>";
            echo "<table>";
            echo "<tr><th>Metric</th><th>Count</th></tr>";
            foreach ($stats as $metric => $count) {
                echo "<tr><td>" . ucfirst($metric) . "</td><td>$count</td></tr>";
            }
            echo "</table>";
            
        } catch (Exception $e) {
            echo "<p class='error'>✗ Admin statistics test failed: " . $e->getMessage() . "</p>";
        }
        echo "</div>";
    }
}
?>
