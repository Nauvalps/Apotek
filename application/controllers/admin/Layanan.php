<?php  

/**
 *
 */
class Layanan extends CI_Controller
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
    $this->load->model("LayananModel");
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  public function index()
  {
    $data["lyn"] = $this->LayananModel->getAll();
    $this->load->view('admin/layanan/list', $data);
  }

  public function add()
  {

    $lyn = $this->LayananModel;
    $validation = $this->form_validation;
    $validation->set_rules($lyn->rules());

    if($validation->run())
    {
      $lyn->save();
      $this->session->set_flashdata('Success', 'Berhasil Input');
      redirect("admin/Layanan/");
    }

    $sql = "SELECT kd_layanan FROM layanan ORDER BY kd_layanan DESC LIMIT 1";
    $data["lyn"]  = $this->db->query($sql)->row();

    $this->load->view("admin/layanan/new_form", $data);
  }

  public function edit($kd=null)
  {
    if (!isset($kd)) redirect('admin/layanan/');

    $lyn = $this->LayananModel;
    $validation = $this->form_validation;
    $validation->set_rules($lyn->rules());

    if($validation->run())
    {
      $lyn->update();
      $this->session->set_flashdata('Success', 'Berhasil Update');
      redirect("admin/layanan/");
    }

    $data["lyn"] = $lyn->getByKd($kd);
    if(!$data["lyn"]) show_404();

    $this->load->view("admin/layanan/edit_form", $data);

  }

  public function delete($kd=null)
  {
    if(!isset($kd)) show_404();

    if($this->LayananModel->delete($kd)){
        $this->session->set_flashdata('Success', 'Berhasil Hapus');
      redirect(site_url('admin/layanan'));
    }

  }
}


 ?>
