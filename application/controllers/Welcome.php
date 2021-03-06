<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Employee_Model');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

	public function index()
	{
	    if (!isset($_SESSION['id'])){
            $data['title'] = "Login Page";
            $data['error_info'] = "You must login first";
            $this->load->view('header', $data);
            $this->load->view('login', $data);
            $this->load->view('footer');

        }
        else{
            $data['user'] = $this->Employee_Model->get_user2();
            $this->load->view('welcome_message', $data);
        }

	}

    public function login()
    {
        if (isset($_SESSION['id'])){
            header("Location: ".base_url('index.php'));
        }

        $data['title'] = 'Login Page';
        $data['error_info'] = '';

        $this->form_validation->set_rules('id', 'Employee ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('header', $data);
            $this->load->view('login', $data);
            $this->load->view('footer');
        }
        else {
            $user = $this->Employee_Model->get_user();
            if (empty($user)){
                $data['error_info'] = "Invalid ID or Password";
                $this->load->view('header', $data);
                $this->load->view('login', $data);
                $this->load->view('footer');
            }
            else{
                $_SESSION['id'] = $user['id']; // create session with ID
                header("Location: ".base_url("index.php/"));
            }
        }
	}

    public function withdrawal()
    {
        if (!isset($_SESSION['id'])) {
            header("Location: " . base_url('index.php/welcome/login'));
        }
        else{
            $user = $this->Employee_Model->get_user2();
            $data['user'] = $user;
            $data['error_message'] = '';
            $data['points'] = '';
            $data['res'] = '';

            $this->form_validation->set_rules('reason', 'Reason', 'required');
            $this->form_validation->set_rules('points', 'Points', 'required|numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE){  //load form if it din't post
                $this->load->view('header');
                $this->load->view('withdraw', $data);
                $this->load->view('footer');
            }
            else {
                $msg = $this->Employee_Model->withdraw_points();
                if($msg === "OK"){
                    header("Location: ".base_url('index.php/welcome'));
                }
                else{
                    $data['points'] = $this->input->post('points');;
                    $data['res'] = $this->input->post('reason');
                    $data['error_message'] = $msg;
                    $this->load->view('header');
                    $this->load->view('withdraw', $data);
                    $this->load->view('footer');
                }

            }

        }

    }


    public function logout()
    {
        $_SESSION = array();
        header("Location: ".base_url('index.php/welcome/login'));
	}

}
