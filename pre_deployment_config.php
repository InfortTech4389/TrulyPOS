<?php
/**
 * TrulyPOS Pre-Deployment Configurator
 * Prepares the project for deployment by updating configurations
 */

// Only run if accessed directly
if (basename($_SERVER['SCRIPT_NAME']) !== 'pre_deployment_config.php') {
    die('This script must be run directly.');
}

class PreDeploymentConfig {
    private $config_updates = [];
    private $errors = [];
    
    public function __construct() {
        echo "<h1>🚀 TrulyPOS Pre-Deployment Configurator</h1>\n";
        echo "<p>This tool will help you configure TrulyPOS for production deployment.</p>\n";
    }
    
    public function configure($domain, $db_host, $db_name, $db_user, $db_pass, $email_host = null, $email_user = null, $email_pass = null) {
        $this->updateDatabaseConfig($db_host, $db_name, $db_user, $db_pass);
        $this->updateBaseURL($domain);
        $this->updateEmailConfig($email_host, $email_user, $email_pass);
        $this->setProductionMode();
        $this->createSecurityFiles();
        
        return [
            'success' => empty($this->errors),
            'updates' => $this->config_updates,
            'errors' => $this->errors
        ];
    }
    
    private function updateDatabaseConfig($host, $database, $username, $password) {
        $config_file = 'application/config/database.php';
        $template = '<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

$active_group = \'default\';
$query_builder = TRUE;

$db[\'default\'] = array(
    \'dsn\'	=> \'\',
    \'hostname\' => \'' . addslashes($host) . '\',
    \'username\' => \'' . addslashes($username) . '\',
    \'password\' => \'' . addslashes($password) . '\',
    \'database\' => \'' . addslashes($database) . '\',
    \'dbdriver\' => \'pdo\',
    \'dbprefix\' => \'\',
    \'pconnect\' => FALSE,
    \'db_debug\' => FALSE,
    \'cache_on\' => FALSE,
    \'cachedir\' => \'\',
    \'char_set\' => \'utf8mb4\',
    \'dbcollat\' => \'utf8mb4_general_ci\',
    \'swap_pre\' => \'\',
    \'encrypt\' => FALSE,
    \'compress\' => FALSE,
    \'stricton\' => FALSE,
    \'failover\' => array(),
    \'save_queries\' => TRUE
);';
        
        if (file_put_contents($config_file, $template)) {
            $this->config_updates[] = 'Updated database configuration';
        } else {
            $this->errors[] = 'Failed to update database configuration';
        }
    }
    
    private function updateBaseURL($domain) {
        $config_file = 'application/config/config.php';
        if (file_exists($config_file)) {
            $content = file_get_contents($config_file);
            $base_url = 'https://' . trim($domain, '/') . '/';
            
            $pattern = '/\$config\[\'base_url\'\]\s*=\s*[\'"][^\'"]*[\'"];/';
            $replacement = "\$config['base_url'] = '$base_url';";
            
            $new_content = preg_replace($pattern, $replacement, $content);
            
            if (file_put_contents($config_file, $new_content)) {
                $this->config_updates[] = "Updated base URL to: $base_url";
            } else {
                $this->errors[] = 'Failed to update base URL';
            }
        }
    }
    
    private function updateEmailConfig($host, $user, $pass) {
        if (!$host || !$user || !$pass) {
            return; // Skip if email config not provided
        }
        
        $config_file = 'application/config/email.php';
        $template = '<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

$config[\'protocol\'] = \'smtp\';
$config[\'smtp_host\'] = \'' . addslashes($host) . '\';
$config[\'smtp_port\'] = 587;
$config[\'smtp_user\'] = \'' . addslashes($user) . '\';
$config[\'smtp_pass\'] = \'' . addslashes($pass) . '\';
$config[\'smtp_crypto\'] = \'tls\';
$config[\'mailtype\'] = \'html\';
$config[\'charset\'] = \'utf-8\';
$config[\'newline\'] = "\\r\\n";
$config[\'wordwrap\'] = TRUE;';
        
        if (file_put_contents($config_file, $template)) {
            $this->config_updates[] = 'Updated email configuration';
        } else {
            $this->errors[] = 'Failed to update email configuration';
        }
    }
    
    private function setProductionMode() {
        // Update index.php to set environment to production
        $index_file = 'index.php';
        if (file_exists($index_file)) {
            $content = file_get_contents($index_file);
            $content = preg_replace('/define\(\'ENVIRONMENT\',\s*\'[^\']*\'\);/', "define('ENVIRONMENT', 'production');", $content);
            
            if (file_put_contents($index_file, $content)) {
                $this->config_updates[] = 'Set environment to production mode';
            }
        }
        
        // Update config.php for production
        $config_file = 'application/config/config.php';
        if (file_exists($config_file)) {
            $content = file_get_contents($config_file);
            
            // Set log threshold to errors only
            $content = preg_replace('/\$config\[\'log_threshold\'\]\s*=\s*\d+;/', "\$config['log_threshold'] = 1;", $content);
            
            file_put_contents($config_file, $content);
            $this->config_updates[] = 'Configured production logging';
        }
    }
    
    private function createSecurityFiles() {
        // Create .htaccess
        $htaccess_content = 'RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

# Force HTTPS
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Protect application folder
RewriteCond %{REQUEST_URI} ^/application.*
RewriteRule ^(.*)$ /index.php [L]

# Protect system folder
RewriteCond %{REQUEST_URI} ^/system.*
RewriteRule ^(.*)$ /index.php [L]

# Hide sensitive files
<FilesMatch "^(\.htaccess|\.htpasswd|\.env|composer\.json|composer\.lock|package\.json)$">
Order Allow,Deny
Deny from all
</FilesMatch>

# Disable directory browsing
Options -Indexes

# Enable compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>';
        
        if (file_put_contents('.htaccess', $htaccess_content)) {
            $this->config_updates[] = 'Created .htaccess with security rules';
        }
        
        // Create index.html files for protection
        $index_html = '<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><h1>Directory access is forbidden.</h1></body></html>';
        $dirs = ['application', 'application/config', 'application/controllers', 'application/models', 'application/views', 'application/cache', 'application/logs', 'system'];
        
        foreach ($dirs as $dir) {
            if (is_dir($dir)) {
                file_put_contents("$dir/index.html", $index_html);
            }
        }
        $this->config_updates[] = 'Added security index files to protect directories';
    }
}

// Handle form submission
$result = null;
if ($_POST) {
    $config = new PreDeploymentConfig();
    $result = $config->configure(
        $_POST['domain'],
        $_POST['db_host'],
        $_POST['db_name'],
        $_POST['db_user'],
        $_POST['db_pass'],
        $_POST['email_host'] ?: null,
        $_POST['email_user'] ?: null,
        $_POST['email_pass'] ?: null
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrulyPOS Pre-Deployment Configurator</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .btn {
            background: #007cba;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .btn:hover {
            background: #005a8b;
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
        .alert.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .update-item {
            background: #f8f9fa;
            border-left: 4px solid #28a745;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
        }
        .error-item {
            background: #f8f9fa;
            border-left: 4px solid #dc3545;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
        }
        .section {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .section h3 {
            margin-top: 0;
            color: #007cba;
        }
        .note {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($result): ?>
            <?php if ($result['success']): ?>
                <div class="alert success">
                    <h3>✅ Configuration Complete!</h3>
                    <p>Your TrulyPOS project has been configured for production deployment.</p>
                </div>
                
                <h3>✅ Updates Applied:</h3>
                <?php foreach ($result['updates'] as $update): ?>
                    <div class="update-item">✅ <?php echo htmlspecialchars($update); ?></div>
                <?php endforeach; ?>
                
                <div class="section">
                    <h3>📦 Next Steps:</h3>
                    <ol>
                        <li>Upload all files to your hosting provider's public_html directory</li>
                        <li>Import the database using phpMyAdmin (database/trulypos_website.sql)</li>
                        <li>Run the deployment checker: <code>yourdomain.com/deployment_checker.php?key=trulypos_deploy_2025</code></li>
                        <li>Test your website thoroughly</li>
                        <li>Delete deployment and test files for security</li>
                    </ol>
                </div>
                
                <div class="note">
                    <strong>🔒 Security Reminder:</strong> After successful deployment, delete these files:
                    <ul>
                        <li>pre_deployment_config.php</li>
                        <li>deployment_checker.php</li>
                        <li>auto_fixer.php</li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="alert error">
                    <h3>❌ Configuration Errors</h3>
                    <p>Some configurations could not be applied:</p>
                </div>
                
                <?php foreach ($result['errors'] as $error): ?>
                    <div class="error-item">❌ <?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
                
                <?php if (!empty($result['updates'])): ?>
                    <h3>✅ Successful Updates:</h3>
                    <?php foreach ($result['updates'] as $update): ?>
                        <div class="update-item">✅ <?php echo htmlspecialchars($update); ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
            
            <div style="text-align: center; margin-top: 30px;">
                <button onclick="location.reload()" class="btn">🔄 Configure Again</button>
            </div>
            
        <?php else: ?>
            <form method="post">
                <div class="section">
                    <h3>🌐 Domain Configuration</h3>
                    <div class="form-group">
                        <label for="domain">Your Domain (without https://)</label>
                        <input type="text" id="domain" name="domain" placeholder="yourdomain.com" required>
                    </div>
                </div>
                
                <div class="section">
                    <h3>🗄️ Database Configuration</h3>
                    <div class="form-group">
                        <label for="db_host">Database Host</label>
                        <input type="text" id="db_host" name="db_host" value="localhost" required>
                    </div>
                    <div class="form-group">
                        <label for="db_name">Database Name</label>
                        <input type="text" id="db_name" name="db_name" placeholder="your_database_name" required>
                    </div>
                    <div class="form-group">
                        <label for="db_user">Database Username</label>
                        <input type="text" id="db_user" name="db_user" placeholder="your_db_username" required>
                    </div>
                    <div class="form-group">
                        <label for="db_pass">Database Password</label>
                        <input type="password" id="db_pass" name="db_pass" placeholder="your_db_password" required>
                    </div>
                </div>
                
                <div class="section">
                    <h3>📧 Email Configuration (Optional)</h3>
                    <p>Leave empty to configure later through admin panel</p>
                    <div class="form-group">
                        <label for="email_host">SMTP Host</label>
                        <input type="text" id="email_host" name="email_host" placeholder="mail.yourdomain.com">
                    </div>
                    <div class="form-group">
                        <label for="email_user">SMTP Username</label>
                        <input type="text" id="email_user" name="email_user" placeholder="noreply@yourdomain.com">
                    </div>
                    <div class="form-group">
                        <label for="email_pass">SMTP Password</label>
                        <input type="password" id="email_pass" name="email_pass" placeholder="your_email_password">
                    </div>
                </div>
                
                <button type="submit" class="btn">🚀 Configure for Deployment</button>
            </form>
            
            <div class="note">
                <strong>💡 Before You Start:</strong>
                <ul>
                    <li>Have your hosting provider's database credentials ready</li>
                    <li>Know your domain name</li>
                    <li>Have email SMTP settings if you want to configure email</li>
                    <li>Make sure you have a backup of your project</li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
