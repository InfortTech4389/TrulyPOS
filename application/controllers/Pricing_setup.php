<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing_setup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {
        echo "<h1>Pricing Plans Database Setup</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .info { color: blue; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; text-decoration: none; display: inline-block; }
            .btn:hover { background: #0056b3; }
        </style>";

        echo "<div class='info'>This tool helps you manage pricing plans in the database.</div>";
        
        // Show current plans
        $this->show_current_plans();
        
        echo "<h3>Actions</h3>";
        echo "<a href='" . base_url('pricing_setup/update_plans') . "' class='btn'>Update Database Plans</a>";
        echo "<a href='" . base_url('pricing_setup/clear_plans') . "' class='btn' style='background: #dc3545;'>Clear All Plans</a>";
        echo "<a href='" . base_url('pricing') . "' class='btn' style='background: #28a745;'>View Pricing Page</a>";
        
        echo "<p><a href='" . base_url() . "'>← Back to Homepage</a></p>";
    }
    
    public function update_plans()
    {
        echo "<h1>Updating Pricing Plans</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        try {
            // Clear existing plans
            $this->db->query("DELETE FROM pricing_plans");
            
            // Insert updated plans
            $plans = [
                [
                    'name' => 'Starter',
                    'description' => 'Perfect for small retail businesses starting with POS',
                    'price' => 15000,
                    'currency' => 'INR',
                    'billing_cycle' => 'lifetime',
                    'features' => 'Core POS & Billing,GST Invoicing,Basic Inventory,Unlimited Invoices,Customer Database,Basic Reports,Email Support',
                    'max_users' => 3,
                    'max_locations' => 1,
                    'support_type' => 'email',
                    'is_popular' => 0,
                    'sort_order' => 1,
                    'status' => 'active'
                ],
                [
                    'name' => 'Growth',
                    'description' => 'Ideal for growing businesses with multiple locations',
                    'price' => 25000,
                    'currency' => 'INR',
                    'billing_cycle' => 'lifetime',
                    'features' => 'All Starter Features,Multi-Location Support,Advanced Inventory,Role-based Access,Mobile App Access,Advanced Reports,WhatsApp Support,CRM & Loyalty',
                    'max_users' => 10,
                    'max_locations' => 5,
                    'support_type' => 'priority',
                    'is_popular' => 1,
                    'sort_order' => 2,
                    'status' => 'active'
                ],
                [
                    'name' => 'Enterprise',
                    'description' => 'Complete solution for large businesses and chains',
                    'price' => 50000,
                    'currency' => 'INR',
                    'billing_cycle' => 'lifetime',
                    'features' => 'All Growth Features,Unlimited Users,Unlimited Locations,Advanced Analytics,Custom Reports,API Access,24/7 Phone Support,On-site Training,Dedicated Account Manager',
                    'max_users' => -1,
                    'max_locations' => -1,
                    'support_type' => 'phone',
                    'is_popular' => 0,
                    'sort_order' => 3,
                    'status' => 'active'
                ],
                [
                    'name' => 'Custom',
                    'description' => 'Tailored solutions for specific business requirements',
                    'price' => 0,
                    'currency' => 'INR',
                    'billing_cycle' => '',
                    'features' => 'All Enterprise Features,Custom Development,Third-party Integrations,Custom Workflows,Specialized Training,SLA-based Support',
                    'max_users' => -1,
                    'max_locations' => -1,
                    'support_type' => 'dedicated',
                    'is_popular' => 0,
                    'sort_order' => 4,
                    'status' => 'active'
                ]
            ];
            
            foreach ($plans as $plan) {
                $plan['created_at'] = date('Y-m-d H:i:s');
                $plan['updated_at'] = date('Y-m-d H:i:s');
                $this->db->insert('pricing_plans', $plan);
            }
            
            echo "<div class='success'>✓ Successfully updated " . count($plans) . " pricing plans in database!</div>";
            
            // Show updated plans
            $this->show_current_plans();
            
        } catch (Exception $e) {
            echo "<div class='error'>Error updating plans: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('pricing_setup') . "'>← Back to Setup</a> | <a href='" . base_url('pricing') . "'>View Pricing Page</a></p>";
    }
    
    public function clear_plans()
    {
        echo "<h1>Clearing Pricing Plans</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        </style>";
        
        try {
            $this->db->query("DELETE FROM pricing_plans");
            echo "<div class='success'>✓ All pricing plans cleared from database</div>";
            echo "<p>The pricing page will now show fallback static plans.</p>";
        } catch (Exception $e) {
            echo "<div class='error'>Error clearing plans: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('pricing_setup') . "'>← Back to Setup</a></p>";
    }
    
    private function show_current_plans()
    {
        echo "<h3>Current Plans in Database</h3>";
        
        try {
            $query = $this->db->query("SELECT * FROM pricing_plans ORDER BY sort_order ASC");
            $plans = $query->result();
            
            if (count($plans) > 0) {
                echo "<table style='border-collapse: collapse; width: 100%;'>";
                echo "<tr style='background: #f8f9fa;'>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Name</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Price</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Users</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Locations</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Popular</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Status</th>";
                echo "</tr>";
                
                foreach ($plans as $plan) {
                    echo "<tr>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $plan->name . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>";
                    if ($plan->price == 0) {
                        echo "Custom Quote";
                    } else {
                        echo "₹" . number_format($plan->price) . "/" . $plan->billing_cycle;
                    }
                    echo "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . ($plan->max_users == -1 ? 'Unlimited' : $plan->max_users) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . ($plan->max_locations == -1 ? 'Unlimited' : $plan->max_locations) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . ($plan->is_popular ? '⭐ Yes' : 'No') . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $plan->status . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                echo "<div style='color: #28a745; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0;'>";
                echo "✓ Found " . count($plans) . " pricing plans in database";
                echo "</div>";
            } else {
                echo "<div style='color: #856404; background: #fff3cd; padding: 10px; border-radius: 4px; margin: 10px 0;'>";
                echo "⚠ No pricing plans found in database. Pricing page will show fallback static plans.";
                echo "</div>";
            }
            
        } catch (Exception $e) {
            echo "<div style='color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0;'>";
            echo "Error loading plans: " . $e->getMessage();
            echo "</div>";
        }
    }
}
?>
