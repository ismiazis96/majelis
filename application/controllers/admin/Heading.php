<?php

class Heading extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        }
		$this->load->model('m_heading');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		if($this->session->userdata('akses') != '1' ){
			echo "anda bukan admin";
			redirect('admin/dashboard');
		}
		$x['title'] = 'Majelis | Heading';
		$x['data'] = $this->m_heading->get_heading_data();
		
		$this->load->view('admin/v_heading',$x);
	}

	function simpan_heading(){
				$config['upload_path'] = './theme/images/banner/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['photo']['name']))
	            {
	                if ($this->upload->do_upload('photo'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./theme/images/banner/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['max_size']     = '1000';
	                        // $config['quality']= '60%';
	                        $config['width']= 2000;
	                        $config['height']= 783;
	                        $config['new_image']= './theme/images/banner/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$judul=strip_tags($this->input->post('judul'));
							$desc=strip_tags($this->input->post('desc'));
							
							$this->m_heading->simpan_heading($judul,$desc,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/heading');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/heading');
	                }
	                 
	            }else{
	            	$judul=strip_tags($this->input->post('judul'));
					$desc=strip_tags($this->input->post('desc'));

					$this->m_heding->simpan_heading_tanpa_img($judul,$desc);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/guru');
				}
				
	}
	
	function update_heading(){
				
	            $config['upload_path'] = './theme/images/banner/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['photo']['name']))
	            {
	                if ($this->upload->do_upload('photo'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./theme/images/banner/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './theme/images/banner/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$judul=strip_tags($this->input->post('judul'));
							$desc=strip_tags($this->input->post('desc'));

							$this->m_heading->update_heading($kode,$judul,$desc,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/heading');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/heading');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$judul=strip_tags($this->input->post('judul'));
							$desc=strip_tags($this->input->post('desc'));
							$this->m_heading->update_heading_tanpa_img($kode,$judul,$desc);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/heading');
	            } 

	}

	function hapus_heading(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_heading->hapus_heading($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/heading');
	}

}