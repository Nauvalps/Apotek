<?php

/**
 *
 */
class TransaksiModel extends CI_Model
{
  private $_table = "transaksi";

  public $kd_nota;
  public $type_trans;
  public $tgl;
  public $id_ksr;
  public $ttl;
  public $byr;
  public $kmbl;
  public $stst;

  // Validasi Form agar tidak kosong


  // Select semua data dari table
  public function getAll()
  {
    return $this->db->get_where($this->_table, array('type_trans' => '1', 'stst' => '1'))->result();
  }

  public function getAllLayanan()
  {
    return $this->db->get_where($this->_table, array('type_trans' => '2', 'stst' => '1'))->result();
  }
  //
  //
  // // Select Data bedasarkan kd_lyn yang dikirim
  // public function getByKd($kd)
  // {
  //
  //   $data = $this->db->get_where("obat", ["kd_obat" => $kd])->row();
  //
  //   foreach ($data as $d) {
  //     $output = $d['harga_obat'];
  //
  //   }
  //   return $output;
  // }

  public function trans(){
    $post = $this->input->post();
    $this->kd_nota = $post["kd_nota"];
    $this->type_trans = "1";
    $this->id_ksr = $post["id_ksr"];
    $this->tgl = date("Y-m-d H:i:s");
    $this->ttl =  $post["ttl"];
    $this->byr = $post["byr"];
    $this->kmbl = $post["kmbl"];
    $this->stst = true;
    $this->db->insert($this->_table, $this);
    return $this;

  }

  public function transLayanan(){
    // date_default_timezone_set('Asia/Jakarta');
    $post = $this->input->post();
    $this->kd_nota = $post["kd_nota"];
    $this->type_trans = "2";
    $this->id_ksr = $post["id_ksr"];
    $this->tgl = date("Y-m-d H:i:s");
    $this->ttl =  $post["ttl"];
    $this->byr = $post["byr"];
    $this->kmbl = $post["kmbl"];
    $this->stst = true;
    $this->db->insert($this->_table, $this);
    return $this;

  }

  public function getListTrans($kd){
    $this->db->select('*');
    $this->db->from('obat_detail');
    $this->db->join('obat', 'obat.kd_obat = obat_detail.kd_obat');
    $this->db->where(["kd_nota" => $kd]);
    return $this->db->get()->result();
  }
  public function getListTransLayanan($kd){
    $this->db->select('*');
    $this->db->from('layanan_detail');
    $this->db->join('layanan', 'layanan.kd_layanan = layanan_detail.kd_layanan');
    $this->db->join('pasien', 'pasien.pasien_id = layanan_detail.pasien_id');
    $this->db->where(["kd_nota" => $kd]);
    return $this->db->get()->result();
  }
  // Insert ke table
  public function getByKd($kd)
  {
    $this->db->select('karyawan.nama, transaksi.kd_nota, transaksi.tgl');
    $this->db->from($this->_table);
    $this->db->join('karyawan', 'karyawan.id_kry = transaksi.id_ksr');
    $this->db->where(["kd_nota" => $kd]);
    return $this->db->get()->row();
  }
  public function getByKdLayanan($kd)
  {
    $this->db->select('karyawan.nama, transaksi.kd_nota, transaksi.tgl');
    $this->db->from($this->_table);
    $this->db->join('karyawan', 'karyawan.id_kry = transaksi.id_ksr');
    $this->db->where(["kd_nota" => $kd]);
    return $this->db->get()->row();
  }
  public function save()
  {

    $post = $this->input->post('data_table');
    $this->db->insert_batch("detail_obat", $post);
  }

}

 ?>
