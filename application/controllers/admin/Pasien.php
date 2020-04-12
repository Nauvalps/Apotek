<?php
  /**
   *
   */
  class Pasien extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();

      if ($this->session->userdata('akses') == '2') {
        redirect(base_url('kasir'));
      }
      elseif($this->session->userdata('akses')!='1'){
        redirect(base_url());
      }
        $this->load->model("PasienModel");
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('tgl_indo');
    }

    public function index() {
      $data['pasien'] = $this->PasienModel->getAll();
      $this->load->view('admin/pasien/list', $data);
    }

    public function add()
    {

        $pasien = $this->PasienModel;
        $validation = $this->form_validation;
        $validation->set_rules($pasien->rules());

        if($validation->run())
        {
        $pasien->save();
        $this->session->set_flashdata('Success', 'Berhasil Input');
        redirect("admin/pasien/");
        }

        $sql = "SELECT pasien_id FROM pasien ORDER BY pasien_id DESC LIMIT 1";
        $data["pasien"]  = $this->db->query($sql)->row();

        $this->load->view("admin/pasien/new_form", $data);
    }

    public function edit($kd=null)
    {
        if (!isset($kd)) redirect('admin/pasien/');

        $pasien = $this->PasienModel;
        $validation = $this->form_validation;
        $validation->set_rules($pasien->rules());

        if($validation->run())
        {
        $pasien->update();
        $this->session->set_flashdata('Success', 'Berhasil Update');
        redirect("admin/pasien/");
        }

        $data["pasien"] = $pasien->getByKd($kd);
        if(!$data["pasien"]) show_404();

        $this->load->view("admin/pasien/edit_form", $data);

    }

    public function delete($kd=null)
    {
        if(!isset($kd)) show_404();

        if($this->PasienModel->delete($kd)){
            $this->session->set_flashdata('Success', 'Berhasil Dihapus');
        redirect(site_url('admin/pasien'));
        }

    }

}



 ?>
