<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
    }

    function index(){
        $this->load->view('login');
    }

    function auth(){
      
      $id = $this->input->post('id_kry');
      $pass = $this->input->post('pass');
      $cekId=$this->LoginModel->auth_admin($id,$pass);

      if($cekId->num_rows()>0){
        $data = $cekId->row_array();

        $this->session->set_userdata('id', $data['id_kry']);
        $this->session->set_userdata('nama', $data['nama']);
        $this->session->set_userdata('alamat', $data['alamat']);
        // echo "isi data".$data['nama'];
        if($data['level'] == 1){
          $this->session->set_userdata('akses', '1');
          redirect(base_url('admin/'));
        }
        else{
          $this->session->set_userdata('akses', '2');
          redirect(base_url('kasir/'));
        }
      }else{
        $this->session->set_flashdata('Failed', 'ID atau Password Salah !');
        redirect(base_url('login'));
      }
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}
