<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $x['title'] = 'Majelis | Log in';
        $this->load->view('admin/v_login',$x);
    }
    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        // var_dump($cadmin->result());
        if($cadmin->num_rows() > 0){
            $is_array_data = $cadmin->result_array();
            $data = [
                'masuk' => TRUE,
                'akses' => $is_array_data[0]['pengguna_level'],
                'user' => $u,
                'idadmin' => $is_array_data[0]['pengguna_id']
            ];
            $this->session->set_userdata($data);
            $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button> Anda berhasil Login</div>');
            redirect('admin/dashboard');
        }
        else {
          $url = base_url('admin/login');
          $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button> Username dan password ada yang salah</div>');
          redirect($url);
        }
       
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
