<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email Configuration
| -------------------------------------------------------------------------
| This file contains the configuration for Email and SMTP settings
|
*/

// Environment-based email configuration
if (defined('ENVIRONMENT') && ENVIRONMENT === 'production') {
    // Production Email Configuration
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'mail.trulypos.com'; // Update with your SMTP server
    $config['smtp_port'] = 587;
    $config['smtp_timeout'] = 30;
    $config['smtp_user'] = 'noreply@trulypos.com'; // Update with your email
    $config['smtp_pass'] = ''; // Update with your email password in production
    $config['smtp_crypto'] = 'tls';
    $config['wordwrap'] = TRUE;
    $config['wrapchars'] = 76;
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['validate'] = TRUE;
    $config['priority'] = 3;
    $config['crlf'] = "\r\n";
    $config['newline'] = "\r\n";
    $config['bcc_batch_mode'] = FALSE;
    $config['bcc_batch_size'] = 200;
    $config['dsn'] = FALSE;
    
    // Production email settings
    $config['from_email'] = 'noreply@trulypos.com';
    $config['from_name'] = 'TrulyPOS Team';
    $config['admin_emails'] = 'admin@trulypos.com,support@trulypos.com';
    
} else {
    // Development Email Configuration
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_port'] = 587;
    $config['smtp_timeout'] = 30;
    $config['smtp_user'] = 'your-email@gmail.com'; // Update for development
    $config['smtp_pass'] = 'your-app-password'; // Update for development
    $config['smtp_crypto'] = 'tls';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html';
    $config['wordwrap'] = TRUE;
    
    // Development email settings
    $config['from_email'] = 'noreply@localhost';
    $config['from_name'] = 'TrulyPOS Dev Team';
    $config['admin_emails'] = 'admin@localhost';
}
$config['crlf'] = "\r\n";
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';

// Default sender details
$config['from_email'] = 'noreply@trulypos.com';
$config['from_name'] = 'TrulyPOS';

// Admin notification emails
$config['admin_emails'] = [
    'support@trulypos.com',
    'sales@trulypos.com'
];

// Email templates directory
$config['template_path'] = APPPATH . 'views/emails/';
