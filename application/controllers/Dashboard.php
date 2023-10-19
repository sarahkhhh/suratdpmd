<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model', 'dashboard');
        if ($this->session->userdata('is_login') == FALSE) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $judul = [
            'title' => 'Dashboard',
            'sub_title' => ''
        ];

        $januari = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="1"')->num_rows();
        $februari = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="2"')->num_rows();
        $maret = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="3"')->num_rows();
        $april = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="4"')->num_rows();
        $mei = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="5"')->num_rows();
        $juni = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="6"')->num_rows();
        $juli = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="7"')->num_rows();
        $agustus = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="8"')->num_rows();
        $september = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="9"')->num_rows();
        $oktober = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="10"')->num_rows();
        $november = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="11"')->num_rows();
        $desember = $this->db->query('SELECT * FROM pengajuan_surat WHERE month(dtm_submission)="12"')->num_rows();

        $data['pengajuan'] = [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember];
        // $data['pengajuan'] = $this->db->query('SELECT * FROM pengajuan_surat WHERE status="1" ')->num_rows();

        $this->load->view('templates/header', $judul);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer', $data);
    }
}
