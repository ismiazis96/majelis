<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengumuman');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['title'] = 'Majelis | Pengumuman';
		$x['data']=$this->m_pengumuman->get_all_pengumuman();
		$this->load->view('admin/v_pengumuman',$x);
	}

	function simpan_pengumuman(){
		$judul=strip_tags($this->input->post('xjudul'));
		$deskripsi=$this->input->post('xdeskripsi');
		$kode=$this->session->userdata('idadmin');
		$user= $this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
		$user_nama=$p['pengguna_nama'];
		$this->m_pengumuman->simpan_pengumuman($judul,$deskripsi,$user_id,$user_nama);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/pengumuman');
	}

	function update_pengumuman(){
		$id=strip_tags($this->input->post('kode'));
		$judul=strip_tags($this->input->post('xjudul'));
		$deskripsi=$this->input->post('xdeskripsi');
		$kode=$this->session->userdata('idadmin');
		$user= $this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
		$user_nama=$p['pengguna_nama'];
		$this->m_pengumuman->update_pengumuman($id,$judul,$deskripsi,$user_nama,$user_id);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/pengumuman');
	}
	function hapus_pengumuman(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/pengumuman');
	}

}