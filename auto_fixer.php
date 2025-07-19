<?php
/**
 * TrulyPOS Auto Fixer
 * Automated deployment issue resolution tool
 */

// Security check
$deployment_key = 'trulypos_deploy_2025';
if (!isset($_GET['key']) || $_GET['key'] !== $deployment_key) {
    die('Access denied. Use deployment_checker.php to access this tool.');
}

class AutoFixer {
    private $fixes_applied = [];
    private $errors = [];
    private $log = [];
    
    public function __construct() {
        $this->log('Auto Fixer initialized');
    }
    
    private function log($message) {
        $this->log[] = date('Y-m-d H:i:s') . ' - ' . $message;
    }
    
    public function runAllFixes() {
        $this->fixDirectoryPermissions();
        $this->createMissingDirectories();
        $this->fixHTAccess();
        $this->fixBaseURL();
        $this->createMissingTables();
        $this->fixConfigFiles();
        $this->updateSecuritySettings();
    }
    
    private function fixDirectoryPermissions() {
        $dirs_to_fix = [
            'application/cache' => 0755,
            'application/logs' => 0755,
            'assets/uploads' => 0755
        ];
        
        foreach ($dirs_to_fix as $dir => $permission) {
            if (is_dir($dir)) {
                if (chmod($dir, $permission)) {
                    $this->fixes_applied[] = "Set permissions for $dir to " . decoct($permission);
                    $this->log("Fixed permissions for $dir");
                } else {
                    $this->errors[] = "Failed to set permissions for $dir";
                }
            }
        }
    }
    
    private function createMissingDirectories() {
        $required_dirs = [
            'application/cache',
            'application/logs',
            'assets/uploads'
        ];
        
        foreach ($required_dirs as $dir) {
            if (!is_dir($dir)) {
                if (mkdir($dir, 0755, true)) {
                    $this->fixes_applied[] = "Created missing directory: $dir";
                    $this->log("Created directory $dir");
                } else {
                    $this->errors[] = "Failed to create directory: $dir";
                }
            }
        }
    }
    
    private function fixHTAccess() {
        $htaccess_content = 'RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

# Protect application folder
RewriteCond %{REQUEST_URI} ^/application.*
RewriteRule ^(.*)$ /index.php [L]

# Protect system folder
RewriteCond %{REQUEST_URI} ^/system.*
RewriteRule ^(.*)$ /index.php [L]

# Deny access to any files with a .php extension in the uploads directory
<Files "*.php">
Order Deny,Allow
Deny from All
</Files>

# Hide sensitive files
<FilesMatch "^(\.htaccess|\.htpasswd|\.env|composer\.json|composer\.lock|package\.json|gulpfile\.js)$">
Order Allow,Deny
Deny from all
</FilesMatch>';
        
        if (!file_exists('.htaccess')) {
            if (file_put_contents('.htaccess', $htaccess_content)) {
                $this->fixes_applied[] = 'Created .htaccess file with URL rewriting rules';
                $this->log('Created .htaccess file');
            } else {
                $this->errors[] = 'Failed to create .htaccess file';
            }
        } else {
            $existing = file_get_contents('.htaccess');
            if (strpos($existing, 'RewriteEngine On') === false) {
                if (file_put_contents('.htaccess', $htaccess_content . "\n\n" . $existing)) {
                    $this->fixes_applied[] = 'Updated .htaccess file with rewrite rules';
                    $this->log('Updated .htaccess file');
                }
            }
        }
    }
    
    private function fixBaseURL() {
        $config_file = 'application/config/config.php';
        if (file_exists($config_file)) {
            $current_url = $this->getCurrentBaseURL();
            $content = file_get_contents($config_file);
            
            // Update base URL
            $pattern = '/\$config\[\'base_url\'\]\s*=\s*[\'"][^\'"]*[\'"];/';
            $replacement = "\$config['base_url'] = '$current_url';";
            
            if (preg_match($pattern, $content)) {
                $new_content = preg_replace($pattern, $replacement, $content);
                if (file_put_contents($config_file, $new_content)) {
                    $this->fixes_applied[] = "Updated base URL to: $current_url";
                    $this->log("Updated base URL in config.php");
                }
            }
        }
    }
    
    private function createMissingTables() {
        try {
            include 'application/config/database.php';
            if (isset($db['default'])) {
                $config = $db['default'];
                $dsn = "mysql:host={$config['hostname']};dbname={$config['database']};charset=utf8mb4";
                $pdo = new PDO($dsn, $config['username'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Check and create content table if missing
                $stmt = $pdo->query("SHOW TABLES LIKE 'content'");
                if ($stmt->rowCount() == 0) {
                    $create_content = "
                    CREATE TABLE content (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        type VARCHAR(50) NOT NULL,
                        title VARCHAR(255),
                        content TEXT,
                        meta_data JSON,
                        status ENUM('active', 'inactive') DEFAULT 'active',
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
                    
                    if ($pdo->exec($create_content)) {
                        $this->fixes_applied[] = 'Created missing content table';
                        $this->log('Created content table');
                        
                        // Insert sample pricing plans
                        $insert_pricing = "
                        INSERT INTO content (type, title, content, meta_data) VALUES
                        ('pricing_plan', 'Starter', 'Basic POS features', '{\"price\": 6000, \"currency\": \"INR\", \"billing_cycle\": \"yearly\", \"max_locations\": 1, \"max_users\": 2, \"features\": \"Core POS & Billing,GST Invoicing,Basic Inventory\", \"is_popular\": 0, \"support_type\": \"Email\"}'),
                        ('pricing_plan', 'Growth', 'Advanced POS features', '{\"price\": 12000, \"currency\": \"INR\", \"billing_cycle\": \"yearly\", \"max_locations\": 3, \"max_users\": 5, \"features\": \"All Starter features,Multi-location Stock,Advanced Inventory\", \"is_popular\": 1, \"support_type\": \"WhatsApp\"}'),
                        ('pricing_plan', 'Elite', 'Premium POS features', '{\"price\": 21000, \"currency\": \"INR\", \"billing_cycle\": \"yearly\", \"max_locations\": 10, \"max_users\": 15, \"features\": \"All Growth features,Combo Products,Automated Reminders\", \"is_popular\": 0, \"support_type\": \"Priority\"}')
                        ";
                        
                        $pdo->exec($insert_pricing);
                        $this->fixes_applied[] = 'Added sample pricing plans to content table';
                    }
                }
                
                // Check if testimonials table has category column
                $stmt = $pdo->query("DESCRIBE testimonials");
                $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
                if (!in_array('category', $columns)) {
                    $pdo->exec("ALTER TABLE testimonials ADD COLUMN category VARCHAR(100) DEFAULT 'general'");
                    $this->fixes_applied[] = 'Added category column to testimonials table';
                    $this->log('Added category column to testimonials');
                }
            }
        } catch (Exception $e) {
            $this->errors[] = 'Database fix failed: ' . $e->getMessage();
        }
    }
    
    private function fixConfigFiles() {
        // Fix database config for production
        $db_config_file = 'application/config/database.php';
        if (file_exists($db_config_file)) {
            $content = file_get_contents($db_config_file);
            
            // Ensure db_debug is FALSE for production
            if (strpos($content, "'db_debug' => TRUE") !== false) {
                $content = str_replace("'db_debug' => TRUE", "'db_debug' => FALSE", $content);
                file_put_contents($db_config_file, $content);
                $this->fixes_applied[] = 'Set db_debug to FALSE for production';
            }
        }
        
        // Fix main config
        $main_config_file = 'application/config/config.php';
        if (file_exists($main_config_file)) {
            $content = file_get_contents($main_config_file);
            
            // Set log threshold for production
            if (strpos($content, "'log_threshold' => 0") === false) {
                $pattern = '/\$config\[\'log_threshold\'\]\s*=\s*\d+;/';
                $replacement = "\$config['log_threshold'] = 1;";
                $content = preg_replace($pattern, $replacement, $content);
                file_put_contents($main_config_file, $content);
                $this->fixes_applied[] = 'Set appropriate log threshold for production';
            }
        }
    }
    
    private function updateSecuritySettings() {
        // Create index.html files in sensitive directories
        $sensitive_dirs = [
            'application',
            'application/config',
            'application/controllers',
            'application/models',
            'application/views',
            'application/libraries',
            'application/cache',
            'application/logs',
            'system'
        ];
        
        $index_content = '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><h1>Directory access is forbidden.</h1></body></html>';
        
        foreach ($sensitive_dirs as $dir) {
            if (is_dir($dir) && !file_exists("$dir/index.html")) {
                if (file_put_contents("$dir/index.html", $index_content)) {
                    $this->fixes_applied[] = "Added security index.html to $dir";
                }
            }
        }
    }
    
    private function getCurrentBaseURL() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $script_dir = dirname($_SERVER['SCRIPT_NAME']);
        return "$protocol://$host$script_dir/";
    }
    
    public function getFixesApplied() {
        return $this->fixes_applied;
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function getLog() {
        return $this->log;
    }
}

// Handle AJAX requests
if (isset($_POST['action']) && $_POST['action'] === 'run_fixes') {
    header('Content-Type: application/json');
    
    $fixer = new AutoFixer();
    $fixer->runAllFixes();
    
    echo json_encode([
        'success' => true,
        'fixes_applied' => $fixer->getFixesApplied(),
        'errors' => $fixer->getErrors(),
        'log' => $fixer->getLog()
    ]);
    exit;
}

// Handle page load
$fixer = null;
$fixes_applied = [];
$errors = [];
$log = [];

if (isset($_POST['run_fixes'])) {
    $fixer = new AutoFixer();
    $fixer->runAllFixes();
    $fixes_applied = $fixer->getFixesApplied();
    $errors = $fixer->getErrors();
    $log = $fixer->getLog();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrulyPOS Auto Fixer</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .content {
            padding: 30px;
        }
        .fix-item {
            background: #f8f9fa;
            border-left: 4px solid #28a745;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .error-item {
            background: #f8f9fa;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .log-item {
            background: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.9em;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px 5px;
            background: #007cba;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #005a8b;
        }
        .btn.danger {
            background: #dc3545;
        }
        .btn.danger:hover {
            background: #c82333;
        }
        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .alert.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert.warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .progress {
            background: #e9ecef;
            border-radius: 4px;
            height: 20px;
            overflow: hidden;
            margin: 20px 0;
        }
        .progress-bar {
            background: #007cba;
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }
        #loading {
            display: none;
            text-align: center;
            padding: 20px;
        }
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #007cba;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔧 TrulyPOS Auto Fixer</h1>
            <p>Automated deployment issue resolution</p>
        </div>
        
        <div class="content">
            <?php if (empty($fixes_applied) && empty($errors)): ?>
            <div class="alert warning">
                <strong>🔧 Ready to Fix Issues!</strong>
                This tool will automatically resolve common deployment issues. Click the button below to start the auto-fix process.
            </div>
            
            <h3>What will be fixed:</h3>
            <ul>
                <li>✅ Directory permissions (cache, logs, uploads)</li>
                <li>✅ Missing directories creation</li>
                <li>✅ .htaccess file configuration</li>
                <li>✅ Base URL configuration</li>
                <li>✅ Missing database tables</li>
                <li>✅ Production configuration settings</li>
                <li>✅ Security enhancements</li>
            </ul>
            
            <div style="text-align: center; margin: 30px 0;">
                <button onclick="runAutoFix()" class="btn" style="font-size: 1.2em; padding: 15px 30px;">
                    🚀 Run Auto Fixer
                </button>
            </div>
            
            <div id="loading">
                <div class="spinner"></div>
                <p>Applying fixes... Please wait.</p>
                <div class="progress">
                    <div class="progress-bar" id="progressBar"></div>
                </div>
            </div>
            
            <?php else: ?>
            
            <?php if (!empty($fixes_applied)): ?>
            <div class="alert success">
                <strong>✅ Fixes Applied Successfully!</strong>
                <?php echo count($fixes_applied); ?> issues have been resolved.
            </div>
            
            <h3>✅ Applied Fixes:</h3>
            <?php foreach ($fixes_applied as $fix): ?>
            <div class="fix-item">
                ✅ <?php echo htmlspecialchars($fix); ?>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            
            <?php if (!empty($errors)): ?>
            <div class="alert warning">
                <strong>⚠️ Some Issues Require Manual Attention</strong>
                The following issues could not be automatically resolved:
            </div>
            
            <h3>⚠️ Manual Fixes Required:</h3>
            <?php foreach ($errors as $error): ?>
            <div class="error-item">
                ⚠️ <?php echo htmlspecialchars($error); ?>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            
            <?php if (!empty($log)): ?>
            <details style="margin-top: 30px;">
                <summary><strong>📋 Detailed Log</strong></summary>
                <?php foreach ($log as $log_entry): ?>
                <div class="log-item">
                    <?php echo htmlspecialchars($log_entry); ?>
                </div>
                <?php endforeach; ?>
            </details>
            <?php endif; ?>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="deployment_checker.php?key=<?php echo $deployment_key; ?>" class="btn">
                    🔍 Run Deployment Check Again
                </a>
                <a href="../" class="btn">
                    🏠 Visit Website
                </a>
            </div>
            
            <?php endif; ?>
            
            <div class="alert warning" style="margin-top: 30px;">
                <strong>🔒 Important:</strong> 
                After successful deployment, delete this file (<code>auto_fixer.php</code>) and <code>deployment_checker.php</code> for security!
            </div>
        </div>
    </div>
    
    <script>
    function runAutoFix() {
        document.getElementById('loading').style.display = 'block';
        
        // Simulate progress
        let progress = 0;
        const progressBar = document.getElementById('progressBar');
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress > 90) progress = 90;
            progressBar.style.width = progress + '%';
        }, 500);
        
        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=run_fixes'
        })
        .then(response => response.json())
        .then(data => {
            clearInterval(interval);
            progressBar.style.width = '100%';
            
            setTimeout(() => {
                // Reload page to show results
                const form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';
                
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'run_fixes';
                input.value = '1';
                
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }, 1000);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while running the auto fixer. Please try again.');
            document.getElementById('loading').style.display = 'none';
            clearInterval(interval);
        });
    }
    </script>
</body>
</html>
