<?php

class About extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        }
		$this->load->model('m_about');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$x['title'] = 'Majelis | About';
		$data = $this->m_about->get_about_data()->row();
		$x['about_id'] = $data->about_id;
		$x['about_img'] = $data->about_image;
		$x['about_desc'] = $data->about_description;
		$this->load->view('admin/v_about',$x);
	}

	function update(){
		$about_id = htmlspecialchars($this->input->post('about_id',TRUE),ENT_QUOTES);
		$description = $this->input->post('description',TRUE);
		
		$config['upload_path'] = './assets/images/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['encrypt_name'] = FALSE;

	    $this->upload->initialize($config);
	    if(!empty($_FILES['img_about']['name'])){
	    	if ($this->upload->do_upload('img_about')){
	            $img_about = $this->upload->data();
	            $image=$img_about['file_name'];
	        }
	        $this->m_about->update_information_about($about_id,$description,$image);
	        $this->session->set_flashdata('msg','success');
	        redirect('admin/about');

	    }else{
	    	$this->m_about->update_information_about_noimg($about_id,$description);
	        $this->session->set_flashdata('msg','success');
	        redirect('admin/about');
	    }
	}

}