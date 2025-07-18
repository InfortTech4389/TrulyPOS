<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_setting($key)
    {
        $this->db->where('key', $key);
        $result = $this->db->get('settings')->row();
        return $result ? $result->value : null;
    }

    public function get_all_settings()
    {
        $query = $this->db->get('settings');
        $settings = array();
        
        foreach ($query->result() as $row) {
            $settings[$row->key] = $row->value;
        }
        
        return $settings;
    }

    public function update_setting($key, $value)
    {
        $this->db->where('key', $key);
        return $this->db->update('settings', array('value' => $value));
    }

    public function insert_setting($key, $value, $type = 'text', $description = null)
    {
        $data = array(
            'key' => $key,
            'value' => $value,
            'type' => $type,
            'description' => $description
        );
        return $this->db->insert('settings', $data);
    }

    public function delete_setting($key)
    {
        $this->db->where('key', $key);
        return $this->db->delete('settings');
    }

    // Enhanced settings management methods for admin
    public function update_settings($settings)
    {
        $updated = 0;
        
        foreach ($settings as $key => $value) {
            $this->db->where('key', $key);
            $existing = $this->db->get('settings')->row();
            
            if ($existing) {
                $this->db->where('key', $key);
                if ($this->db->update('settings', array('value' => $value))) {
                    $updated++;
                }
            } else {
                if ($this->db->insert('settings', array('key' => $key, 'value' => $value))) {
                    $updated++;
                }
            }
        }
        
        return $updated > 0;
    }

    public function get_settings_by_category($category = null)
    {
        if ($category) {
            $this->db->like('key', $category . '_', 'after');
        }
        
        $query = $this->db->get('settings');
        $settings = array();
        
        foreach ($query->result() as $row) {
            $settings[$row->key] = array(
                'value' => $row->value,
                'type' => $row->type ?? 'text',
                'description' => $row->description ?? ''
            );
        }
        
        return $settings;
    }

    public function create_default_settings()
    {
        $default_settings = array(
            'site_name' => array('value' => 'TrulyPOS', 'type' => 'text', 'description' => 'Website name'),
            'site_email' => array('value' => 'info@trulypos.com', 'type' => 'email', 'description' => 'Main contact email'),
            'site_phone' => array('value' => '+1-800-123-4567', 'type' => 'text', 'description' => 'Contact phone number'),
            'admin_email' => array('value' => 'admin@trulypos.com', 'type' => 'email', 'description' => 'Admin notification email'),
            'notification_email_enabled' => array('value' => '1', 'type' => 'boolean', 'description' => 'Enable email notifications'),
            'notification_whatsapp_enabled' => array('value' => '1', 'type' => 'boolean', 'description' => 'Enable WhatsApp notifications'),
            'auto_response_enabled' => array('value' => '1', 'type' => 'boolean', 'description' => 'Enable auto-response for enquiries'),
            'maintenance_mode' => array('value' => '0', 'type' => 'boolean', 'description' => 'Enable maintenance mode'),
            'max_file_upload_size' => array('value' => '10', 'type' => 'number', 'description' => 'Maximum file upload size (MB)'),
            'timezone' => array('value' => 'UTC', 'type' => 'text', 'description' => 'System timezone')
        );

        foreach ($default_settings as $key => $setting) {
            $this->db->where('key', $key);
            $existing = $this->db->get('settings')->row();
            
            if (!$existing) {
                $data = array(
                    'key' => $key,
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                    'description' => $setting['description']
                );
                $this->db->insert('settings', $data);
            }
        }
        
        return true;
    }

    public function backup_settings()
    {
        $settings = $this->get_all_settings();
        $backup_data = array(
            'timestamp' => date('Y-m-d H:i:s'),
            'settings' => $settings
        );
        
        return json_encode($backup_data, JSON_PRETTY_PRINT);
    }

    public function restore_settings($backup_json)
    {
        $backup_data = json_decode($backup_json, true);
        
        if (!$backup_data || !isset($backup_data['settings'])) {
            return false;
        }
        
        return $this->update_settings($backup_data['settings']);
    }
}
