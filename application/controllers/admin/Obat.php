<?php  

/**
 *
 */
class Obat extends CI_Controller
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
    $this->load->model("ObatModel");
    $this->load->library('form_validation');
    $this->load->library('session');

  }

  public function index()
  {
    $data["obat"] = $this->ObatModel->getAll();
    $this->load->view('admin/obat/list', $data);
  }

  public function add()
  {

    $obat = $this->ObatModel;
    $validation = $this->form_validation;
    $validation->set_rules($obat->rules());

    if($validation->run())
    {
      $obat->save();
      $this->session->set_flashdata('Success', 'Berhasil Input');
      redirect("admin/obat/");
    }

    $sql = "SELECT kd_obat FROM obat ORDER BY kd_obat DESC LIMIT 1";
    $data["obat"]  = $this->db->query($sql)->row();

    $this->load->view("admin/obat/new_form", $data);
  }

  public function edit($kd=null)
  {
    if (!isset($kd)) redirect('admin/obat/');

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
      $this->session->set_flashdata('Success', 'Berhasil Hapus');
      redirect(site_url('admin/obat'));
    }

  }
}


 ?>
