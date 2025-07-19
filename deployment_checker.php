<?php
/**
 * TrulyPOS Deployment Checker
 * Automated testing and configuration verification tool
 */

// Security check - remove this file after deployment!
$deployment_key = 'trulypos_deploy_2025';
if (!isset($_GET['key']) || $_GET['key'] !== $deployment_key) {
    if (!isset($_POST['deployment_key']) || $_POST['deployment_key'] !== $deployment_key) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>TrulyPOS Deployment Checker - Authentication</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; }
                .form-group { margin: 15px 0; }
                input[type="password"] { width: 100%; padding: 10px; margin: 5px 0; }
                .btn { background: #007cba; color: white; padding: 10px 20px; border: none; cursor: pointer; }
                .alert { padding: 15px; margin: 15px 0; border-radius: 4px; }
                .alert-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
            </style>
        </head>
        <body>
            <h1>🚀 TrulyPOS Deployment Checker</h1>
            <div class="alert alert-warning">
                <strong>Security Notice:</strong> This is a deployment verification tool. 
                Please remove this file after successful deployment.
            </div>
            <form method="post">
                <div class="form-group">
                    <label>Deployment Key:</label>
                    <input type="password" name="deployment_key" placeholder="Enter deployment key" required>
                </div>
                <button type="submit" class="btn">Access Deployment Checker</button>
            </form>
            <p><small>Default key: trulypos_deploy_2025</small></p>
        </body>
        </html>
        <?php
        exit;
    }
}

class DeploymentChecker {
    private $results = [];
    private $errors = [];
    private $warnings = [];
    private $success_count = 0;
    private $total_checks = 0;
    
    public function __construct() {
        $this->results = [];
        $this->errors = [];
        $this->warnings = [];
    }
    
    public function runAllChecks() {
        $this->checkPHPVersion();
        $this->checkPHPExtensions();
        $this->checkDirectoryStructure();
        $this->checkFilePermissions();
        $this->checkDatabaseConfig();
        $this->checkDatabaseConnection();
        $this->checkBaseURL();
        $this->checkHTAccess();
        $this->checkWebsitePages();
        $this->checkAdminPanel();
        $this->checkEmailConfig();
        $this->checkSecuritySettings();
    }
    
    private function addResult($check, $status, $message, $fix = null) {
        $this->total_checks++;
        if ($status === 'success') {
            $this->success_count++;
        } elseif ($status === 'error') {
            $this->errors[] = $check;
        } elseif ($status === 'warning') {
            $this->warnings[] = $check;
        }
        
        $this->results[] = [
            'check' => $check,
            'status' => $status,
            'message' => $message,
            'fix' => $fix
        ];
    }
    
    private function checkPHPVersion() {
        $version = phpversion();
        if (version_compare($version, '7.4.0', '>=')) {
            $this->addResult('PHP Version', 'success', "PHP $version - Compatible");
        } else {
            $this->addResult('PHP Version', 'error', "PHP $version - Requires 7.4 or higher");
        }
    }
    
    private function checkPHPExtensions() {
        $required = ['pdo', 'pdo_mysql', 'curl', 'openssl', 'json', 'mbstring'];
        $optional = ['gd', 'zip'];
        
        foreach ($required as $ext) {
            if (extension_loaded($ext)) {
                $this->addResult("PHP Extension: $ext", 'success', "Extension $ext is loaded");
            } else {
                $this->addResult("PHP Extension: $ext", 'error', "Required extension $ext is missing", "Contact hosting provider to enable $ext extension");
            }
        }
        
        foreach ($optional as $ext) {
            if (extension_loaded($ext)) {
                $this->addResult("PHP Extension: $ext", 'success', "Optional extension $ext is loaded");
            } else {
                $this->addResult("PHP Extension: $ext", 'warning', "Optional extension $ext is missing");
            }
        }
    }
    
    private function checkDirectoryStructure() {
        $required_dirs = [
            'application',
            'application/config',
            'application/controllers',
            'application/models',
            'application/views',
            'application/libraries',
            'application/cache',
            'application/logs',
            'system',
            'assets'
        ];
        
        foreach ($required_dirs as $dir) {
            if (is_dir($dir)) {
                $this->addResult("Directory: $dir", 'success', "Directory exists");
            } else {
                $this->addResult("Directory: $dir", 'error', "Required directory missing", "Upload missing directory from source");
            }
        }
    }
    
    private function checkFilePermissions() {
        $writable_dirs = [
            'application/cache',
            'application/logs'
        ];
        
        foreach ($writable_dirs as $dir) {
            if (is_dir($dir) && is_writable($dir)) {
                $this->addResult("Permissions: $dir", 'success', "Directory is writable");
            } else {
                $this->addResult("Permissions: $dir", 'error', "Directory not writable", "Set permissions to 755 or 777");
            }
        }
    }
    
    private function checkDatabaseConfig() {
        $config_file = 'application/config/database.php';
        if (file_exists($config_file)) {
            include $config_file;
            if (isset($db['default'])) {
                $config = $db['default'];
                if (!empty($config['hostname']) && !empty($config['username']) && !empty($config['database'])) {
                    $this->addResult('Database Config', 'success', 'Database configuration found');
                } else {
                    $this->addResult('Database Config', 'error', 'Database configuration incomplete', 'Update database credentials in application/config/database.php');
                }
            } else {
                $this->addResult('Database Config', 'error', 'Database configuration malformed');
            }
        } else {
            $this->addResult('Database Config', 'error', 'Database configuration file missing');
        }
    }
    
    private function checkDatabaseConnection() {
        try {
            include 'application/config/database.php';
            if (isset($db['default'])) {
                $config = $db['default'];
                
                if ($config['dbdriver'] === 'pdo') {
                    $dsn = "mysql:host={$config['hostname']};dbname={$config['database']};charset=utf8mb4";
                    $pdo = new PDO($dsn, $config['username'], $config['password']);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // Test basic query
                    $stmt = $pdo->query("SELECT 1");
                    $this->addResult('Database Connection', 'success', 'Database connection successful');
                    
                    // Check for required tables
                    $required_tables = ['contacts', 'newsletter_subscribers', 'orders', 'licenses', 'testimonials'];
                    foreach ($required_tables as $table) {
                        $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
                        if ($stmt->rowCount() > 0) {
                            $this->addResult("Table: $table", 'success', "Table exists");
                        } else {
                            $this->addResult("Table: $table", 'error', "Required table missing", "Import database from trulypos_website.sql");
                        }
                    }
                } else {
                    $this->addResult('Database Connection', 'warning', 'Using non-PDO driver');
                }
            }
        } catch (Exception $e) {
            $this->addResult('Database Connection', 'error', 'Connection failed: ' . $e->getMessage(), 'Check database credentials and server connectivity');
        }
    }
    
    private function checkBaseURL() {
        $config_file = 'application/config/config.php';
        if (file_exists($config_file)) {
            $content = file_get_contents($config_file);
            $current_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
            
            if (strpos($content, $current_url) !== false) {
                $this->addResult('Base URL', 'success', 'Base URL correctly configured');
            } else {
                $this->addResult('Base URL', 'warning', 'Base URL may need updating', "Update base_url in application/config/config.php to: $current_url/");
            }
        }
    }
    
    private function checkHTAccess() {
        if (file_exists('.htaccess')) {
            $content = file_get_contents('.htaccess');
            if (strpos($content, 'RewriteEngine On') !== false) {
                $this->addResult('.htaccess', 'success', '.htaccess file configured');
            } else {
                $this->addResult('.htaccess', 'warning', '.htaccess exists but may not be configured correctly');
            }
        } else {
            $this->addResult('.htaccess', 'warning', '.htaccess file missing', 'Create .htaccess file for URL rewriting');
        }
    }
    
    private function checkWebsitePages() {
        $base_url = $this->getCurrentBaseURL();
        $pages = [
            '' => 'Home Page',
            'features' => 'Features Page',
            'pricing' => 'Pricing Page',
            'contact' => 'Contact Page'
        ];
        
        foreach ($pages as $path => $name) {
            $url = $base_url . $path;
            $response = $this->testURL($url);
            if ($response['status'] === 200) {
                $this->addResult("Page: $name", 'success', "Page loads successfully");
            } else {
                $this->addResult("Page: $name", 'error', "Page failed to load (Status: {$response['status']})");
            }
        }
    }
    
    private function checkAdminPanel() {
        $base_url = $this->getCurrentBaseURL();
        $admin_url = $base_url . 'admin/login';
        $response = $this->testURL($admin_url);
        
        if ($response['status'] === 200) {
            $this->addResult('Admin Panel', 'success', 'Admin panel accessible');
        } else {
            $this->addResult('Admin Panel', 'error', "Admin panel not accessible (Status: {$response['status']})");
        }
    }
    
    private function checkEmailConfig() {
        $config_file = 'application/config/email.php';
        if (file_exists($config_file)) {
            $this->addResult('Email Config', 'success', 'Email configuration file exists');
        } else {
            $this->addResult('Email Config', 'warning', 'Email configuration missing', 'Configure email settings for contact forms');
        }
    }
    
    private function checkSecuritySettings() {
        // Check if index.php is accessible in system and application directories
        $protected_dirs = ['system', 'application'];
        foreach ($protected_dirs as $dir) {
            $url = $this->getCurrentBaseURL() . $dir . '/index.php';
            $response = $this->testURL($url);
            if ($response['status'] === 403 || $response['status'] === 404) {
                $this->addResult("Security: $dir", 'success', "Directory protected");
            } else {
                $this->addResult("Security: $dir", 'warning', "Directory may not be protected");
            }
        }
    }
    
    private function getCurrentBaseURL() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $script_dir = dirname($_SERVER['SCRIPT_NAME']);
        return "$protocol://$host$script_dir/";
    }
    
    private function testURL($url) {
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => 10,
                'ignore_errors' => true
            ]
        ]);
        
        $response = @file_get_contents($url, false, $context);
        $status = 200;
        
        if ($response === false) {
            $status = 500;
        } elseif (isset($http_response_header)) {
            preg_match('#HTTP/\d+\.\d+ (\d+)#', $http_response_header[0], $matches);
            $status = isset($matches[1]) ? (int)$matches[1] : 200;
        }
        
        return ['status' => $status, 'content' => $response];
    }
    
    public function getResults() {
        return $this->results;
    }
    
    public function getSuccessRate() {
        return $this->total_checks > 0 ? round(($this->success_count / $this->total_checks) * 100, 1) : 0;
    }
    
    public function hasErrors() {
        return !empty($this->errors);
    }
    
    public function hasWarnings() {
        return !empty($this->warnings);
    }
}

// Run the checks
$checker = new DeploymentChecker();
$checker->runAllChecks();
$results = $checker->getResults();
$success_rate = $checker->getSuccessRate();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrulyPOS Deployment Checker</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .progress-bar {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            overflow: hidden;
            margin: 20px 0;
        }
        .progress-fill {
            background: #4CAF50;
            height: 20px;
            transition: width 0.3s ease;
        }
        .content {
            padding: 30px;
        }
        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .summary-card {
            background: #f8f9fa;
            border-left: 4px solid;
            padding: 20px;
            border-radius: 4px;
        }
        .summary-card.success { border-color: #4CAF50; }
        .summary-card.warning { border-color: #FF9800; }
        .summary-card.error { border-color: #f44336; }
        .summary-card h3 {
            margin: 0 0 10px 0;
            font-size: 2em;
        }
        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .results-table th,
        .results-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .results-table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            font-weight: 500;
        }
        .status.success {
            background: #d4edda;
            color: #155724;
        }
        .status.warning {
            background: #fff3cd;
            color: #856404;
        }
        .status.error {
            background: #f8d7da;
            color: #721c24;
        }
        .fix-suggestion {
            background: #e7f3ff;
            border: 1px solid #b3d9ff;
            border-radius: 4px;
            padding: 10px;
            margin-top: 5px;
            font-size: 0.9em;
        }
        .actions {
            margin-top: 30px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            background: #007cba;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #005a8b;
        }
        .btn.secondary {
            background: #6c757d;
        }
        .btn.secondary:hover {
            background: #545b62;
        }
        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .alert.danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert.warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .alert.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 TrulyPOS Deployment Checker</h1>
            <p>Automated verification and testing tool</p>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?php echo $success_rate; ?>%"></div>
            </div>
            <p>Success Rate: <?php echo $success_rate; ?>%</p>
        </div>
        
        <div class="content">
            <div class="summary">
                <div class="summary-card success">
                    <h3><?php echo $checker->getSuccessRate() >= 80 ? '✅' : '⚠️'; ?></h3>
                    <p>Overall Status</p>
                    <small><?php echo $success_rate; ?>% checks passed</small>
                </div>
                <div class="summary-card <?php echo $checker->hasErrors() ? 'error' : 'success'; ?>">
                    <h3><?php echo count(array_filter($results, function($r) { return $r['status'] === 'error'; })); ?></h3>
                    <p>Critical Issues</p>
                    <small>Must be fixed</small>
                </div>
                <div class="summary-card warning">
                    <h3><?php echo count(array_filter($results, function($r) { return $r['status'] === 'warning'; })); ?></h3>
                    <p>Warnings</p>
                    <small>Should be addressed</small>
                </div>
                <div class="summary-card success">
                    <h3><?php echo count(array_filter($results, function($r) { return $r['status'] === 'success'; })); ?></h3>
                    <p>Passed Checks</p>
                    <small>Working correctly</small>
                </div>
            </div>
            
            <?php if ($checker->hasErrors()): ?>
            <div class="alert danger">
                <strong>⚠️ Critical Issues Found!</strong> 
                Your deployment has critical issues that must be resolved before the website will function properly.
            </div>
            <?php elseif ($checker->hasWarnings()): ?>
            <div class="alert warning">
                <strong>⚠️ Warnings Detected!</strong> 
                Your deployment is mostly functional but some optimizations are recommended.
            </div>
            <?php else: ?>
            <div class="alert success">
                <strong>🎉 Deployment Successful!</strong> 
                All critical checks passed. Your TrulyPOS website is ready to go!
            </div>
            <?php endif; ?>
            
            <table class="results-table">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($result['check']); ?></strong></td>
                        <td>
                            <span class="status <?php echo $result['status']; ?>">
                                <?php echo ucfirst($result['status']); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($result['message']); ?></td>
                        <td>
                            <?php if ($result['fix']): ?>
                            <div class="fix-suggestion">
                                <strong>Fix:</strong> <?php echo htmlspecialchars($result['fix']); ?>
                            </div>
                            <?php else: ?>
                            <span style="color: #28a745;">✓ No action needed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="actions">
                <a href="auto_fixer.php?key=<?php echo $deployment_key; ?>" class="btn">🔧 Run Auto Fixer</a>
                <a href="?key=<?php echo $deployment_key; ?>" class="btn secondary">🔄 Refresh Checks</a>
                <a href="../" class="btn secondary">🏠 Visit Website</a>
            </div>
            
            <div class="alert warning" style="margin-top: 30px;">
                <strong>🔒 Security Notice:</strong> 
                Remember to delete this file (<code>deployment_checker.php</code>) and <code>auto_fixer.php</code> after successful deployment!
            </div>
        </div>
    </div>
</body>
</html>
