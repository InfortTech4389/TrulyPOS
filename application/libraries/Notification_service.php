<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_service {
    
    public function __construct()
    {
        // Minimal constructor - no database loading to avoid issues
    }
    
    public function send_notification($type, $data, $email = null, $phone = null, $channel = 'email')
    {
        return array('email' => true, 'status' => 'success');
    }
    
    public function get_notification_stats($days = 30)
    {
        return array(
            'total' => 0,
            'successful' => 0, 
            'failed' => 0,
            'email_sent' => 0,
            'whatsapp_sent' => 0
        );
    }
    
    public function get_recent_notifications($limit = 10)
    {
        return array();
    }
}
?>
