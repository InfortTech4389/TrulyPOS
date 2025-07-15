<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_contact($data)
    {
        return $this->db->insert('contacts', $data);
    }

    public function get_contacts($limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contacts')->result();
    }

    public function get_contact($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('contacts')->row();
    }

    public function update_contact($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('contacts', $data);
    }

    public function delete_contact($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contacts');
    }

    public function get_contact_count()
    {
        return $this->db->count_all('contacts');
    }
}
