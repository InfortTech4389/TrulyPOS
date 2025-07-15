<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_testimonials()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('testimonials');
        return $query->result_array();
    }

    public function get_testimonials_by_category($category)
    {
        $this->db->where('category', $category);
        $this->db->where('status', 'active');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('testimonials');
        return $query->result_array();
    }

    public function get_featured_testimonials($limit = 6)
    {
        $this->db->where('status', 'active');
        $this->db->order_by('rating', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('testimonials');
        return $query->result_array();
    }

    public function add_testimonial($data)
    {
        return $this->db->insert('testimonials', $data);
    }

    public function update_testimonial($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('testimonials', $data);
    }

    public function delete_testimonial($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('testimonials');
    }

    public function get_testimonial($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('testimonials');
        return $query->row_array();
    }

    public function get_testimonial_stats()
    {
        // Get total testimonials
        $total = $this->db->count_all('testimonials');
        
        // Get average rating
        $this->db->select_avg('rating');
        $this->db->where('status', 'active');
        $query = $this->db->get('testimonials');
        $avg_rating = $query->row()->rating;
        
        // Get testimonials by category
        $this->db->select('category, COUNT(*) as count');
        $this->db->where('status', 'active');
        $this->db->group_by('category');
        $query = $this->db->get('testimonials');
        $categories = $query->result_array();
        
        return [
            'total' => $total,
            'average_rating' => round($avg_rating, 1),
            'categories' => $categories
        ];
    }
}
