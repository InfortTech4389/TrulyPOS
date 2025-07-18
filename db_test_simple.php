<?php
// Simple SQLite database connection test
$db_path = './application/database/trulypos.db';

echo "<h2>TrulyPOS Database Connection Test</h2>";

// Check if SQLite extension is loaded
if (!extension_loaded('sqlite3')) {
    echo "<p style='color: red;'>✗ SQLite3 extension not loaded!</p>";
    exit;
}

echo "<p style='color: green;'>✓ SQLite3 extension is loaded</p>";

// Check if database file exists
if (!file_exists($db_path)) {
    echo "<p style='color: red;'>✗ Database file not found at: $db_path</p>";
    exit;
}

echo "<p style='color: green;'>✓ Database file exists</p>";
echo "<p>Database path: " . realpath($db_path) . "</p>";
echo "<p>Database size: " . filesize($db_path) . " bytes</p>";

try {
    // Try to connect to the database
    $db = new SQLite3($db_path);
    echo "<p style='color: green;'>✓ Successfully connected to SQLite database</p>";
    
    // Get SQLite version
    $version = $db->version();
    echo "<p>SQLite version: " . $version['versionString'] . "</p>";
    
    // List all tables
    $query = $db->query("SELECT name FROM sqlite_master WHERE type='table';");
    $tables = [];
    while ($row = $query->fetchArray()) {
        $tables[] = $row['name'];
    }
    
    if (count($tables) > 0) {
        echo "<p style='color: green;'>✓ Found " . count($tables) . " tables in database</p>";
        echo "<h3>Tables:</h3><ul>";
        foreach ($tables as $table) {
            echo "<li>$table</li>";
        }
        echo "</ul>";
        
        // Test a simple query on features table
        $features_query = $db->query("SELECT COUNT(*) as count FROM features;");
        $features_count = $features_query->fetchArray();
        echo "<p>Features table has " . $features_count['count'] . " records</p>";
        
        // Test a simple query on testimonials table
        $testimonials_query = $db->query("SELECT COUNT(*) as count FROM testimonials;");
        $testimonials_count = $testimonials_query->fetchArray();
        echo "<p>Testimonials table has " . $testimonials_count['count'] . " records</p>";
        
        // Test a simple query on pricing_plans table
        $pricing_query = $db->query("SELECT COUNT(*) as count FROM pricing_plans;");
        $pricing_count = $pricing_query->fetchArray();
        echo "<p>Pricing plans table has " . $pricing_count['count'] . " records</p>";
        
        echo "<p style='color: green;'>✓ Database queries executed successfully!</p>";
        
    } else {
        echo "<p style='color: orange;'>⚠ No tables found in database</p>";
    }
    
    $db->close();
    echo "<p style='color: green;'>✓ Database connection test completed successfully!</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database error: " . $e->getMessage() . "</p>";
}
?>
