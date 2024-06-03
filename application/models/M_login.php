<?php
class M_login extends CI_Model
{
    function cekadmin($u, $p)
    {
        // $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        $hasil = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_username='$u' AND pengguna_password=md5('$p') AND pengguna_status='1'");
        return $hasil;
    }
}
