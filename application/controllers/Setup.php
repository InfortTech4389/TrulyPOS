<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Database Setup - TrulyPOS';
        
        // Check if database file exists and has tables
        $db_path = APPPATH . 'database/trulypos.db';
        $data['setup_complete'] = false;
        $data['db_exists'] = file_exists($db_path);
        
        if ($data['db_exists']) {
            // Try to connect and check for tables
            try {
                $this->load->database();
                if (method_exists($this->db, 'table_exists') && $this->db->table_exists('settings')) {
                    $data['setup_complete'] = true;
                }
            } catch (Exception $e) {
                $data['error'] = $e->getMessage();
            }
        }
        
        $this->load->view('setup/index', $data);
    }

    public function run()
    {
        header('Content-Type: application/json');
        
        try {
            $db_path = APPPATH . 'database/trulypos.db';
            $sql_file = FCPATH . 'database/trulypos_sqlite.sql';
            
            if (!file_exists($sql_file)) {
                throw new Exception('SQL file not found');
            }
            
            // Create database directory if it doesn't exist
            $db_dir = dirname($db_path);
            if (!is_dir($db_dir)) {
                mkdir($db_dir, 0755, true);
            }
            
            // Create/recreate the database
            if (file_exists($db_path)) {
                unlink($db_path); // Remove existing database
            }
            
            // Use sqlite3 command to create database
            $command = "sqlite3 '$db_path' < '$sql_file' 2>&1";
            exec($command, $output, $return_code);
            
            if ($return_code !== 0) {
                throw new Exception('Failed to create database: ' . implode("\n", $output));
            }
            
            // Verify database was created
            if (!file_exists($db_path)) {
                throw new Exception('Database file was not created');
            }
            
            // Try to connect and verify tables
            $this->load->database();
            
            if (!$this->db->table_exists('settings')) {
                throw new Exception('Settings table was not created');
            }
            
            echo json_encode([
                'success' => true, 
                'message' => 'Database setup completed successfully!'
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                'success' => false, 
                'message' => 'Setup failed: ' . $e->getMessage()
            ]);
        }
    }

    public function test()
    {
        header('Content-Type: application/json');
        
        try {
            $this->load->database();
            
            // Test database connection
            $query = $this->db->query('SELECT COUNT(*) as count FROM settings');
            $result = $query->row();
            
            echo json_encode([
                'success' => true,
                'message' => 'Database connection successful',
                'settings_count' => $result->count
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Database test failed: ' . $e->getMessage()
            ]);
        }
    }
}
