<?php

/**
 *
 */
class ObatModel extends CI_Model
{
  private $_table = "obat";

  public $kd_obat;
  public $nama_obat;
  public $jenis_obat;
  public $gambar = "obat.jpg";
  public $harga_obat;
  public $Stock;

  // Validasi Form agar tidak kosong
  public function rules()
  {
    return [
      ['field' => 'kd_obat',
      'label' => 'Kode Obat',
      'rules' => 'required'],

      ['field' => 'nama_obat',
      'label' => 'Nama Obat',
      'rules' => 'required'],

      ['field' => 'jenis_obat',
      'label' => 'Jenis Obat',
      'rules' => 'required'],

      ['field' => 'harga_obat',
      'label' => 'Harga Obat',
      'rules' => 'required'],

      ['field' => 'Stock',
      'label' => 'Stock',
      'rules' => 'required']

    ];
  }

  // Select semua data da';ri table
  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  // Select Data bedasarkan kd_obat yang dikirim
  public function getByKd($kd)
  {
    return $this->db->get_where($this->_table, ["kd_obat" => $kd])->row();
  }

  // Insert ke table
  public function save()
  {

    $post = $this->input->post();
    $this->kd_obat = $post["kd_obat"];
    $this->nama_obat = $post["nama_obat"];
    $this->jenis_obat = $post["jenis_obat"];
    $this->gambar = $this->_uploadImage();
    $this->harga_obat = $post["harga_obat"];
    $this->Stock = $post["Stock"];
    $this->db->insert($this->_table, $this);
  }

  public function getAllWithStock(){
    $this->db->select('*');
    $this->db->from('obat');
    $this->db->where('Stock > 0');
    return $this->db->get()->result();

  }
   // Query Update
  public function update()
  {
    $post = $this->input->post();
    $this->kd_obat = $post["kd_obat"];
    $this->nama_obat = $post["nama_obat"];
    $this->jenis_obat = $post["jenis_obat"];
    if (!empty($_FILES["gambar"]["name"])) {
      $this->gambar = $this->_uploadImage();
    }else {
      $this->gambar = $post["gambar_lama"];
    }
    $this->harga_obat = $post["harga_obat"];
    $this->Stock = $post["Stock"];
    $this->db->update($this->_table, $this, array('kd_obat' => $post['kd_obat']));
  }

  public function minusStock($kd_obat, $qty){
    $this->getByKd($kd_obat);
    $this->Stock = $this->Stock - $qty;
    $this->db->update($this->_table, $this, array('kd_obat' => $kd_obat));
  }

  public function delete($kd)
  {  
    $this->_deleteImage($kd);
    return $this->db->delete($this->_table, array("kd_obat" => $kd));
  }

  private function _uploadImage() {
    $config['upload_path'] = './upload/obat/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['file_name'] = $this->kd_obat;
    $config['overwrite'] = true;
    $config['max_size'] = 1024; // 1mb

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
      return $this->upload->data("file_name");
    }
    return "obat.jpg";
  }

  private function _deleteImage($kd) {
      $obat = $this->getByKd($kd);
      if ($obat->gambar != "obat.jpg") {
        $filename = explode(".", $obat->gambar)[0];
        return array_map('unlink', glob(FCPATH."upload/obat/$filename.*"));
      }
  }

}

 ?>
