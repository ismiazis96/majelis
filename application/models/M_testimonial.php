<?php

class M_testimonial extends CI_Model{

	function get_testimonial()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_testimonial");
		return $hasil;
	}

	function simpan_testimonial($nama,$content,$status,$photo)
	{
		$hasil = $this->db->query("INSERT INTO tbl_testimonial (testimonial_name,testimonial_content,testimonial_status,testimonial_image) VALUES('$nama','$content','$status','$photo')");
		return $hasil;
	}

	function simpan_testi_no_img($nama,$content,$status)
	{
		$hasil = $this->db->query("INSERT INTO tbl_testimonial (testimonial_name,testimonial_content,testimonial_status) VALUES('$nama','$content','$status')");
		return $hasil;
	}

	function update_testimonial($kode,$nama,$content,$status,$photo)
	{
		$hasil = $this->db->query("UPDATE tbl_testimonial SET testimonial_name='$nama', testimonial_content='$content', testimonial_status='$status', testimonial_image='$photo' WHERE testimonial_id='$kode'");
		return $hasil;
	}

	function update_testimonial_no_img($kode,$nama,$content,$status)
	{
		$hasil = $this->db->query("UPDATE tbl_testimonial SET testimonial_name='$nama', testimonial_content='$content', testimonial_status='$status' WHERE testimonial_id='$kode'");
		return $hasil;
	}

	function hapus_testimonial($kode)
	{
		$hasil = $this->db->query("DELETE FROM tbl_testimonial WHERE testimonial_id='$kode'");
		return $hasil;
	}
}