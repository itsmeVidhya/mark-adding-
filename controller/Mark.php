<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Mark extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Mark_model");
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
    }

    public function index() {
        $data['students'] = $this->Mark_model->get_all_students_marks();
        $this->load->view('mark_view', $data);
    }
    
       public function submit() {
        $this->form_validation->set_rules('student_name', 'Student Name', 'required');
        $this->form_validation->set_rules('physics', 'Physics Mark', 'required|integer');
        $this->form_validation->set_rules('chemistry', 'Chemistry Mark', 'required|integer');
        $this->form_validation->set_rules('maths', 'Maths Mark', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors and existing data
            $data['students'] = $this->Mark_model->get_all_students_marks();
            $this->load->view('mark_view', $data);
        } else {
            // Insert new data
            $insert_data = array(
                'student_name' => $this->input->post('student_name'),
                'physics' => $this->input->post('physics'),
                'chemistry' => $this->input->post('chemistry'),
                'maths' => $this->input->post('maths')
            );
            $this->Mark_model->insert_student_marks($insert_data);

            // Redirect to clear POST and show updated list
            redirect('mark');
        }
    }
    
}
