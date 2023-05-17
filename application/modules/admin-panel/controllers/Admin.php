<?php
(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://roytuts.com
 */
class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Course_model');
        // $this->Course_model->add_course_data();
    }
    public function index()
    {
        $data['total_courses'] = $this->Course_model->count_courses();
        $data['total_users'] = $this->Course_model->count_users();
        $data['total_enrollments'] = $this->Course_model->count_enrollments();
        $this->load->view('admin-dashboard', $data);
    }
    public function add()
    {
        $this->load->view('add-course');
    }
    public function add_course()
    {
        $this->form_validation->set_rules('course_name', 'Course Name', 'trim|required');
        $this->form_validation->set_rules('course_offered_by', 'Course Offered By', 'trim|required');
        $this->form_validation->set_rules('course_instructor', 'Course Instructor', 'trim|required');
        $this->form_validation->set_rules('course_duration', 'Course Duration', 'trim|required');
        $this->form_validation->set_rules('course_description', 'Course Description', 'trim|required');
        // $this->form_validation->set_rules('course_image', 'Course Image', 'trim|required');
        //    image
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'course_name' => strip_tags(form_error('course_name')),
                'course_offered_by' => strip_tags(form_error('course_offered_by')),
                'course_instructor' => strip_tags(form_error('course_instructor')),
                'course_duration' => strip_tags(form_error('course_duration')),
                'course_description' => strip_tags(form_error('course_description')),
                // 'course_image' => strip_tags(form_error('course_image')),
            );
            $response = array('status' => 'error', 'errors' => $errors);
        } else {
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'course_offered_by' => $this->input->post('course_offered_by'),
                'course_instructor' => $this->input->post('course_instructor'),
                'course_duration' => $this->input->post('course_duration'),
                'course_description' => $this->input->post('course_description'),
            );
            $this->Course_model->add_course_data($data);
            $response = array('status' => 'success');
        }
        echo json_encode($response);
    }

    public function view_users()
    {
        $this->load->model('form-panel/User_model');
        $data['users']=$this->User_model->get_allUsers();
        $this->load->view('view-users', $data);
    }
    public function view()
    {
        $data['courses'] = $this->Course_model->get_allCourse();
        $this->load->view('view-course', $data);
    }
}