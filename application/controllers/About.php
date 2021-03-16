<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_testimonial');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['title'] = "About";
		$x['heading'] = "Tentang Kami";
		$about = $this->db->get('tbl_about', 1)->row();
		$x['testimonial']=$this->m_testimonial->get_testimonial();
		$x['about_img'] = $about->about_image;
		$x['about_desc'] = $about->about_description;
		$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
		$this->load->view('depan/v_about',$x);
	}

}
