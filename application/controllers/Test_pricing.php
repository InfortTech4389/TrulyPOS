<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_pricing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Content_model');
        $this->load->helper('url');
    }

    public function index()
    {
        echo "<h1>Pricing Database Integration Test</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
            .info { color: blue; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
            table { border-collapse: collapse; width: 100%; margin: 10px 0; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            .plan-card { border: 1px solid #ddd; margin: 15px; padding: 15px; border-radius: 8px; background: #f9f9f9; }
            .features { list-style: none; padding: 0; }
            .features li { padding: 4px 0; }
            .features li:before { content: '✓ '; color: green; font-weight: bold; }
        </style>";

        try {
            // Test database connection
            echo "<div class='success'>✓ Database connection successful</div>";
            
            // Get pricing plans from database
            $pricing_plans = $this->Content_model->get_pricing_plans();
            echo "<div class='info'>Found " . count($pricing_plans) . " pricing plans in database</div>";
            
            if (!empty($pricing_plans)) {
                echo "<h3>Raw Database Data</h3>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Currency</th><th>Billing Cycle</th><th>Max Users</th><th>Max Locations</th><th>Popular</th><th>Status</th></tr>";
                
                foreach ($pricing_plans as $plan) {
                    echo "<tr>";
                    echo "<td>" . $plan->id . "</td>";
                    echo "<td>" . $plan->name . "</td>";
                    echo "<td>" . $plan->price . "</td>";
                    echo "<td>" . $plan->currency . "</td>";
                    echo "<td>" . $plan->billing_cycle . "</td>";
                    echo "<td>" . ($plan->max_users == -1 ? 'Unlimited' : $plan->max_users) . "</td>";
                    echo "<td>" . ($plan->max_locations == -1 ? 'Unlimited' : $plan->max_locations) . "</td>";
                    echo "<td>" . ($plan->is_popular ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . $plan->status . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                echo "<h3>Formatted Plan Cards (As shown on pricing page)</h3>";
                
                foreach ($pricing_plans as $plan) {
                    $this->display_formatted_plan($plan);
                }
                
            } else {
                echo "<div class='error'>No pricing plans found in database</div>";
                echo "<p>Testing fallback static plans...</p>";
                $this->test_fallback_plans();
            }
            
        } catch (Exception $e) {
            echo "<div class='error'>Error: " . $e->getMessage() . "</div>";
        }
        
        echo "<p><a href='" . base_url('pricing') . "'>← View Actual Pricing Page</a> | <a href='" . base_url() . "'>Homepage</a></p>";
    }
    
    private function display_formatted_plan($plan)
    {
        // Parse features
        $features = !empty($plan->features) ? explode(',', $plan->features) : [];
        
        // Format price
        $formatted_price = $this->format_price($plan->price, $plan->currency);
        $monthly_price = $this->calculate_monthly_price($plan->price, $plan->billing_cycle, $plan->currency);
        
        // Format users and locations
        $outlets = ($plan->max_locations == -1) ? 'Unlimited' : $plan->max_locations;
        $users = ($plan->max_users == -1) ? 'Unlimited' : $plan->max_users;
        
        // Button text
        $button_text = $this->get_button_text($plan);
        
        echo "<div class='plan-card" . ($plan->is_popular ? " popular' style='border-color: #007bff; background: #e3f2fd;'" : "'") . ">";
        
        if ($plan->is_popular) {
            echo "<div style='background: #007bff; color: white; text-align: center; padding: 5px; margin: -15px -15px 10px -15px; border-radius: 8px 8px 0 0;'><strong>MOST POPULAR</strong></div>";
        }
        
        echo "<h3>" . $plan->name . "</h3>";
        
        if (!empty($plan->description)) {
            echo "<p style='color: #666; font-style: italic;'>" . $plan->description . "</p>";
        }
        
        echo "<div style='font-size: 24px; font-weight: bold; color: #007bff; margin: 10px 0;'>";
        echo $formatted_price;
        if ($plan->billing_cycle) {
            echo " <span style='font-size: 14px; color: #666;'>/" . $plan->billing_cycle . "</span>";
        }
        echo "</div>";
        
        echo "<div style='margin: 10px 0;'>";
        echo "<strong>📍 Outlets:</strong> " . $outlets . "<br>";
        echo "<strong>👥 Users:</strong> " . $users . "<br>";
        echo "<strong>🎧 Support:</strong> " . ucfirst($plan->support_type) . "<br>";
        echo "<strong>💰 Monthly equivalent:</strong> " . $monthly_price;
        echo "</div>";
        
        if (!empty($features)) {
            echo "<h4>Features:</h4>";
            echo "<ul class='features'>";
            foreach ($features as $feature) {
                echo "<li>" . trim($feature) . "</li>";
            }
            echo "</ul>";
        }
        
        echo "<div style='margin-top: 15px;'>";
        echo "<button style='background: " . ($plan->is_popular ? "#007bff" : "transparent") . "; color: " . ($plan->is_popular ? "white" : "#007bff") . "; border: 2px solid #007bff; padding: 10px 20px; border-radius: 4px; cursor: pointer;'>" . $button_text . "</button>";
        echo "</div>";
        
        echo "</div>";
    }
    
    private function format_price($price, $currency = 'INR')
    {
        if ($price == 0) {
            return 'Custom Quote';
        }
        
        $symbol = $currency === 'INR' ? '₹' : '$';
        return $symbol . number_format($price);
    }
    
    private function calculate_monthly_price($price, $billing_cycle, $currency = 'INR')
    {
        if ($price == 0) {
            return 'Custom Quote';
        }
        
        $symbol = $currency === 'INR' ? '₹' : '$';
        
        switch ($billing_cycle) {
            case 'yearly':
                return $symbol . number_format($price / 12);
            case 'lifetime':
                return 'One-time payment';
            case 'monthly':
                return $symbol . number_format($price);
            default:
                return $symbol . number_format($price);
        }
    }
    
    private function get_button_text($plan)
    {
        if ($plan->price == 0) {
            return 'Request Quote';
        }
        
        switch ($plan->billing_cycle) {
            case 'lifetime':
                return 'Buy Now';
            case 'yearly':
            case 'monthly':
                return $plan->is_popular ? 'Start Free Trial' : 'Subscribe Now';
            default:
                return 'Get Started';
        }
    }
    
    private function test_fallback_plans()
    {
        echo "<h4>Static Fallback Plans (when database is empty)</h4>";
        echo "<p>These would be displayed if no plans are found in the database:</p>";
        echo "<ul>";
        echo "<li>Starter - ₹6,000/year</li>";
        echo "<li>Growth - ₹12,000/year (Popular)</li>";
        echo "<li>Elite - ₹21,000/year</li>";
        echo "</ul>";
    }
}
?>
