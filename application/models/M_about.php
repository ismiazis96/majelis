<?php

class M_about extends CI_Model{
	

	// about information

	function get_about_data(){
		$query = $this->db->get('tbl_about',1);
		return $query;
	}

	function update_information_about($about_id,$description,$image){
		$this->db->set('about_image',$image);
		$this->db->set('about_description',$description);
		$this->db->where('about_id',$about_id);
		$this->db->update('tbl_about');
	}

	function update_information_about_noimg($about_id,$description){
		$this->db->set('about_description',$description);
		$this->db->where('about_id',$about_id);
		$this->db->update('tbl_about');
	}
}