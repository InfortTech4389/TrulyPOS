<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_order($data)
    {
        return $this->db->insert('orders', $data);
    }

    public function get_order($id)
    {
        $this->db->select('orders.*, pricing_plans.name as plan_name, pricing_plans.price');
        $this->db->from('orders');
        $this->db->join('pricing_plans', 'orders.plan_id = pricing_plans.id');
        $this->db->where('orders.id', $id);
        return $this->db->get()->row();
    }

    public function get_order_by_id($order_id)
    {
        $this->db->select('orders.*, pricing_plans.name as plan_name, pricing_plans.price');
        $this->db->from('orders');
        $this->db->join('pricing_plans', 'orders.plan_id = pricing_plans.id');
        $this->db->where('orders.order_id', $order_id);
        return $this->db->get()->row();
    }

    public function get_orders($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('orders.*, pricing_plans.name as plan_name, pricing_plans.price');
        $this->db->from('orders');
        $this->db->join('pricing_plans', 'orders.plan_id = pricing_plans.id');
        $this->db->order_by('orders.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function update_order($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('orders', $data);
    }

    public function get_order_by_razorpay_id($razorpay_order_id)
    {
        $this->db->where('razorpay_order_id', $razorpay_order_id);
        return $this->db->get('orders')->row();
    }

    public function get_order_count()
    {
        return $this->db->count_all('orders');
    }

    public function get_revenue_stats()
    {
        $this->db->select('COUNT(*) as total_orders, SUM(amount) as total_revenue');
        $this->db->where('status', 'paid');
        return $this->db->get('orders')->row();
    }

    public function get_monthly_revenue()
    {
        $this->db->select('MONTH(created_at) as month, YEAR(created_at) as year, SUM(amount) as revenue');
        $this->db->where('status', 'paid');
        $this->db->where('created_at >=', date('Y-01-01'));
        $this->db->group_by('YEAR(created_at), MONTH(created_at)');
        $this->db->order_by('year, month');
        return $this->db->get('orders')->result();
    }
}
