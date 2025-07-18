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

    // Customer management methods
    public function get_customers_count()
    {
        $this->db->select('DISTINCT customer_email');
        return $this->db->count_all_results('orders');
    }

    public function get_customers($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        $this->db->select('customer_email as email, customer_name as name, customer_phone as phone, 
                          MIN(created_at) as created_at, COUNT(*) as total_orders, SUM(amount) as total_spent');
        $this->db->from('orders');
        $this->db->group_by('customer_email');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_customer_details($customer_id)
    {
        // For this implementation, customer_id represents the email or a unique identifier
        $this->db->select('customer_email as email, customer_name as name, customer_phone as phone, 
                          MIN(created_at) as created_at, COUNT(*) as total_orders, SUM(amount) as total_spent');
        $this->db->from('orders');
        $this->db->where('customer_email', $customer_id);
        $this->db->or_where('id', $customer_id);
        return $this->db->get()->row_array();
    }

    public function get_customer_orders($customer_id)
    {
        $this->db->select('orders.*, pricing_plans.name as plan_name');
        $this->db->from('orders');
        $this->db->join('pricing_plans', 'orders.plan_id = pricing_plans.id', 'left');
        $this->db->where('customer_email', $customer_id);
        $this->db->or_where('orders.id', $customer_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_customer_total_spent($customer_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('customer_email', $customer_id);
        $this->db->where('status', 'paid');
        $result = $this->db->get('orders')->row();
        return $result->amount ?? 0;
    }

    // Payment management methods
    public function get_payments_count()
    {
        return $this->db->count_all('orders');
    }

    public function get_payments($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        $this->db->select('orders.*, pricing_plans.name as plan_name');
        $this->db->from('orders');
        $this->db->join('pricing_plans', 'orders.plan_id = pricing_plans.id', 'left');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_payment_details($payment_id)
    {
        $this->db->select('orders.*, pricing_plans.name as plan_name, pricing_plans.price');
        $this->db->from('orders');
        $this->db->join('pricing_plans', 'orders.plan_id = pricing_plans.id', 'left');
        $this->db->where('orders.id', $payment_id);
        return $this->db->get()->row_array();
    }

    public function get_order_by_payment($payment_id)
    {
        return $this->get_payment_details($payment_id);
    }

    public function get_customer_by_payment($payment_id)
    {
        $this->db->select('customer_name as name, customer_email as email, customer_phone as phone');
        $this->db->where('id', $payment_id);
        return $this->db->get('orders')->row_array();
    }

    public function update_payment_status($payment_id, $status, $notes = null)
    {
        $data = array(
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        if ($notes) {
            $data['notes'] = $notes;
        }
        
        $this->db->where('id', $payment_id);
        return $this->db->update('orders', $data);
    }

    // Statistics methods
    public function get_pending_orders_count()
    {
        $this->db->where('status', 'pending');
        return $this->db->count_all_results('orders');
    }

    public function get_revenue_today()
    {
        $this->db->select_sum('amount');
        $this->db->where('DATE(created_at)', date('Y-m-d'));
        $this->db->where('status', 'paid');
        $result = $this->db->get('orders')->row();
        return $result->amount ?? 0;
    }

    public function get_revenue_month()
    {
        $this->db->select_sum('amount');
        $this->db->where('MONTH(created_at)', date('n'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $this->db->where('status', 'paid');
        $result = $this->db->get('orders')->row();
        return $result->amount ?? 0;
    }

    public function get_new_customers_month()
    {
        $this->db->select('DISTINCT customer_email');
        $this->db->where('MONTH(created_at)', date('n'));
        $this->db->where('YEAR(created_at)', date('Y'));
        return $this->db->count_all_results('orders');
    }

    public function get_total_revenue()
    {
        $this->db->select_sum('amount');
        $this->db->where('status', 'paid');
        $result = $this->db->get('orders')->row();
        return $result->amount ?? 0;
    }

    public function get_pending_payments_count()
    {
        $this->db->where('status', 'pending');
        return $this->db->count_all_results('orders');
    }

    public function get_completed_payments_count()
    {
        $this->db->where('status', 'paid');
        return $this->db->count_all_results('orders');
    }

    public function get_failed_payments_count()
    {
        $this->db->where('status', 'failed');
        return $this->db->count_all_results('orders');
    }

    public function get_customer_by_license($license_id)
    {
        // This would need to be implemented based on your license system
        // For now, returning a basic structure
        return array('name' => 'Customer', 'email' => 'customer@example.com');
    }

    public function get_order_by_license($license_id)
    {
        // This would need to be implemented based on your license system
        return array('id' => 1, 'amount' => 0);
    }
}
