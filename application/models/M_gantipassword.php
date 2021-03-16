<?php
class M_gantipassword extends CI_Model{
	
	function checking_old_password($user_id,$old_pass){
		$this->db->where('pengguna_id', $user_id);
		$this->db->where('pengguna_password', $old_pass);
		$query = $this->db->get('tbl_pengguna');
		return $query;
	}

	function change_password($user_id,$new_pass){
		$this->db->set('pengguna_password', $new_pass);
		$this->db->where('pengguna_id', $user_id);
		$this->db->update('tbl_pengguna');
	}
}