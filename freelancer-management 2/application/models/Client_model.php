<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {
    public function get_clients() {
        return $this->db->get('clients')->result_array();
    }

    public function add_client($data) {
        return $this->db->insert('clients', $data);
    }

    public function get_client($id) {
        $this->db->where('id', $id);
        return $this->db->get('clients')->row_array();
    }

    public function update_client($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('clients', $data);
    }

    public function delete_client($id) {
        $this->db->where('id', $id);
        return $this->db->delete('clients');
    }
}
