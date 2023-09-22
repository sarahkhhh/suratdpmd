<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $data['title'] = "Profil";
        $idUser = $this->session->userdata('id_user');
        $user['user'] = $this->db->get_where('user', ['id_user' => $idUser])->row_array();
        $this->load->view("frontend/header", $data);
        $this->load->view('warga/profile', $user);
    }
}
