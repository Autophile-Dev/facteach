<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_course_data($data)
    {
        $this->db->insert('courses', $data);
        $this->db->affected_rows();
    }
    public function get_allCourse()
    {
        $query = $this->db->get('courses');
        return $query->result();
    }
    public function getLatestData()
    {
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->order_by('course_id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_SingleCourseData($id)
    {
        $query = $this->db->get_where('courses', array('course_id' => $id));
        return $query->row();
    }
    public function count_courses()
    {
        return $this->db->count_all('courses');
    }
    public function count_users()
    {
        return $this->db->count_all('users');
    }
    public function countActiveEnrollments($id)
    {
        $this->db->select('COUNT(*) as active_count');
        $this->db->from('enrollment');
        $this->db->where('user_id', $id);
        $this->db->where('status', 'active');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['active_count'];
    }
    public function countCompletedEnrollments($id)
    {
        $this->db->select('COUNT(*) as complete_count');
        $this->db->from('enrollment');
        $this->db->where('user_id', $id);
        $this->db->where('status', 'completed');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['complete_count'];
    }
    public function count_enrollments()
    {
        return $this->db->count_all('enrollment');
    }
    public function enrolledStatus($id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('enrollment');
        $this->db->where('course_id', $id);
        $this->db->where('user_id', $user_id);
        // $this->db->where('status', 'active');
        $query = $this->db->get();
        $result = $query->row_array();
        if (!empty($result) && isset($result['status'])) {
            return $result['status'];
        } else {
            return null; // or any other value to indicate no enrollment record found
        }
    }
    public function singleEnroll($enroll_id){
        $this->db->select('*');
        $this->db->from('enrollment');
        $this->db->where('enroll_id', $enroll_id);
        $query=$this->db->get();
        return $query->row();
    }
    public function enrolledCourses($id)
    {
        $this->db->select('*');
        $this->db->from('enrollment');
        $this->db->where('user_id', $id);
        $this->db->order_by('course_id', 'desc');
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
}