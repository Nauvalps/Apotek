<?php

/**
 *
 */
class Layanan extends CI_Controller
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

    $this->load->model("PasienModel");
    $this->load->model("LayananModel");
    $this->load->model("TransaksiModel");
    $this->load->model("TransLayananModel");
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('tgl_indo');

  }

  public function index()
  {
    $data["trans"] = $this->TransaksiModel->getAllLayanan();
    $this->load->view('kasir/transLayanan/list', $data);
  }

  public function view($kd=null)
  {
    if(!isset($kd)) redirect('kasir/layanan');
    $data["trans"] = $this->TransaksiModel->getByKdLayanan($kd);
    $data["listTrans"] = $this->TransaksiModel->getListTransLayanan($kd);
    $this->load->view('kasir/transLayanan/view', $data);

  }

  public function save()
  {

    try {
      $this->TransLayananModel->save();
      $this->TransaksiModel->transLayanan();
      
      $status = "Success";

    } catch (Exception $e) {

      $status = "Failed";
    }


    $this->output->set_content_type('application/json');
    echo json_encode(array('status' => $status));
    return $status;
  }

  public function add()
  {
    $layanan = $this->LayananModel;
    $pasien = $this->PasienModel;

    $sql = "SELECT kd_nota FROM transaksi ORDER BY kd_nota DESC LIMIT 1";

    $data["layanan"] = $layanan->getAll();
    $data["pasien"] = $pasien->getAll();
    $data["trans"]  = $this->db->query($sql)->row();
    $this->load->view("kasir/transLayanan/new_form", $data);
  }

  public function getLayanan()
  {
      $layanan = $this->LayananModel;
      $data = $layanan->getByKd($this->input->post('kd_layanan'));

  }

  public function edit($kd=null)
  {
    if (!isset($kd)) redirect('kasir/layanan/');

    $layanan = $this->LayananModel;
    $validation = $this->form_validation;
    $validation->set_rules($layanan->rules());

    if($validation->run())
    {
      $layanan->update();
      $this->session->set_flashdata('Success', 'Berhasil Update');
      redirect("admin/layanan/");
    }

    $data["layanan"] = $layanan->getByKd($kd);
    if(!$data["layanan"]) show_404();

    $this->load->view("admin/layanan/edit_form", $data);

  }

  public function delete($kd=null)
  {
    if(!isset($kd)) show_404();

    if($this->LayananModel->delete($kd)){
      redirect(site_url('kasir/layanan'));
    }

  }
}


 ?>
