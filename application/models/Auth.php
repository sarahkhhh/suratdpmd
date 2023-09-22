<?php

class Auth extends CI_Model
{
    public function cek_pengguna($where)
    {
        return $this->db->get_where("user", $where);
    }

    public function cek_akun($where)
    {
        return $this->db->get_where("user", $where);
    }

    public function register($username, $email, $password)
    {
        $data_user = array(
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level' => "user",
        );
        $this->db->insert('user', $data_user);
    }
}
