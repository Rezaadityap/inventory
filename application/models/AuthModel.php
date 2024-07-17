<?php

class AuthModel extends CI_Model
{
    public function cek_login()
    {
        $nip = set_value('nip');
        $password = set_value('password');

        $hasil = $this->db->where('nip', $nip)
            ->where('password', md5($password))
            ->limit(1)
            ->get('users');

        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return false;
        }
    }
}

?>