<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setupdb extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Database Setup - TrulyPOS';
        
        // Check if database file exists
        $db_path = APPPATH . 'database/trulypos.db';
        $data['setup_complete'] = false;
        $data['db_exists'] = file_exists($db_path);
        
        if ($data['db_exists']) {
            // Database exists, mark as complete
            $data['setup_complete'] = true;
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
                throw new Exception('SQL file not found at: ' . $sql_file);
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
            $db_path = APPPATH . 'database/trulypos.db';
            
            if (!file_exists($db_path)) {
                throw new Exception('Database file does not exist');
            }
            
            // Simple SQLite test without CodeIgniter's database class
            $pdo = new PDO('sqlite:' . $db_path);
            $stmt = $pdo->query('SELECT COUNT(*) as count FROM settings');
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            echo json_encode([
                'success' => true,
                'message' => 'Database connection successful',
                'settings_count' => $result['count']
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Database test failed: ' . $e->getMessage()
            ]);
        }
    }
}
