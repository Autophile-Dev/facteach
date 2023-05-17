<?php
(defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://roytuts.com
 */
class Form extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        // $this->load->library ( 'session' );
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('User_model');
    }
    public function signUp()
    {
        $this->load->view('sign-up');
    }
    public function registerUser()
    {
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
        $this->form_validation->set_rules('user_email', 'User Email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'User Password', 'trim|required');
        $message = array();

        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'user_name' => strip_tags(form_error('user_name')),
                'user_email' => strip_tags(form_error('user_email')),
                'user_password' => strip_tags(form_error('user_password')),
            );
            $response = array('status' => 'error', 'errors' => $errors);
        } else {
            $user_email = $this->input->post('user_email');
            $user_exists = $this->User_model->check_user_exists($user_email);

            if ($user_exists) {
                $response = array('status' => 'error', 'message' => 'User already exists with this email');
            } else {
                $data = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_email' => $user_email,
                    'user_password' => $this->input->post('user_password'),
                );
                $this->User_model->add_user_data($data);
                $response = array('status' => 'success', 'message' => 'User registered successfully');
            }
        }

        // Return the JSON-encoded response instead of outputting it
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function logIn()
    {
        $this->load->view('log-in');
    }
    public function logInUser()
    {
        $this->form_validation->set_rules('user_email', 'User Email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'User Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'user_email' => strip_tags(form_error('user_email')),
                'user_password' => strip_tags(form_error('user_password')),
            );
            $response = array('status' => 'error', 'errors' => $errors);
        } else {
            $user_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            $user_exists = $this->User_model->authenticate($user_email, $user_password);

            if ($user_exists) {
                $response = array('status' => 'success', 'message' => 'Logging in...');
                $this->session->set_userdata('email', $user_email);
                // redirect('index.php/home');

            } else {
                $response = array('status' => 'error', 'message' => 'Invalid Email or password. Please try again');
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function logout()
    {
        $this->session->unset_userdata('user_email');

        // Redirect to login page
        redirect('log-in');
        // header('location:' . base_url() . "index.php/form/login/" . $this->index());
    }
}