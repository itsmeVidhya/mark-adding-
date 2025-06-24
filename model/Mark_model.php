<?php
class Mark_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_students_marks() {
        return $this->db->get('marks')->result();
    }

    public function insert_student_marks($data) {
        return $this->db->insert('marks', $data);
    }
}
