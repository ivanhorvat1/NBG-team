<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->model('User_model');
        $this->load->model('Login_model');

    }

    public function header()
    {
        $this->load->view('public/public_header');
    }

    public function footer()
    {
        $this->load->view('public/public_footer');
    }

    public function index()
    {
        if($this->session->userdata('user_id'))
            return redirect('dashboard');
        $this->load->helper('form');
        $this->header();
        $this->footer();
        $this->load->view('public/admin_login');
    }

    public function admin_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

        if($this->form_validation->run('admin_login') )
        {
            //Success
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('Login_model');
            $login_id = $this->Login_model->login_valid($email, $password);
            if($login_id)
            {
                //login user


                $db_data = $this->User_model->readUserInformation($login_id);
                //set session
                $newdata = array(
                    //'s_user_id' => $db_data[0]->id,
                    's_is_admin' => $db_data[0]->is_admin
                );

                $this->session->set_userdata($newdata);




                $this->session->set_userdata('user_id', $login_id);
                return redirect('dashboard');
                //echo "password match";
            }
            else
            {
               $this->session->set_flashdata('login_failed','Invalid combination email/password');
                return redirect('login');
                //failed
            }
        }
        else
        {
            //Fail
            $this->header();
            $this->load->view('public/admin_login');
            $this->footer();
            //echo validation_errors();
        }
    }

    public function register_view(){
        $this->header();
        $this->load->view('public/register_view');
        $this->footer();
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

        if($this->form_validation->run('register') ) {
            //Success
            $post = $this->input->post();
            $email = $this->input->post('email');
            $data_sec = $this->security->xss_clean($email);
            if($this->Login_model->email($data_sec)){
                $this->session->set_flashdata('email','Email exist in database please login!');
                redirect('');
            }
            else {
                unset($post['submit'], $post['passconf']);
                $this->session->set_flashdata('register', 'You are successfully registered! Please login!');
                $data = $this->security->xss_clean($post);
                $this->Login_model->register($data);
                redirect('');
            }
        }
        else {
            $this->header();
            $this->load->view('public/register_view');
            $this->footer();
        }
    }

    public function logout()
    {
        $array_items = array('s_is_admin' => '');
        $this->session->unset_userdata('user_id',$array_items);
        return redirect('');
    }

}