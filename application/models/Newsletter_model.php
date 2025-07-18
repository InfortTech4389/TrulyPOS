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

    // Enhanced newsletter management methods for admin
    public function get_all_subscribers($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('subscribed_at', 'DESC');
        return $this->db->get('newsletter_subscribers')->result_array();
    }

    public function get_active_subscribers()
    {
        $this->db->where('status', 'active');
        $this->db->order_by('subscribed_at', 'ASC');
        return $this->db->get('newsletter_subscribers')->result_array();
    }

    public function get_subscriber_statistics()
    {
        $stats = array();
        
        // Total subscribers
        $stats['total'] = $this->db->count_all('newsletter_subscribers');
        
        // Active subscribers
        $this->db->where('status', 'active');
        $stats['active'] = $this->db->count_all_results('newsletter_subscribers');
        
        // Unsubscribed
        $this->db->reset_query();
        $this->db->where('status', 'unsubscribed');
        $stats['unsubscribed'] = $this->db->count_all_results('newsletter_subscribers');
        
        // New subscribers this month
        $this->db->reset_query();
        $this->db->where('MONTH(subscribed_at)', date('n'));
        $this->db->where('YEAR(subscribed_at)', date('Y'));
        $stats['new_this_month'] = $this->db->count_all_results('newsletter_subscribers');
        
        return $stats;
    }

    public function update_subscriber($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('newsletter_subscribers', $data);
    }

    public function delete_subscriber($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('newsletter_subscribers');
    }

    public function get_subscriber_by_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('newsletter_subscribers')->row_array();
    }

    public function add_unsubscribe_token($email)
    {
        $token = bin2hex(random_bytes(16));
        $this->db->where('email', $email);
        $this->db->update('newsletter_subscribers', array('unsubscribe_token' => $token));
        return $token;
    }

    public function unsubscribe_by_token($token)
    {
        $this->db->where('unsubscribe_token', $token);
        return $this->db->update('newsletter_subscribers', array('status' => 'unsubscribed'));
    }

    public function bulk_import_subscribers($emails)
    {
        $inserted = 0;
        $updated = 0;
        
        foreach ($emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $existing = $this->get_subscriber_by_email($email);
                
                if ($existing) {
                    if ($existing['status'] !== 'active') {
                        $this->db->where('email', $email);
                        $this->db->update('newsletter_subscribers', array('status' => 'active'));
                        $updated++;
                    }
                } else {
                    $data = array(
                        'email' => $email,
                        'subscribed_at' => date('Y-m-d H:i:s'),
                        'status' => 'active',
                        'unsubscribe_token' => bin2hex(random_bytes(16))
                    );
                    $this->db->insert('newsletter_subscribers', $data);
                    $inserted++;
                }
            }
        }
        
        return array('inserted' => $inserted, 'updated' => $updated);
    }
}
