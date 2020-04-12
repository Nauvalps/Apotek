<?php

/**
 *
 */
class Obat extends CI_Controller
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

    $this->load->model("ObatModel");
    $this->load->model("TransaksiModel");
    $this->load->model("TransObatModel");
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('tgl_indo');

  }

  public function index()
  {
    $data["trans"] = $this->TransaksiModel->getAll();
    $this->load->view('kasir/trans/list', $data);
  }

  public function view($kd=null)
  {
    if(!isset($kd)) redirect('kasir/obat');
    $data["trans"] = $this->TransaksiModel->getByKd($kd);
    $data["listTrans"] = $this->TransaksiModel->getListTrans($kd);
    $this->load->view('kasir/trans/view', $data);

  }

  public function save()
  {
    // echo  print_r($this->input->post('data_table'));
    // nah tadi kenapa gk langsung ke redirect lu ubah ubah tampilannya ya kaga sweet a
    try {
     $this->TransObatModel->save();
      $this->TransaksiModel->trans();
      $status = "Success";

    } catch (Exception $e) {

      $status = "Failed";
    }

// oalah
    $this->output->set_content_type('application/json');
    echo json_encode(array('status' => $status));
    return $status;
  }

  public function add()
  {
    $obat = $this->ObatModel;

    $sql = "SELECT kd_nota FROM transaksi ORDER BY kd_nota DESC LIMIT 1";

    $data["obat"] = $obat->getAllWithStock();
    $data["trans"]  = $this->db->query($sql)->row();
    $this->load->view("kasir/trans/new_form", $data);
  }

  public function getObat()
  {
      $obat = $this->ObatModel;
      $data = $obat->getByKd($this->input->post('kd_obat'));

  }

  public function edit($kd=null)
  {
    if (!isset($kd)) redirect('kasir/obat/');

    $obat = $this->ObatModel;
    $validation = $this->form_validation;
    $validation->set_rules($obat->rules());

    if($validation->run())
    {
      $obat->update();
      $this->session->set_flashdata('Success', 'Berhasil Update');
      redirect("admin/obat/");
    }

    $data["obat"] = $obat->getByKd($kd);
    if(!$data["obat"]) show_404();

    $this->load->view("admin/obat/edit_form", $data);

  }

  public function delete($kd=null)
  {
    if(!isset($kd)) show_404();

    if($this->ObatModel->delete($kd)){
      redirect(site_url('kasir/obat'));
    }

  }
}


 ?>
