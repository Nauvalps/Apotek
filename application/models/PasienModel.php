<?php

/**
 *
 */
class PasienModel extends CI_Model
{
  private $_table = "pasien";

  public $pasien_id;
  public $nama_pasien;
  public $tanggal_lahir;
  public $keluhan;
  public $no_hp;
  public $alamat;

  // Validasi Form agar tidak kosong
  public function rules()
  {
    return [
      ['field' => 'id_pasien',
      'label' => 'ID Pasien',
      'rules' => 'required'],

      ['field' => 'nama_pasien',
      'label' => 'Nama Pasien',
      'rules' => 'required'],

      ['field' => 'tanggal_lahir',
      'label' => 'Tanggal Lahir',
      'rules' => 'required'],

      ['field' => 'keluhan',
      'label' => 'Keluhan',
      'rules' => 'required'],

      ['field' => 'no_hp',
      'label' => 'No HP',
      'rules' => 'required'],

      ['field' => 'alamat',
      'label' => 'Alamat',
      'rules' => 'required']

    ];
  }

  // Select semua data da';ri table
  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  // Select Data bedasarkan kd_Karyawan yang dikirim
  public function getByKd($id)
  {
    return $this->db->get_where($this->_table, ["pasien_id" => $id])->row();
  }

  // Insert ke table
  public function save()
  {

    $post = $this->input->post();
    $this->pasien_id = $post["id_pasien"];
    $this->nama_pasien = $post["nama_pasien"];
    $this->tanggal_lahir = $post["tanggal_lahir"];
    $this->keluhan = $post["keluhan"];
    $this->no_hp = $post["no_hp"];
    $this->alamat = $post["alamat"];
    $this->db->insert($this->_table, $this);
  }

  // Query Update

  public function update()
  {
    $post = $this->input->post();
    $this->pasien_id = $post["id_pasien"];
    $this->nama_pasien = $post["nama_pasien"];
    $this->tanggal_lahir = $post["tanggal_lahir"];
    $this->keluhan = $post["keluhan"];
    $this->no_hp = $post["no_hp"];
    $this->alamat = $post["alamat"];
    $this->db->update($this->_table, $this, array('pasien_id' => $post['id_pasien']));
  }

  public function delete($id)
  {  
    return $this->db->delete($this->_table, array("pasien_id" => $id));
  }

}

 ?>
