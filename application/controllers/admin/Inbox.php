<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kontak');
	}

	function index(){
		if($this->session->userdata('akses') == '3' ){
			echo "anda bukan admin";
			redirect('admin/dashboard');
		}
		$x['title'] = 'Majelis | Inbox';
		$this->m_kontak->update_status_kontak();
		$x['data']=$this->m_kontak->get_all_inbox();
		$this->load->view('admin/v_inbox',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/inbox');
	}
}