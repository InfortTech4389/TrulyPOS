<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_license($data)
    {
        return $this->db->insert('licenses', $data);
    }

    public function get_license($id)
    {
        $this->db->select('licenses.*, pricing_plans.name as plan_name, orders.customer_name, orders.customer_email');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->where('licenses.id', $id);
        return $this->db->get()->row();
    }

    public function get_license_by_key($license_key)
    {
        $this->db->select('licenses.*, pricing_plans.name as plan_name, orders.customer_name, orders.customer_email');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->where('licenses.license_key', $license_key);
        return $this->db->get()->row();
    }

    public function get_license_by_order($order_id)
    {
        $this->db->select('licenses.*, pricing_plans.name as plan_name');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->where('licenses.order_id', $order_id);
        return $this->db->get()->row();
    }

    public function get_licenses($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('licenses.*, pricing_plans.name as plan_name, orders.customer_name, orders.customer_email');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->order_by('licenses.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function update_license($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('licenses', $data);
    }

    public function get_license_count()
    {
        return $this->db->count_all('licenses');
    }

    public function get_active_licenses_count()
    {
        $this->db->where('status', 'active');
        return $this->db->count_all_results('licenses');
    }

    public function deactivate_license($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('licenses', ['status' => 'inactive']);
    }

    // Enhanced license management methods for admin
    public function get_recent_licenses($limit = 5)
    {
        $this->db->limit($limit);
        $this->db->select('licenses.*, pricing_plans.name as plan_name, orders.customer_name, orders.customer_email');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->order_by('licenses.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_customer_licenses($customer_id)
    {
        $this->db->select('licenses.*, pricing_plans.name as plan_name');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->where('orders.customer_email', $customer_id);
        $this->db->order_by('licenses.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_licenses_count()
    {
        return $this->db->count_all('licenses');
    }

    public function get_license_details($license_id)
    {
        $this->db->select('licenses.*, pricing_plans.name as plan_name, pricing_plans.price, orders.customer_name, orders.customer_email, orders.amount');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->where('licenses.id', $license_id);
        return $this->db->get()->row_array();
    }

    public function get_expired_licenses_count()
    {
        $this->db->where('expires_at <', date('Y-m-d H:i:s'));
        $this->db->where('status !=', 'expired');
        return $this->db->count_all_results('licenses');
    }

    public function get_expiring_soon_count($days = 30)
    {
        $expiry_date = date('Y-m-d H:i:s', strtotime("+{$days} days"));
        $this->db->where('expires_at <=', $expiry_date);
        $this->db->where('expires_at >', date('Y-m-d H:i:s'));
        $this->db->where('status', 'active');
        return $this->db->count_all_results('licenses');
    }

    public function get_licenses_with_pagination($limit = 20, $offset = 0)
    {
        $this->db->limit($limit, $offset);
        $this->db->select('licenses.*, pricing_plans.name as plan_name, orders.customer_name, orders.customer_email');
        $this->db->from('licenses');
        $this->db->join('pricing_plans', 'licenses.plan_id = pricing_plans.id');
        $this->db->join('orders', 'licenses.order_id = orders.id');
        $this->db->order_by('licenses.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function update_license_status($license_id, $status)
    {
        $data = array(
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        if ($status === 'expired') {
            $data['expired_at'] = date('Y-m-d H:i:s');
        }
        
        $this->db->where('id', $license_id);
        return $this->db->update('licenses', $data);
    }

    public function get_license_statistics()
    {
        $stats = array();
        
        // Total licenses
        $stats['total'] = $this->db->count_all('licenses');
        
        // Active licenses
        $this->db->where('status', 'active');
        $stats['active'] = $this->db->count_all_results('licenses');
        
        // Expired licenses
        $this->db->reset_query();
        $this->db->where('status', 'expired');
        $stats['expired'] = $this->db->count_all_results('licenses');
        
        // Expiring soon (next 30 days)
        $this->db->reset_query();
        $expiry_date = date('Y-m-d H:i:s', strtotime('+30 days'));
        $this->db->where('expires_at <=', $expiry_date);
        $this->db->where('expires_at >', date('Y-m-d H:i:s'));
        $this->db->where('status', 'active');
        $stats['expiring_soon'] = $this->db->count_all_results('licenses');
        
        return $stats;
    }
}
