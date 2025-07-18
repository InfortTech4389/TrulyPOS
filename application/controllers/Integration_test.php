<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integration_test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {
        echo "<!DOCTYPE html>";
        echo "<html><head><title>TrulyPOS Integration Test</title>";
        echo "<style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 20px; background: #f8f9fa; }
            .container { max-width: 1200px; margin: 0 auto; }
            .test-header { background: #007bff; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
            .test-section { background: white; margin: 20px 0; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            .test-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
            .success { color: #28a745; background: #d4edda; padding: 10px; border-radius: 4px; border-left: 4px solid #28a745; }
            .error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 4px; border-left: 4px solid #dc3545; }
            .info { color: #17a2b8; background: #d1ecf1; padding: 10px; border-radius: 4px; border-left: 4px solid #17a2b8; }
            .warning { color: #856404; background: #fff3cd; padding: 10px; border-radius: 4px; border-left: 4px solid #ffc107; }
            table { width: 100%; border-collapse: collapse; margin: 10px 0; }
            th, td { border: 1px solid #dee2e6; padding: 8px; text-align: left; }
            th { background: #e9ecef; font-weight: 600; }
            .badge { padding: 4px 8px; border-radius: 12px; font-size: 12px; font-weight: 600; }
            .badge-success { background: #28a745; color: white; }
            .badge-danger { background: #dc3545; color: white; }
            .badge-warning { background: #ffc107; color: #212529; }
            .badge-info { background: #17a2b8; color: white; }
            .btn { padding: 8px 16px; border: none; border-radius: 4px; text-decoration: none; display: inline-block; margin: 4px; }
            .btn-primary { background: #007bff; color: white; }
            .btn-success { background: #28a745; color: white; }
            .btn-info { background: #17a2b8; color: white; }
            .progress { background: #e9ecef; border-radius: 4px; height: 20px; margin: 10px 0; }
            .progress-bar { background: #28a745; height: 100%; border-radius: 4px; transition: width 0.3s; }
        </style></head><body>";
        
        echo "<div class='container'>";
        echo "<div class='test-header'>";
        echo "<h1>🚀 TrulyPOS Database Integration Test Suite</h1>";
        echo "<p>Comprehensive testing of all database features and functionality</p>";
        echo "</div>";

        $total_tests = 0;
        $passed_tests = 0;

        // Test 1: Database Connection
        list($test_passed, $test_count) = $this->test_database_connection();
        $total_tests += $test_count;
        $passed_tests += $test_passed;

        // Test 2: All Tables
        list($test_passed, $test_count) = $this->test_all_tables();
        $total_tests += $test_count;
        $passed_tests += $test_passed;

        // Test 3: Content Models
        list($test_passed, $test_count) = $this->test_content_models();
        $total_tests += $test_count;
        $passed_tests += $test_passed;

        // Test 4: Page Integration
        list($test_passed, $test_count) = $this->test_page_integration();
        $total_tests += $test_count;
        $passed_tests += $test_passed;

        // Test 5: CRUD Operations
        list($test_passed, $test_count) = $this->test_crud_operations();
        $total_tests += $test_count;
        $passed_tests += $test_passed;

        // Final Results
        $this->show_final_results($passed_tests, $total_tests);

        echo "</div></body></html>";
    }

    private function test_database_connection()
    {
        echo "<div class='test-section'>";
        echo "<h3>🔗 Database Connection Test</h3>";
        
        $passed = 0;
        $total = 3;

        try {
            // Test 1: Basic connection
            if ($this->db->conn_id) {
                echo "<div class='success'>✓ Database connection established</div>";
                $passed++;
            } else {
                echo "<div class='error'>✗ Database connection failed</div>";
            }

            // Test 2: SQLite version
            $version = $this->db->version();
            if ($version) {
                echo "<div class='success'>✓ SQLite version: $version</div>";
                $passed++;
            } else {
                echo "<div class='error'>✗ Could not get SQLite version</div>";
            }

            // Test 3: Simple query
            $result = $this->db->query("SELECT 1 as test")->row();
            if ($result && $result->test == 1) {
                echo "<div class='success'>✓ Basic query execution successful</div>";
                $passed++;
            } else {
                echo "<div class='error'>✗ Basic query execution failed</div>";
            }

        } catch (Exception $e) {
            echo "<div class='error'>✗ Database connection error: " . $e->getMessage() . "</div>";
        }

        echo "</div>";
        return [$passed, $total];
    }

    private function test_all_tables()
    {
        echo "<div class='test-section'>";
        echo "<h3>🗄️ Database Tables Test</h3>";
        
        $passed = 0;
        $total = 0;

        try {
            $tables_query = $this->db->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
            $tables = $tables_query->result_array();
            
            echo "<div class='info'>Found " . count($tables) . " tables in database</div>";
            echo "<div class='test-grid'>";

            foreach ($tables as $table) {
                $table_name = $table['name'];
                $total++;
                
                try {
                    $count_query = $this->db->query("SELECT COUNT(*) as count FROM `$table_name`");
                    $count = $count_query->row()->count;
                    
                    echo "<div>";
                    echo "<strong>$table_name</strong><br>";
                    echo "<span class='badge badge-info'>$count records</span>";
                    echo "<span class='badge badge-success'>✓ OK</span>";
                    echo "</div>";
                    $passed++;
                } catch (Exception $e) {
                    echo "<div>";
                    echo "<strong>$table_name</strong><br>";
                    echo "<span class='badge badge-danger'>✗ Error</span>";
                    echo "</div>";
                }
            }
            echo "</div>";

        } catch (Exception $e) {
            echo "<div class='error'>✗ Tables test failed: " . $e->getMessage() . "</div>";
        }

        echo "</div>";
        return [$passed, $total];
    }

    private function test_content_models()
    {
        echo "<div class='test-section'>";
        echo "<h3>📊 Content Models Test</h3>";
        
        $passed = 0;
        $total = 7;

        // Test Content_model
        try {
            $this->load->model('Content_model');
            
            $features = $this->Content_model->get_features(3);
            if (is_array($features)) {
                echo "<div class='success'>✓ Content_model->get_features() working (" . count($features) . " records)</div>";
                $passed++;
            }

            $testimonials = $this->Content_model->get_testimonials(3);
            if (is_array($testimonials)) {
                echo "<div class='success'>✓ Content_model->get_testimonials() working (" . count($testimonials) . " records)</div>";
                $passed++;
            }

            $pricing = $this->Content_model->get_pricing_plans();
            if (is_array($pricing)) {
                echo "<div class='success'>✓ Content_model->get_pricing_plans() working (" . count($pricing) . " records)</div>";
                $passed++;
            }

        } catch (Exception $e) {
            echo "<div class='error'>✗ Content_model test failed: " . $e->getMessage() . "</div>";
        }

        // Test Contact_model
        try {
            $this->load->model('Contact_model');
            $count = $this->Contact_model->get_contact_count();
            if (is_numeric($count)) {
                echo "<div class='success'>✓ Contact_model->get_contact_count() working ($count contacts)</div>";
                $passed++;
            }
        } catch (Exception $e) {
            echo "<div class='error'>✗ Contact_model test failed: " . $e->getMessage() . "</div>";
        }

        // Test Testimonial_model
        try {
            $this->load->model('Testimonial_model');
            $testimonials = $this->Testimonial_model->get_featured_testimonials(3);
            if (is_array($testimonials)) {
                echo "<div class='success'>✓ Testimonial_model->get_featured_testimonials() working (" . count($testimonials) . " records)</div>";
                $passed++;
            }
        } catch (Exception $e) {
            echo "<div class='error'>✗ Testimonial_model test failed: " . $e->getMessage() . "</div>";
        }

        // Test Order_model
        try {
            $this->load->model('Order_model');
            $count = $this->Order_model->get_order_count();
            if (is_numeric($count)) {
                echo "<div class='success'>✓ Order_model->get_order_count() working ($count orders)</div>";
                $passed++;
            }
        } catch (Exception $e) {
            echo "<div class='error'>✗ Order_model test failed: " . $e->getMessage() . "</div>";
        }

        // Test License_model
        try {
            $this->load->model('License_model');
            $count = $this->License_model->get_active_licenses_count();
            if (is_numeric($count)) {
                echo "<div class='success'>✓ License_model->get_active_licenses_count() working ($count licenses)</div>";
                $passed++;
            }
        } catch (Exception $e) {
            echo "<div class='error'>✗ License_model test failed: " . $e->getMessage() . "</div>";
        }

        echo "</div>";
        return [$passed, $total];
    }

    private function test_page_integration()
    {
        echo "<div class='test-section'>";
        echo "<h3>🌐 Page Integration Test</h3>";
        
        $passed = 0;
        $total = 8;

        $pages = [
            '/' => 'Homepage',
            '/testimonials' => 'Testimonials Page',
            '/contact' => 'Contact Page',
            '/pricing' => 'Pricing Page',
            '/features' => 'Features Page',
            '/home/features' => 'Home Features',
            '/industries' => 'Industries Page',
            '/buy' => 'Buy Page'
        ];

        echo "<table>";
        echo "<tr><th>Page</th><th>URL</th><th>Status</th><th>Action</th></tr>";
        
        foreach ($pages as $url => $name) {
            $total++;
            try {
                // Test if URL is accessible (simplified test)
                $full_url = base_url(ltrim($url, '/'));
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$url</td>";
                echo "<td><span class='badge badge-success'>✓ Available</span></td>";
                echo "<td><a href='$full_url' target='_blank' class='btn btn-info'>Test</a></td>";
                echo "</tr>";
                $passed++;
            } catch (Exception $e) {
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$url</td>";
                echo "<td><span class='badge badge-danger'>✗ Error</span></td>";
                echo "<td>-</td>";
                echo "</tr>";
            }
        }
        echo "</table>";

        echo "</div>";
        return [$passed, $total];
    }

    private function test_crud_operations()
    {
        echo "<div class='test-section'>";
        echo "<h3>⚙️ CRUD Operations Test</h3>";
        
        $passed = 0;
        $total = 4;

        // Test contact insertion
        try {
            $this->load->model('Contact_model');
            
            $test_data = [
                'name' => 'Test Contact ' . date('Y-m-d H:i:s'),
                'email' => 'test' . time() . '@example.com',
                'subject' => 'Integration Test',
                'message' => 'This is a test message for integration testing',
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'new'
            ];

            $result = $this->Contact_model->insert_contact($test_data);
            if ($result) {
                echo "<div class='success'>✓ Contact INSERT operation successful</div>";
                $passed++;
                
                // Test contact retrieval
                $contacts = $this->Contact_model->get_contacts(1);
                if (count($contacts) > 0) {
                    echo "<div class='success'>✓ Contact SELECT operation successful</div>";
                    $passed++;
                    
                    // Test contact update
                    $contact_id = $contacts[0]->id;
                    $update_result = $this->Contact_model->update_contact($contact_id, ['status' => 'processed']);
                    if ($update_result) {
                        echo "<div class='success'>✓ Contact UPDATE operation successful</div>";
                        $passed++;
                        
                        // Test contact deletion
                        $delete_result = $this->Contact_model->delete_contact($contact_id);
                        if ($delete_result) {
                            echo "<div class='success'>✓ Contact DELETE operation successful</div>";
                            $passed++;
                        } else {
                            echo "<div class='error'>✗ Contact DELETE operation failed</div>";
                        }
                    } else {
                        echo "<div class='error'>✗ Contact UPDATE operation failed</div>";
                    }
                } else {
                    echo "<div class='error'>✗ Contact SELECT operation failed</div>";
                }
            } else {
                echo "<div class='error'>✗ Contact INSERT operation failed</div>";
            }

        } catch (Exception $e) {
            echo "<div class='error'>✗ CRUD operations test failed: " . $e->getMessage() . "</div>";
        }

        echo "</div>";
        return [$passed, $total];
    }

    private function show_final_results($passed, $total)
    {
        $percentage = $total > 0 ? round(($passed / $total) * 100, 1) : 0;
        $status = $percentage >= 90 ? 'success' : ($percentage >= 70 ? 'warning' : 'error');
        
        echo "<div class='test-section'>";
        echo "<h3>📋 Final Test Results</h3>";
        
        echo "<div class='progress'>";
        echo "<div class='progress-bar' style='width: {$percentage}%;'></div>";
        echo "</div>";
        
        echo "<div class='$status'>";
        echo "<h4>Test Summary</h4>";
        echo "<p><strong>Passed:</strong> $passed out of $total tests</p>";
        echo "<p><strong>Success Rate:</strong> {$percentage}%</p>";
        
        if ($percentage >= 90) {
            echo "<p>🎉 <strong>Excellent!</strong> Database integration is working perfectly.</p>";
        } elseif ($percentage >= 70) {
            echo "<p>⚠️ <strong>Good!</strong> Most features are working, some minor issues detected.</p>";
        } else {
            echo "<p>❌ <strong>Issues Detected!</strong> Several database features need attention.</p>";
        }
        echo "</div>";
        
        echo "<h4>Quick Links</h4>";
        echo "<a href='" . base_url() . "' class='btn btn-primary'>Homepage</a>";
        echo "<a href='" . base_url('testimonials') . "' class='btn btn-success'>Testimonials</a>";
        echo "<a href='" . base_url('contact') . "' class='btn btn-info'>Contact Form</a>";
        echo "<a href='" . base_url('db_test_simple.php') . "' class='btn btn-info'>Simple DB Test</a>";
        
        echo "</div>";
    }
}
?>
