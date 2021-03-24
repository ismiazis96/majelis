<?php
class Tag extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_tag');
		$this->load->helper('text');
	}

	function index(){
		$x['title'] = 'Majelis | Tag';
		$x['data'] = $this->m_tag->get_all_tag();
		$this->load->view('admin/v_tag',$x);
		$this->load->helper('text');
	}

	function save(){
		$tag = strip_tags(htmlspecialchars($this->input->post('tag',TRUE),ENT_QUOTES));
		$this->m_tag->add_new_row($tag);
		$this->session->set_flashdata('msg','success');
		redirect('admin/tag');
	}

	function edit(){
		$id		 = $this->input->post('kode',TRUE);
		$tag 	 = strip_tags(htmlspecialchars($this->input->post('tag2',TRUE),ENT_QUOTES));
		$this->m_tag->edit_row($id,$tag);
		$this->session->set_flashdata('msg','info');
		redirect('admin/tag');
	}

	function delete(){
		$id = $this->input->post('kode',TRUE);
		$this->m_tag->delete_row($id);
		$this->session->set_flashdata('msg','success-delete');
		redirect('admin/tag');
	}
}