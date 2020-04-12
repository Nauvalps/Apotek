<?php

/**
 *
 */
class KaryawanModel extends CI_Model
{
  private $_table = "karyawan";

  public $id_kry;
  public $pass;
  public $nama;
  public $alamat;
  public $no_hp;
  public $level;

  // Validasi Form agar tidak kosong
  public function rules()
  {
    return [
      ['field' => 'id_kry',
      'label' => 'ID Karyawan',
      'rules' => 'required'],

      ['field' => 'pass',
      'label' => 'Password',
      'rules' => 'required'],

      ['field' => 'nama',
      'label' => 'Nama',
      'rules' => 'required'],

      ['field' => 'alamat',
      'label' => 'Alamat',
      'rules' => 'required'],

      ['field' => 'no_hp',
      'label' => 'No HP',
      'rules' => 'required'],

      ['field' => 'level',
      'label' => 'Level',
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
    return $this->db->get_where($this->_table, ["id_kry" => $id])->row();
  }

  // Insert ke table
  public function save()
  {

    $post = $this->input->post();
    $this->id_kry = $post["id_kry"];
    $this->pass = md5($post["pass"]);
    $this->nama = $post["nama"];
    $this->alamat = $post["alamat"];
    $this->no_hp = $post["no_hp"];
    $this->level = $post["level"];
    $this->db->insert($this->_table, $this);
  }

  // Query Update

  public function update()
  {
    $post = $this->input->post();
    $this->id_kry = $post["id_kry"];
    $this->pass = md5($post["pass"]);
    $this->nama = $post["nama"];
    $this->alamat = $post["alamat"];
    $this->no_hp = $post["no_hp"];
    $this->level = $post["level"];
    $this->db->update($this->_table, $this, array('id_kry' => $post['id_kry']));
  }

  public function delete($id)
  {  
    return $this->db->delete($this->_table, array("id_kry" => $id));
  }

}

 ?>
