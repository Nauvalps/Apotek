<?php
  /**
   *
   */
  class Home extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();

      if ($this->session->userdata('akses') == '1') {
        redirect(base_url('admin'));
      }
      elseif($this->session->userdata('akses')!='2'){
        redirect(base_url());
      }
    }

    public function index()
    {
      $this->load->view("kasir/overview");
    }

      public function logout()
      {
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
  }



 ?>
