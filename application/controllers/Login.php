<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('login_model');

    }

    function index()
    {
        //if($this->session->userdata('id'))
        //{
        //    redirect('/Login', 'refresh');
        //}
        $this->load->view('welcome_message');
    }

    function validation()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $result = $this->login_model->can_login($this->input->post('email'), $this->input->post('password'));
            if($result == '')
            {
                redirect('index.php/Welcome');
            }
            else
            {
                $this->session->set_flashdata('message',$result);
                redirect('index.php/Welcome');
            }
        }
        else
        {
            $this->index();
        }
    }


}

/* End of file Controllername.php */
?>