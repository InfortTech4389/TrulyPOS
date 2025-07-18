<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Production Security Configuration
|--------------------------------------------------------------------------
| Update these settings for production deployment
*/

// Admin credentials (CHANGE THESE IN PRODUCTION!)
$config['admin_username'] = 'admin';
$config['admin_password'] = 'trulypos2025'; // CHANGE THIS!

// Session configuration
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'trulypos_session';
$config['sess_expiration'] = 7200; // 2 hours
$config['sess_save_path'] = APPPATH . 'cache/sessions/';
$config['sess_regenerate_destroy'] = TRUE;
$config['sess_time_to_update'] = 300;

// Cookie configuration
$config['cookie_prefix'] = 'trulypos_';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = TRUE; // Set to TRUE for HTTPS
$config['cookie_httponly'] = TRUE;

// CSRF Protection
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_token';
$config['csrf_cookie_name'] = 'csrf_cookie';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

// XSS Protection
$config['global_xss_filtering'] = TRUE;

// Encryption key (GENERATE A NEW ONE FOR PRODUCTION!)
$config['encryption_key'] = 'your-32-character-encryption-key';

// Rate limiting
$config['max_login_attempts'] = 5;
$config['login_lockout_time'] = 900; // 15 minutes

// File upload security
$config['allowed_file_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|txt';
$config['max_file_size'] = 5242880; // 5MB

// Environment settings
if (defined('ENVIRONMENT') && ENVIRONMENT === 'production') {
    // Production security settings
    $config['cookie_secure'] = TRUE;
    $config['sess_cookie_secure'] = TRUE;
    
    // Stronger password requirements for production
    $config['min_password_length'] = 12;
    $config['password_require_special'] = TRUE;
    $config['password_require_numbers'] = TRUE;
    $config['password_require_uppercase'] = TRUE;
} else {
    // Development settings
    $config['cookie_secure'] = FALSE;
    $config['sess_cookie_secure'] = FALSE;
    $config['min_password_length'] = 8;
}
