<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_gantipassword');
		// $this->load->model('M_gantipassword','changepass_model');
		$this->load->helper('text');
	}

	function index(){
		$this->load->view('admin/v_change_pass');
	}

	function change(){
		$user_id = $this->session->userdata('idadmin');
		if(!empty($user_id)){
			$old_password = htmlspecialchars($this->input->post('old_password',TRUE),ENT_QUOTES);
			$new_password = htmlspecialchars($this->input->post('new_password',TRUE),ENT_QUOTES);
			$conf_password = htmlspecialchars($this->input->post('conf_password',TRUE),ENT_QUOTES);
			$old_pass = md5($old_password);
			$new_pass = md5($new_password);
			$checking_old_password = $this->M_gantipassword->checking_old_password($user_id,$old_pass);
			if($checking_old_password->num_rows() > 0){
				if($new_password == $conf_password){
					$this->M_gantipassword->change_password($user_id,$new_pass);
					$this->session->set_flashdata('msg','success');
					redirect('admin/ganti_password');
				}else{
					$this->session->set_flashdata('msg','error-notmatch');
					redirect('admin/ganti_password');
				}
			}else{
				$this->session->set_flashdata('msg','error-notfound');
				redirect('admin/ganti_password');
			}
		}else{
			$this->session->set_flashdata('msg','error');
			redirect('admin/ganti_password');
		}
	}
}