<?php

/**
 *
 */
class LayananModel extends CI_Model
{
  private $_table = "layanan";

  public $kd_layanan;
  public $nama_lyn;
  public $harga_layanan;

  // Validasi Form agar tidak kosong
  public function rules()
  {
    return [
      ['field' => 'kd_layanan',
      'label' => 'Kode Layanan',
      'rules' => 'required'],

      ['field' => 'nama_lyn',
      'label' => 'Nama Layanan',
      'rules' => 'required'],

      ['field' => 'harga_layanan',
      'label' => 'Harga Layanan',
      'rules' => 'required'],
    ];
  }

  // Select semua data dari table
  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  // Select Data bedasarkan kd_lyn yang dikirim
  public function getByKd($kd)
  {
    return $this->db->get_where($this->_table, ["kd_layanan" => $kd])->row();
  }

  // Insert ke table
  public function save()
  {

    $post = $this->input->post();
    $this->kd_layanan = $post["kd_layanan"];
    $this->nama_lyn = $post["nama_lyn"];
    $this->harga_layanan = $post["harga_layanan"];
    $this->db->insert($this->_table, $this);
  }

  // Query Update

  public function update()
  {
    $post = $this->input->post();
    $this->kd_layanan = $post["kd_layanan"];
    $this->nama_lyn = $post["nama_lyn"];
    $this->harga_layanan = $post["harga_layanan"];
    $this->db->update($this->_table, $this, array('kd_layanan' => $post['kd_layanan']));
  }

  public function delete($kd)
  {  
    return $this->db->delete($this->_table, array("kd_layanan" => $kd));
  }

}

 ?>
