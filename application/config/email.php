<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email Configuration
| -------------------------------------------------------------------------
| This file contains the configuration for Email and SMTP settings
|
*/

// Production Email Configuration for trulypos.com
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.trulypos.com'; // Update with your actual SMTP server
$config['smtp_port'] = 587;
$config['smtp_timeout'] = 30;
$config['smtp_user'] = 'noreply@trulypos.com'; // Update with your email
$config['smtp_pass'] = '4389BGAshri@*'; // Add your email password here
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

// Email sender details
$config['from_email'] = 'noreply@trulypos.com';
$config['from_name'] = 'TrulyPOS Team';

// Admin notification emails
$config['admin_emails'] = 'admin@trulypos.com,support@trulypos.com';

// WhatsApp Configuration
$config['whatsapp_enabled'] = false; // Set to true when WhatsApp is configured
$config['whatsapp_api_url'] = '';
$config['whatsapp_token'] = '';
$config['whatsapp_number'] = '';

// Email templates directory
$config['template_path'] = APPPATH . 'views/emails/';

// Additional email configuration
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;

// Environment-specific settings
if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
    // Development email settings
    $config['from_email'] = 'noreply@localhost';
    $config['from_name'] = 'TrulyPOS Dev Team';
    $config['admin_emails'] = 'admin@localhost';
} else {
    // Production email settings
    $config['from_email'] = 'noreply@trulypos.com';
    $config['from_name'] = 'TrulyPOS';
    
    // Admin notification emails
    $config['admin_emails'] = [
        'support@trulypos.com',
        'sales@trulypos.com'
    ];
}

$config['crlf'] = "\r\n";
