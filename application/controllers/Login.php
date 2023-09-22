<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('auth');
        if ($this->session->userdata('id_user') == TRUE) {
            if ($this->session->userdata('level') == 'administrator') {
                redirect(base_url("dashboard"));
            } else {
                redirect(base_url("home"));
            }
        }
    }

    public function index()
    {
        $this->load->view("auth/login");
    }

    public function proses()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('login');
        } else {
            $email =  $this->input->post("email", TRUE);
            $password =  $this->input->post("password", TRUE);

            $query = $this->db->get_where('user', array('email' => $email));
            if ($query->num_rows() < 0) {
                $this->session->set_flashdata('error', 'Email dan Password Anda Salah');
                redirect(base_url("login"));
            } else {
                $user = $query->row();
                if (password_verify($password, $user->password)) {
                    $id_user = $user->id_user;
                    $level = $user->level;

                    $data_session = array(
                        'id_user' => $id_user,
                        'level' => $level,
                        'is_login' => true,
                    );

                    $this->session->set_userdata($data_session);

                    if ($level == "administrator") {
                        redirect(base_url("dashboard"));
                    } else {
                        redirect(base_url("home"));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Email dan Password Anda Salah, coba kembali');
                    redirect(base_url('login'));
                }
            }
        }
    }
}
