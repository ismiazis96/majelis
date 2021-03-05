<?php

class M_heading extends CI_Model{

	function get_heading_data(){
		$query = $this->db->get('tbl_heading',3);
		return $query;

		// $query="SELECT * FROM tbl_heading";
  //     	return $this->db->query($query)->result_array();
	}

	function simpan_heading($judul,$desc,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_heading (heading_image,heading_description,heading_judul) VALUES ('$photo','$desc','$judul')");
		return $hsl;
	}
	function simpan_heading_tanpa_img($judul,$desc){
		$hsl=$this->db->query("INSERT INTO tbl_heading (heading_description,heading_judul) VALUES ('$desc','$judul')");
		return $hsl;
	}

	function update_heading($kode,$judul,$desc,$photo){
		$hsl=$this->db->query("UPDATE tbl_heading SET heading_judul='$judul',heading_description='$desc',heading_image='$photo' WHERE heading_id='$kode'");
		return $hsl;
	 }
	function update_heading_tanpa_img($kode,$judul,$desc){
		$hsl=$this->db->query("UPDATE tbl_heading SET heading_judul='$judul',heading_description='$desc' WHERE heading_id='$kode'");
		return $hsl;
	}
	function hapus_heading($kode){
		$hsl=$this->db->query("DELETE FROM tbl_heading WHERE heading_id='$kode'");
		return $hsl;
	}

	function update_information_heading($heading_id,$judul,$description,$image){
		$this->db->set('heading_image',$image);
		$this->db->set('heading_judul',$judul);
		$this->db->set('heading_description',$description);
		$this->db->where('heading_id',$heading_id);
		$this->db->update('tbl_heading');
	}

	function update_information_heading_noimg($heading_id,$judul,$description){
		$this->db->set('heading_judul',$judul);
		$this->db->set('heading_description',$description);
		$this->db->where('heading_id',$heading_id);
		$this->db->update('tbl_heading');
	}
}