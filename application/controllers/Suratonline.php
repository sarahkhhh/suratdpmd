<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratonline extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');
        $this->load->model('pengajuan_track_model', 'pengajuan_track');
        $this->load->model('M_Penduduk', 'penduduk');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data = $this->dashboard->user();
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Pengajuan Surat Online',
            'sub_title' => ''
        ];

        $data['option'] = [
            'Pilih',
            'Surat Pengantar:' => [
                'SPKK' => 'Kartu Keluarga',
                'SPNA' => 'Nikah(N.A)',
            ],
            'Surat Keterangan:' => [
                'SKKL' => 'Kelahiran',
                'SKKM' => 'Kematian',
                'SKP' => 'Pindah',
                'SKD' => 'Datang',
                'SKBM' => 'Belum Menikah',
                'SKPH' => 'Penghasilan',
                'SKM' => 'Miskin',
                'SKU' => 'Usaha',
                'SKT' => 'Tanah',
                'SKGG' => 'Ganti Rugi',
            ],
            'Rekomendasi Surat:' => [
                'SITU' => 'Izin Tempat Usaha',
                'SIMB' => 'Izin Mendirikan Bangunan',
            ],
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('frontend/header', $judul);
        $this->load->view('frontend/s_online', $data);
        $this->load->view('frontend/footer');
    }

    public function ajukan()
    {

        $nik = $this->input->post('nik', TRUE);
        if($this->pengajuan_track->findById($nik)){
        redirect(base_url("home"));
        }else{
            $now = new DateTime('now');
 
        $status = [
            1 => 1,  // Pending
            2 => 2,  // Diterima dan Dilanjutkan
            3 => 3,  // Sudah Diketik dan Diparaf
            4 => 4,  // Sudah Ditandatangani Lurah dan Selesai
        ];

        $nama = $this->input->post('nama', TRUE);
        $t_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tanggal_lahir', TRUE);
        $job = $this->input->post('pekerjaan', TRUE);
        $gender = $this->input->post('gender', TRUE);
        $nikah = $this->input->post('status', TRUE);
        $pend = $this->input->post('pendidikan', TRUE);
        $agama = $this->input->post('agama', TRUE);
        $telp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $desa = $this->input->post('desa', TRUE);
        $kec = $this->input->post('kecamatan', TRUE);
        $dtm = $now->format('Y-m-d H:i:s');
        // $ktp = $this->input->post('ktp', TRUE);
        // $pribadi = $this->input->post('pribadi', TRUE);
        // $desa = $this->input->post('desa', TRUE);
        // $camat = $this->input->post('camat', TRUE);
        // $ijazah = $this->input->post('ijazah', TRUE);
        // $foto = $this->input->post('foto', TRUE);
       


        
        $no_hp = $this->input->post('no_hp', TRUE);
        $jenis_surat = $this->input->post('jenis_surat', TRUE);

       
            $save = [
                'nik' => $nik,
                'name' => $nama,
                'birthplace' => $t_lahir,
                'birthday' => $tgl_lahir,
                'job' => $job,
                'gender' => $gender,
                'status_married' => $nikah,
                'last_education' => $pend,
                'religion' =>$agama,
                'telp' => $telp,
                'address' => $alamat,
                'desa' => $desa,
                'kecamatan' => $kec,
                'dtm_Submission' => $dtm,
               
              
            ];

            $this->db->insert('pengajuan_surat', $save);
            // $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-cross"></i> Maaf!</h5> NIK Anda tidak Terdaftar!</div>');
            // redirect(base_url("suratonline"));
        

        //Output a v4 UUID 
        $rid = uniqid($jenis_surat, TRUE);
        $rid2 = str_replace('.', '', $rid);
        $rid3 = substr(str_shuffle($rid2), 0, 3);

        $cc = $this->db->count_all('upload_file') + 1;
        $count = str_pad($cc, 3, STR_PAD_LEFT);
        $id = $jenis_surat . "-";
        $d = date('d');
        $y = date('y');
        $mnth = date("m");
        $s = date('s');
        $randomize = $d + $y + $mnth + $s;
        $id = $id . $rid3 . $randomize . $count . $y;

        // var_dump($id);
        // die;

       
            $ktp = substr($_FILES['ktp']['name'], -7);
            $file =  uniqid() . $ktp;
            $configKtp['upload_path']          = './uploads/berkas';
            $configKtp['allowed_types']        = '*';
            $configKtp['max_size']             = 5120; // 5MB
            $configKtp['file_name']            = $file;

            $this->load->library('upload', $configKtp);


            $filePribadi = substr($_FILES['pribadi']['name'], -7);
            $filePribadi =uniqid() . $filePribadi;
            $configPribadi['upload_path']          = './uploads/berkas';
            $configPribadi['allowed_types']        = '*';
            $configPribadi['max_size']             = 5120; // 5MB
            $configPribadi['file_name']            = $filePribadi;

            $this->load->library('upload', $configPribadi);

            
            $fileDesa = substr($_FILES['desa']['name'], -7);
            $fileDesa = uniqid() . $fileDesa;
            $configDesa['upload_path']          = './uploads/berkas';
            $configDesa['allowed_types']        = '*';
            $configDesa['max_size']             = 5120; // 5MB
            $configDesa['file_name']            = $fileDesa;

            $this->load->library('upload', $configDesa);

            $fileCamat = substr($_FILES['camat']['name'], -7);
            $fileCamat = uniqid() . $fileCamat;
            $configCamat['upload_path']          = './uploads/berkas';
            $configCamat['allowed_types']        = '*';
            $configCamat['max_size']             = 5120; // 5MB
            $configCamat['file_name']            = $fileCamat;

            $this->load->library('upload', $configCamat);

            $fileIjazah = substr($_FILES['ijazah']['name'], -7);
            $fileIjazah = uniqid() . $fileIjazah;
            $configIjazah['upload_path']          = './uploads/berkas';
            $configIjazah['allowed_types']        = '*';
            $configIjazah['max_size']             = 5120; // 5MB
            $configIjazah['file_name']            = $fileIjazah;

            $this->load->library('upload', $configIjazah);

            $fileFoto = substr($_FILES['foto']['name'], -7);
            $fileFoto = uniqid() . $fileFoto;
            $configFoto['upload_path']          = './uploads/berkas';
            $configFoto['allowed_types']        = '*';
            $configFoto['max_size']             = 5120; // 5MB
            $configFoto['file_name']            = $fileFoto;

            $this->load->library('upload', $configFoto);







            if ($this->upload->do_upload("ktp")) {
                echo "<script> alert('BERHASILLL') <script>";
                $this->upload->data();                // $data = array('upload_data' => $this->upload->data());
                // $berkas = $data['upload_data']['file_name'];
            }
            if ($this->upload->do_upload("pribadi")) {
                echo "<script> alert('BERHASILLL') <script>";
                $this->upload->data();                // $data = array('upload_data' => $this->upload->data());
                // $berkas = $data['upload_data']['file_name'];
            }
            if ($this->upload->do_upload("desa")) {
                echo "<script> alert('BERHASILLL') <script>";
                $this->upload->data();                // $data = array('upload_data' => $this->upload->data());
                // $berkas = $data['upload_data']['file_name'];
            }
            if ($this->upload->do_upload("camat")) {
                echo "<script> alert('BERHASILLL') <script>";
                $this->upload->data();                // $data = array('upload_data' => $this->upload->data());
                // $berkas = $data['upload_data']['file_name'];
            }
            if ($this->upload->do_upload("ijazah")) {
                echo "<script> alert('BERHASILLL') <script>";
                $this->upload->data();                // $data = array('upload_data' => $this->upload->data());
                // $berkas = $data['upload_data']['file_name'];
            }
            if ($this->upload->do_upload("foto")) {
                echo "<script> alert('BERHASILLL') <script>";
                $this->upload->data();                // $data = array('upload_data' => $this->upload->data());
                // $berkas = $data['upload_data']['file_name'];
            }
        

        $data = [
          
            'nik' => $nik,
            'ktp' => $ktp,
            'pernyataan_pribadi' => $filePribadi,
            'suket_desa' => $desa,
            'suket_kec' => $camat,
            'Ijazah' => $ijazah,
            'pas_foto' => $foto,
        ];

        
        $this->db->insert('upload_file', $data);

        // die;

        //$this->pengajuan_track->insert_p_surat($data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Mengajukan Surat! Berikut <b>ID</b> anda: <b>' . $id . '</b></div>');
        redirect(base_url("tracking"));
        }
    }

    function IsPengajuanExist($nik)
    {
        $this->db->where('nik',$nik);
        $query = $this->db->get('pengajuan_surat');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
