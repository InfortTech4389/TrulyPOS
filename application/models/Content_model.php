<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_features($limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('status', 'active');
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('features')->result();
    }

    public function get_testimonials($limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('status', 'active');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('testimonials')->result();
    }

    public function get_pricing_plans()
    {
        $this->db->where('status', 'active');
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('pricing_plans')->result();
    }

    public function get_team_members()
    {
        $this->db->where('status', 'active');
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('team_members')->result();
    }

    public function get_blog_posts($limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('status', 'published');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('blog_posts')->result();
    }

    public function get_blog_post($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('status', 'published');
        return $this->db->get('blog_posts')->row();
    }

    public function get_faqs()
    {
        $this->db->where('status', 'active');
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('faqs')->result();
    }

    public function insert_feature($data)
    {
        return $this->db->insert('features', $data);
    }

    public function update_feature($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('features', $data);
    }

    public function delete_feature($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('features');
    }

    public function insert_testimonial($data)
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

    public function insert_blog_post($data)
    {
        return $this->db->insert('blog_posts', $data);
    }

    public function update_blog_post($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('blog_posts', $data);
    }

    public function delete_blog_post($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('blog_posts');
    }
}
