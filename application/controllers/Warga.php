<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

    public function index()
    {
        $judul = [
            'title' => 'Beranda Warga',
        ];
        $this->load->view('frontend/header', $judul);
        $this->load->view('warga/index');
        $this->load->view('frontend/footer');
    }
}
