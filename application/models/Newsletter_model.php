<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function subscribe($email)
    {
        $data = [
            'email' => $email,
            'subscribed_at' => date('Y-m-d H:i:s'),
            'status' => 'active'
        ];
        
        // Check if email already exists
        $this->db->where('email', $email);
        $existing = $this->db->get('newsletter_subscribers')->row();
        
        if ($existing) {
            // Update existing subscription
            $this->db->where('email', $email);
            return $this->db->update('newsletter_subscribers', ['status' => 'active']);
        } else {
            // Insert new subscription
            return $this->db->insert('newsletter_subscribers', $data);
        }
    }

    public function unsubscribe($email)
    {
        $this->db->where('email', $email);
        return $this->db->update('newsletter_subscribers', ['status' => 'unsubscribed']);
    }

    public function get_subscribers($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->where('status', 'active');
        $this->db->order_by('subscribed_at', 'DESC');
        return $this->db->get('newsletter_subscribers')->result();
    }

    public function get_subscriber_count()
    {
        $this->db->where('status', 'active');
        return $this->db->count_all_results('newsletter_subscribers');
    }
}
