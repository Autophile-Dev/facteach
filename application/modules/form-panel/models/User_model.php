<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add_user_data($data)
    {
        $this->db->insert('users', $data);
        $this->db->affected_rows();
    }
    public function check_user_exists($email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function authenticate($email, $password)
    {
        $query = $this->db->get_where('users', array('user_email' => $email, 'user_password' => $password));
        return $query->row_array();
    }
    public function get_allUsers()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    public function getSingleUser($email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

}