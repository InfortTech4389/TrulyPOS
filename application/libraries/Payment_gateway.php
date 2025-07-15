<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_gateway {

    private $ci;
    private $razorpay_key;
    private $razorpay_secret;

    public function __construct()
    {
        $this->ci =& get_instance();
        
        // Razorpay credentials - move to config file in production
        $this->razorpay_key = 'rzp_test_YOUR_KEY_HERE';
        $this->razorpay_secret = 'YOUR_SECRET_KEY_HERE';
    }

    public function create_order($data)
    {
        $url = 'https://api.razorpay.com/v1/orders';
        
        $order_data = [
            'amount' => $data['amount'] * 100, // Convert to paise
            'currency' => $data['currency'],
            'receipt' => $data['receipt'],
            'notes' => $data['notes']
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));
        curl_setopt($ch, CURLOPT_USERPWD, $this->razorpay_key . ':' . $this->razorpay_secret);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            $order = json_decode($response, true);
            
            // Save order to database
            $order_data = [
                'order_id' => $order['id'],
                'plan_id' => $data['notes']['plan_id'],
                'customer_name' => $data['notes']['customer_name'],
                'customer_email' => $data['notes']['customer_email'],
                'amount' => $data['amount'],
                'currency' => $data['currency'],
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $this->ci->load->model('Order_model');
            $this->ci->Order_model->insert_order($order_data);
            
            return $order;
        }

        return false;
    }

    public function verify_payment($payment_id, $order_id, $signature)
    {
        $expected_signature = hash_hmac('sha256', $order_id . '|' . $payment_id, $this->razorpay_secret);
        
        if ($expected_signature === $signature) {
            return true;
        }
        
        return false;
    }

    public function get_payment_details($payment_id)
    {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->razorpay_key . ':' . $this->razorpay_secret);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            return json_decode($response, true);
        }

        return false;
    }

    public function refund_payment($payment_id, $amount = null)
    {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/refund';
        
        $refund_data = [];
        if ($amount) {
            $refund_data['amount'] = $amount * 100; // Convert to paise
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($refund_data));
        curl_setopt($ch, CURLOPT_USERPWD, $this->razorpay_key . ':' . $this->razorpay_secret);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            return json_decode($response, true);
        }

        return false;
    }

    public function get_key_id()
    {
        return $this->razorpay_key;
    }
}
