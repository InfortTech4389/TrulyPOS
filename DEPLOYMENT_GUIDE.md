# TrulyPOS Production Deployment Guide

## Overview
This guide will help you deploy TrulyPOS to your production server with the domain `trulypos.com`.

## Server Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- mod_rewrite enabled (for Apache)
- SSL certificate (recommended)

## Database Configuration
- **Database Name:** `trulypos_web`
- **Username:** `trulypos_root` 
- **Password:** `4389BGAshri@*`
- **Host:** `localhost`

## Deployment Steps

### 1. Upload Files
Upload all project files to your web server's document root (usually `public_html` or `www`).

### 2. Set File Permissions
```bash
# Set proper permissions
chmod -R 755 /path/to/trulypos/
chmod -R 777 /path/to/trulypos/application/logs/
chmod -R 777 /path/to/trulypos/application/cache/
```

### 3. Database Setup
1. Create the MySQL database and user:
```sql
CREATE DATABASE trulypos_web CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'trulypos_root'@'localhost' IDENTIFIED BY '4389BGAshri@*';
GRANT ALL PRIVILEGES ON trulypos_web.* TO 'trulypos_root'@'localhost';
FLUSH PRIVILEGES;
```

2. Import the database structure:
```bash
mysql -u trulypos_root -p'4389BGAshri@*' trulypos_web < database/mysql_migration.sql
```

### 4. Configuration Updates

#### Enable HTTPS (Recommended)
Edit `.htaccess` and uncomment these lines:
```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

#### Update Email Configuration
Edit `application/config/email.php` with your SMTP settings:
```php
$config['smtp_host'] = 'mail.trulypos.com';
$config['smtp_user'] = 'noreply@trulypos.com';
$config['smtp_pass'] = 'your_email_password';
```

### 5. Admin Panel Access
- **URL:** `https://trulypos.com/admin`
- **Username:** `admin`
- **Password:** `trulypos2025`

**IMPORTANT:** Change the admin password immediately after deployment!

### 6. Security Checklist
- [ ] Change default admin credentials
- [ ] Enable HTTPS
- [ ] Set proper file permissions
- [ ] Configure firewall rules
- [ ] Enable security headers
- [ ] Set up regular backups
- [ ] Update email/WhatsApp API credentials

### 7. Payment Gateway Setup
1. Login to admin panel
2. Go to Settings
3. Update Razorpay credentials:
   - Key ID
   - Key Secret

### 8. Email/WhatsApp Configuration
Update notification settings in admin panel:
- Email SMTP settings
- WhatsApp API credentials
- Notification templates

### 9. SSL Certificate
Install SSL certificate for `trulypos.com` and configure automatic redirect from HTTP to HTTPS.

### 10. Testing
1. Test website functionality
2. Test contact forms
3. Test order process
4. Test admin panel
5. Test email notifications
6. Test payment processing

## Environment Detection
The application automatically detects the environment:
- **Production:** When domain contains `trulypos.com`
- **Development:** When using `localhost` or `127.0.0.1`

## Features Available After Deployment

### Public Website
- Homepage with company information
- Pricing plans
- Features overview
- Industry solutions
- Contact forms
- Testimonials
- Newsletter subscription

### Admin Panel
- Dashboard with statistics
- Customer management
- Order tracking
- Payment management
- Enquiry management
- License management
- Newsletter management
- Notification system
- Settings configuration

### Notification System
- Email notifications (contact, orders, licenses)
- WhatsApp integration
- Template-based messaging
- Delivery tracking
- Multi-channel support

## Support
For technical support, contact the development team or refer to the CodeIgniter documentation.

## Backup Strategy
- Daily database backups
- Weekly file system backups
- Store backups in secure location
- Test backup restoration regularly

## Monitoring
- Monitor server resources
- Track error logs
- Monitor payment transactions
- Check email delivery rates
- Monitor website uptime
