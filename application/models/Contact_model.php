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

    // Enhanced contact management methods for admin
    public function get_contact_details($contact_id)
    {
        $this->db->where('id', $contact_id);
        return $this->db->get('contacts')->row_array();
    }

    public function mark_as_viewed($contact_id)
    {
        $data = array(
            'is_read' => 1,
            'viewed_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $contact_id);
        return $this->db->update('contacts', $data);
    }

    public function save_response($response_data)
    {
        // Create contact_responses table if it doesn't exist
        if (!$this->db->table_exists('contact_responses')) {
            $this->db->query("
                CREATE TABLE contact_responses (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    contact_id INTEGER NOT NULL,
                    response_message TEXT NOT NULL,
                    response_type VARCHAR(20) NOT NULL,
                    responded_by VARCHAR(100),
                    responded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY (contact_id) REFERENCES contacts(id)
                )
            ");
        }
        
        $result = $this->db->insert('contact_responses', $response_data);
        
        // Update contact status
        if ($result) {
            $this->db->where('id', $response_data['contact_id']);
            $this->db->update('contacts', array('status' => 'responded'));
        }
        
        return $result;
    }

    public function get_new_enquiries_count()
    {
        $this->db->where('is_read', 0);
        $this->db->or_where('status', 'new');
        return $this->db->count_all_results('contacts');
    }

    public function get_responded_enquiries_count()
    {
        $this->db->where('status', 'responded');
        return $this->db->count_all_results('contacts');
    }

    public function get_pending_enquiries_count()
    {
        $this->db->where_in('status', array('new', 'pending'));
        return $this->db->count_all_results('contacts');
    }

    public function mark_all_as_read()
    {
        $data = array(
            'is_read' => 1,
            'viewed_at' => date('Y-m-d H:i:s')
        );
        return $this->db->update('contacts', $data);
    }

    public function set_priority($contact_id, $priority, $notes = null)
    {
        $data = array(
            'priority' => $priority
        );
        
        if ($notes) {
            $data['priority_notes'] = $notes;
        }
        
        $this->db->where('id', $contact_id);
        return $this->db->update('contacts', $data);
    }

    public function get_contacts_with_filters($filters = array(), $limit = null, $offset = 0)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $this->db->group_start();
            $this->db->like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('message', $search);
            $this->db->group_end();
        }

        if (!empty($filters['status'])) {
            $this->db->where('status', $filters['status']);
        }

        if (!empty($filters['priority'])) {
            $this->db->where('priority', $filters['priority']);
        }

        if (!empty($filters['date_filter'])) {
            switch ($filters['date_filter']) {
                case 'today':
                    $this->db->where('DATE(created_at)', date('Y-m-d'));
                    break;
                case 'week':
                    $this->db->where('created_at >=', date('Y-m-d', strtotime('-7 days')));
                    break;
                case 'month':
                    $this->db->where('MONTH(created_at)', date('n'));
                    $this->db->where('YEAR(created_at)', date('Y'));
                    break;
            }
        }

        if (!empty($filters['source'])) {
            $this->db->where('source', $filters['source']);
        }

        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contacts')->result_array();
    }
}
