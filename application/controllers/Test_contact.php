<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Contact_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        echo "<h1>Contact Form Database Test</h1>";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .form-group { margin: 10px 0; }
            .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
            .form-group input, .form-group textarea { width: 100%; max-width: 400px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
            .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
            .btn:hover { background: #0056b3; }
            .success { color: green; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 4px; margin: 10px 0; }
            .error { color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px; margin: 10px 0; }
        </style>";

        // Handle form submission
        if ($this->input->post('submit')) {
            $this->test_contact_submission();
        }

        // Show form
        $this->show_contact_form();

        // Show existing contacts
        $this->show_existing_contacts();
    }

    private function test_contact_submission()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            echo "<div class='error'>Validation errors: " . validation_errors() . "</div>";
            return;
        }

        // Prepare contact data
        $contact_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'company' => $this->input->post('company'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'new'
        );

        try {
            // Insert contact
            $result = $this->Contact_model->insert_contact($contact_data);
            
            if ($result) {
                echo "<div class='success'>✓ Contact form submitted successfully! Data saved to database.</div>";
            } else {
                echo "<div class='error'>✗ Failed to save contact data to database.</div>";
            }
        } catch (Exception $e) {
            echo "<div class='error'>✗ Database error: " . $e->getMessage() . "</div>";
        }
    }

    private function show_contact_form()
    {
        echo "<h3>Test Contact Form</h3>";
        echo "<form method='post'>";
        
        echo "<div class='form-group'>";
        echo "<label for='name'>Name *</label>";
        echo "<input type='text' name='name' id='name' required value='" . set_value('name', 'John Test') . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='email'>Email *</label>";
        echo "<input type='email' name='email' id='email' required value='" . set_value('email', 'john.test@example.com') . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='phone'>Phone</label>";
        echo "<input type='text' name='phone' id='phone' value='" . set_value('phone', '9876543210') . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='company'>Company</label>";
        echo "<input type='text' name='company' id='company' value='" . set_value('company', 'Test Company') . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='subject'>Subject *</label>";
        echo "<input type='text' name='subject' id='subject' required value='" . set_value('subject', 'Database Integration Test') . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='message'>Message *</label>";
        echo "<textarea name='message' id='message' rows='4' required>" . set_value('message', 'This is a test message to verify database integration is working properly.') . "</textarea>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<button type='submit' name='submit' class='btn'>Submit Test Contact</button>";
        echo "</div>";

        echo "</form>";
    }

    private function show_existing_contacts()
    {
        echo "<h3>Existing Contacts in Database</h3>";
        
        try {
            // Get contact count
            $count = $this->Contact_model->get_contact_count();
            echo "<p>Total contacts in database: <strong>$count</strong></p>";

            // Get recent contacts
            $contacts = $this->Contact_model->get_contacts(5);
            
            if (count($contacts) > 0) {
                echo "<table style='border-collapse: collapse; width: 100%;'>";
                echo "<tr style='background: #f8f9fa;'>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Name</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Email</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Subject</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Date</th>";
                echo "<th style='border: 1px solid #ddd; padding: 8px;'>Status</th>";
                echo "</tr>";
                
                foreach ($contacts as $contact) {
                    echo "<tr>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($contact->name) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($contact->email) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($contact->subject) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($contact->created_at) . "</td>";
                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($contact->status) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No contacts found in database.</p>";
            }

        } catch (Exception $e) {
            echo "<div class='error'>Error loading contacts: " . $e->getMessage() . "</div>";
        }

        echo "<p><a href='" . base_url() . "'>← Back to Homepage</a> | <a href='" . base_url('contact') . "'>Contact Page</a></p>";
    }
}
?>
