<?php  

/**
 *
 */
class Karyawan extends CI_Controller
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
    $this->load->model("KaryawanModel");
    $this->load->library('form_validation');
    $this->load->library('session');

  }

  public function index()
  {
    $data["kry"] = $this->KaryawanModel->getAll();
    $this->load->view('admin/karyawan/list', $data);
  }

  public function add()
  {

    $kry = $this->KaryawanModel;
    $validation = $this->form_validation;
    $validation->set_rules($kry->rules());

    if($validation->run())
    {
      $kry->save();
      $this->session->set_flashdata('Success', 'Berhasil Input');
      redirect("admin/karyawan/");
    }

    $sql = "SELECT id_kry FROM karyawan ORDER BY id_kry DESC LIMIT 1";
    $data["kry"]  = $this->db->query($sql)->row();

    $this->load->view("admin/karyawan/new_form", $data);
  }

  public function edit($kd=null)
  {
    if (!isset($kd)) redirect('admin/karyawan/');

    $kry = $this->KaryawanModel;
    $validation = $this->form_validation;
    $validation->set_rules($kry->rules());

    if($validation->run())
    {
      $kry->update();
      $this->session->set_flashdata('Success', 'Berhasil Update');
      redirect("admin/karyawan/");
    }

    $data["kry"] = $kry->getByKd($kd);
    if(!$data["kry"]) show_404();

    $this->load->view("admin/karyawan/edit_form", $data);

  }

  public function delete($kd=null)
  {
    if(!isset($kd)) show_404();

    if($this->KaryawanModel->delete($kd)){
      redirect(site_url('admin/karyawan'));
    }

  }
}


 ?>
