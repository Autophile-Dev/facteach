<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://roytuts.com
 */
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('admin-panel/Course_model');
        $this->load->model('form-panel/User_model');
    }
    public function index()
    {
        // $user_email = $this->session->userdata('user_email');
        // $user_data['users'] = $this->User_model->getSingleUser($user_email);
        $user_email = $this->session->userdata('email');
        if ($user_email) {
            $user_data = $this->User_model->getSingleUser($user_email);
            $user_id = $user_data->user_id;
            $this->load->model('form-panel/User_model');
            $this->load->model('admin-panel/Course_model');
            $data['active_course'] = $this->Course_model->countActiveEnrollments($user_id);
            $data['complete_course'] = $this->Course_model->countCompletedEnrollments($user_id);
            $data['latest_data'] = $this->Course_model->getLatestData();
            $data['user'] = $this->User_model->getSingleUser($user_email);
            $data['courses'] = $this->Course_model->get_allCourse();
            $this->load->view('user-home', $data);
        } else {
            // redirect('log-in');
            header("Location: log-in");
        }


    }
    public function enrolled()
    {
        // $user_email=$this->session->userdata('user_email');
        // $user_data['users']=$this->User_model->getSingleUser($user_email);
        // echo implode($user_data);
        $this->load->database();
        $user_email = $this->session->userdata('email');
        if ($user_email) {
            $user_data = $this->User_model->getSingleUser($user_email);
            $user_id = $user_data->user_id;
            // echo $user_id;
            $this->load->model('admin-panel/Course_model');
            $this->load->model('form-panel/User_model');
            $data['enroll_course'] = $this->Course_model->enrolledCourses($user_id);
            $data['user'] = $this->User_model->getSingleUser($user_email);
            $this->load->view('enrolled-course', $data);
        } else {

        }


    }
    public function enrollCourse()
    {
        $this->load->database();
        $course_id = $this->input->post('course_id');
        $user_email = $this->input->post('user_email');
        $course = $this->db->get_where('courses', array('course_id' => $course_id))->row();
        $user = $this->db->get_where('users', array('user_email' => $user_email))->row();
        $enrollment_data = array(
            'course_id' => $course_id,
            'user_id' => $user->user_id,
            'course_name' => $course->course_name,
            'course_description' => $course->course_description,
            'course_duration' => $course->course_duration,
            'course_offered_by' => $course->course_offered_by,
            'course_instructor' => $course->course_instructor,
            'status' => 'active',
        );
        $existing_enrollment = $this->db->get_where('enrollment', $enrollment_data)->row();
        if ($existing_enrollment) {
            $response = array('status' => 'error', 'message' => 'This course is already exists in your queue');

        } else {
            $this->db->insert('enrollment', $enrollment_data);
            $response = array('status' => 'success', 'message' => 'Enrolled successfully');

        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function view_course($id)
    {
        $user_email = $this->session->userdata('email');
        if ($user_email) {
            $this->load->model('form-panel/User_model');
            $this->load->model('admin-panel/Course_model');
            $user_data = $this->User_model->getSingleUser($user_email);
            $user_id = $user_data->user_id;
            $data['enroll_course'] = $this->Course_model->enrolledStatus($id, $user_id);
            $data['user'] = $this->User_model->getSingleUser($user_email);
            $data['course'] = $this->Course_model->get_SingleCourseData($id);
            $this->load->view('view-course', $data);
        } else {
            redirect('log-in');
        }
    }
    public function view_completed($id)
    {
        $user_email = $this->session->userdata('email');
        if ($user_email) {
            $this->load->model('form-panel/User_model');
            $this->load->model('admin-panel/Course_model');
            $data['user'] = $this->User_model->getSingleUser($user_email);
            $data['enrolled_course'] = $this->Course_model->singleEnroll($id);
            $this->load->view('complete-course', $data);
        } else {
            redirect('log-in');
        }
    }
    public function rateCourse()
    {
        $this->load->model('form-panel/User_model');
        $this->load->model('admin-panel/Course_model');
        $totalUsers = $this->Course_model->count_users();
        $this->load->database();
        $enroll_id = $this->input->post('enroll_id');
        $rating = $this->input->post('rating');
        $this->db->select('*');
        $this->db->where('enroll_id', $enroll_id);
        $query = $this->db->get('enrollment');
        $result = $query->row();
        if ($result) {
            $courseId = $result->course_id;
            $status = $result->status;
            $user_id = $result->user_id;
            $completed = 'completed';
            $newRating = $rating * 5 / $totalUsers;
            $this->db->set('course_rating', $newRating);
            $this->db->where('course_id', $courseId);
            $this->db->update('courses');
            if ($this->db->affected_rows() > 0) {
                $this->db->set('status', $completed);
                $this->db->where('enroll_id', $enroll_id);
                $this->db->where('user_id', $user_id);
                $this->db->where('course_id', $courseId);
                $this->db->update('enrollment');
                $response = array('status' => 'success', 'message' => 'Rated successfully');
            } else {
                $response = array('status' => 'error', 'message' => 'Already Rated');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Already Rated');
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}