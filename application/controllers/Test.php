<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function index()
    {
        echo "Hello World from CodeIgniter!";
    }
    
    public function db_test()
    {
        echo "<h2>Database Connection Test</h2>";
        
        try {
            // Test basic connection
            if ($this->db->conn_id) {
                echo "<p style='color: green;'>✓ Database connection successful!</p>";
                
                // Get database version info
                $version = $this->db->version();
                echo "<p>Database Type: SQLite</p>";
                echo "<p>SQLite Version: " . $version . "</p>";
                
                // Test if we can run a simple query
                $query = $this->db->query("SELECT name FROM sqlite_master WHERE type='table';");
                if ($query) {
                    echo "<p style='color: green;'>✓ Database query execution successful!</p>";
                    
                    $tables = $query->result_array();
                    if (count($tables) > 0) {
                        echo "<h3>Database Tables Found:</h3>";
                        echo "<ul>";
                        foreach ($tables as $table) {
                            echo "<li>" . $table['name'] . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p style='color: orange;'>⚠ No tables found in database</p>";
                    }
                } else {
                    echo "<p style='color: red;'>✗ Database query execution failed!</p>";
                }
                
                // Database file info
                $db_path = APPPATH . 'database/trulypos.db';
                if (file_exists($db_path)) {
                    echo "<p>Database file exists at: " . $db_path . "</p>";
                    echo "<p>Database file size: " . filesize($db_path) . " bytes</p>";
                } else {
                    echo "<p style='color: red;'>✗ Database file not found!</p>";
                }
                
            } else {
                echo "<p style='color: red;'>✗ Database connection failed!</p>";
            }
        } catch (Exception $e) {
            echo "<p style='color: red;'>✗ Database error: " . $e->getMessage() . "</p>";
        }
    }
}
?>
