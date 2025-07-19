# TrulyPOS Hosting Provider Configuration Guide

## Common Hosting Providers Setup

### 1. Shared Hosting (cPanel) - Most Common

#### A. Hostinger
```php
// application/config/database.php
$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'localhost',
    'username' => 'u123456789_trulypos', // Your database username
    'password' => 'YourDatabasePassword',
    'database' => 'u123456789_trulypos', // Your database name
    'dbdriver' => 'pdo',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => FALSE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8mb4',
    'dbcollat' => 'utf8mb4_general_ci',
);
```

#### B. Namecheap
```php
// application/config/database.php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'cpanel_username_dbuser',
    'password' => 'database_password',
    'database' => 'cpanel_username_dbname',
    // ... rest same as above
);
```

#### C. Bluehost
```php
// application/config/database.php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'username_trulypos',
    'password' => 'your_db_password',
    'database' => 'username_trulypos',
    // ... rest same as above
);
```

### 2. VPS/Cloud Hosting

#### A. DigitalOcean
```php
// application/config/database.php
$db['default'] = array(
    'hostname' => 'localhost', // or your DB server IP
    'username' => 'trulypos_user',
    'password' => 'secure_password',
    'database' => 'trulypos_db',
    // ... rest same as above
);
```

#### B. AWS EC2
```php
// application/config/database.php
$db['default'] = array(
    'hostname' => 'your-rds-endpoint.amazonaws.com', // if using RDS
    'username' => 'admin',
    'password' => 'your_password',
    'database' => 'trulypos',
    'port'     => 3306,
    // ... rest same as above
);
```

## Email Configuration by Provider

### 1. cPanel Hosting (Most providers)
```php
// application/config/email.php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.yourdomain.com'; // or your hosting provider's SMTP
$config['smtp_port'] = 587; // or 465 for SSL
$config['smtp_user'] = 'noreply@yourdomain.com';
$config['smtp_pass'] = 'your_email_password';
$config['smtp_crypto'] = 'tls'; // or 'ssl'
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
```

### 2. Gmail SMTP
```php
// application/config/email.php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = 'your-email@gmail.com';
$config['smtp_pass'] = 'your-app-password'; // Use App Password, not regular password
$config['smtp_crypto'] = 'tls';
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
```

### 3. SendGrid
```php
// application/config/email.php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_port'] = 587;
$config['smtp_user'] = 'apikey';
$config['smtp_pass'] = 'your-sendgrid-api-key';
$config['smtp_crypto'] = 'tls';
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
```

## SSL/HTTPS Configuration

### 1. Force HTTPS (Add to .htaccess)
```apache
# Force HTTPS
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Your existing CodeIgniter rules below...
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

### 2. Update Base URL for HTTPS
```php
// application/config/config.php
$config['base_url'] = 'https://yourdomain.com/';
```

## Performance Optimization

### 1. Enable Compression (.htaccess)
```apache
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
</IfModule>
```

### 2. Browser Caching (.htaccess)
```apache
# Browser Caching
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"
</IfModule>
```

## Security Hardening

### 1. Hide PHP Version (.htaccess)
```apache
# Hide PHP version
Header unset X-Powered-By
ServerTokens Prod
```

### 2. Protect Sensitive Files (.htaccess)
```apache
# Protect sensitive files
<FilesMatch "\.(htaccess|htpasswd|ini|log|sh|sql|conf)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Protect uploads directory
<Directory "assets/uploads">
    php_flag engine off
</Directory>
```

### 3. Disable Directory Browsing (.htaccess)
```apache
# Disable directory browsing
Options -Indexes
```

## Troubleshooting Common Issues

### 1. 500 Internal Server Error
- Check file permissions (files: 644, folders: 755)
- Verify .htaccess syntax
- Check PHP error logs
- Ensure all required files are uploaded

### 2. Database Connection Failed
- Verify database credentials
- Check if database exists
- Ensure user has proper permissions
- Test connection with hosting provider's tools

### 3. White Screen of Death
- Enable error reporting temporarily:
```php
// Add to index.php temporarily
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

### 4. URL Rewriting Not Working
- Check if mod_rewrite is enabled
- Verify .htaccess file exists and is readable
- Try different .htaccess configurations

### 5. Email Not Working
- Check SMTP credentials
- Verify hosting provider allows outgoing mail
- Test with hosting provider's mail server
- Check spam folder

## File Upload Limits

### 1. Increase Upload Limits (.htaccess)
```apache
# Increase upload limits
php_value upload_max_filesize 32M
php_value post_max_size 32M
php_value max_execution_time 300
php_value max_input_time 300
```

### 2. Via php.ini (if allowed)
```ini
upload_max_filesize = 32M
post_max_size = 32M
max_execution_time = 300
max_input_time = 300
memory_limit = 256M
```

## Backup Strategy

### 1. Database Backup (via cPanel)
- Use phpMyAdmin to export database
- Schedule automated backups if available
- Keep local and cloud backups

### 2. File Backup
- Download entire website via File Manager
- Use FTP to sync files regularly
- Exclude cache and logs directories

### 3. Automated Backup Script
```bash
#!/bin/bash
# Create backup directory
mkdir -p /path/to/backups/$(date +%Y%m%d)

# Backup database
mysqldump -u username -p database_name > /path/to/backups/$(date +%Y%m%d)/database.sql

# Backup files
tar -czf /path/to/backups/$(date +%Y%m%d)/files.tar.gz /path/to/website/
```

## Monitoring and Maintenance

### 1. Log File Monitoring
- Check error logs regularly: `application/logs/`
- Monitor access logs for unusual activity
- Set up log rotation

### 2. Performance Monitoring
- Monitor page load times
- Check database query performance
- Monitor server resource usage

### 3. Security Updates
- Keep CodeIgniter framework updated
- Update PHP version when possible
- Regular security scans

---

**Important Notes:**
1. Always test in a staging environment first
2. Keep backups before making any changes
3. Use strong passwords for database and admin accounts
4. Enable two-factor authentication where possible
5. Regularly update and patch your system
