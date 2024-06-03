<?php

class Testimonial extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		}
		$this->load->model('m_testimonial');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	public function index()
	{
		if ($this->session->userdata('akses') != '1') {
			echo "Anda tidak memiliki akses";
			redirect('admin/dashboard');
		}
		$x['title'] = 'Majelis | Testimonial';
		$x['data'] = $this->m_testimonial->get_testimonial();

		$this->load->view('admin/v_testimonial', $x);
	}

	function save()
	{
		$config['upload_path'] = './theme/images/testimonial/'; // Path folder
		$config['allowed_types'] = 'gif|jpg|png|bmp'; // extenstion yang di upload
		$config['encrypt_name'] = TRUE; // nama yang terupload nantinya ke db

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gbr = $this->upload->data();
				// compress gambar
				$config['image_library'] = 'gd2';
				$config['source_image'] = './theme/images/testimonial/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './theme/images/testimonial/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$photo = $gbr['file_name'];
				$nama = strip_tags($this->input->post('nama'));
				$content = strip_tags($this->input->post('content'));
				$status = strip_tags($this->input->post('status'));
				//var_dump($photo);die;

				$this->m_testimonial->simpan_testimonial($nama, $content, $status, $photo);
				$this->session->set_flashdata('msg', 'success');
				redirect('admin/testimonial');
			} else {
				$this->session->set_flashdata('msg', 'warning');
				redirect('admin/testimonial');
			}
		} else {
			$nama = strip_tags($this->input->post('nama'));
			$content = strip_tags($this->input->post('content'));
			$status = strip_tags($this->input->post('status'));

			$this->m_testimonial->simpan_testi_no_img($nama, $content, $status);
			$this->session->set_flashdata('msg', 'success');
			redirect('admin/testimonial');
		}
	}

	function update_testi()
	{
		$config['upload_path'] = './theme/images/testimonial/'; // Path folder
		$config['allowed_types'] = 'gif|jpg|png|bmp'; // extenstion yang di upload
		$config['encrypt_name'] = TRUE; // nama yang terupload nantinya ke db

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gbr = $this->upload->data();
				// compress gambar
				$config['image_library'] = 'gd2';
				$config['source_image'] = './theme/images/testimonial/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './theme/images/testimonial/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $this->input->post('gambar');
				$path = './theme/images/testimonial/' . $gambar;
				unlink($path);

				$photo = $gbr['file_name'];
				$kode  = $this->input->post('kode');
				$nama = strip_tags($this->input->post('nama'));
				$content = strip_tags($this->input->post('content'));
				$status = strip_tags($this->input->post('status'));

				$this->m_testimonial->update_testimonial($kode, $nama, $content, $status, $photo);
				$this->session->set_flashdata('msg', 'success');
				redirect('admin/testimonial');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/testimonial');
			}
		} else {
			$kode  = $this->input->post('kode');
			$nama = strip_tags($this->input->post('nama'));
			$content = strip_tags($this->input->post('content'));
			$status = strip_tags($this->input->post('status'));
			$this->m_testimonial->update_testimonial_no_img($kode, $nama, $content, $status);
			echo $this->session->userdata('msg', 'info');
			redirect('admin/testimonial');
		}
	}

	function hapus_testimonial()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './theme/images/testimonial/' . $gambar;
		unlink($path);
		$this->m_testimonial->hapus_testiID($kode);
		echo $this->session->userdata('msg', 'success-hapus');
		redirect('admin/testimonial');
	}
}
