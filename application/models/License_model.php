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
}
