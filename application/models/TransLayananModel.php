<?php
/**
 *
 */

class TransLayananModel extends CI_Model
{

      private $_table = "layanan";

      public $kd_layanan;
      public $kd_nota;
      public $sub_total;
      public $id_pasien;

  public function rules()
  {
    return [
      ['field' => 'kd_nota',
      'label' => 'Kode Nota',
      'rules' => 'required'],

      ['field' => 'kd_layanan',
      'label' => 'Kode Layanan',
      'rules' => 'required'],

      ['field' => 'sub_total',
      'label' => 'Sub Total',
      'rules' => 'required'],

      ['field' => 'id_pasien',
      'label' => 'Id Pasien',
      'rules' => 'required'],
    ];
  }
  public function save()
  {

    $this->load->model("LayananModel");
    $post = $this->input->post('data_table');
    for ($i=0; $i < count($post); $i++) {
      // code...
      $data[] = array (
        'kd_nota' => $post[$i]['kd_nota'],
        'kd_layanan' => $post[$i]['kd_layanan'],
        'sub_total' => $post[$i]['sub_total'],
        'pasien_id' => $post[$i]['pasien_id'],
      );
      
    // $this->ObatModel->minusStock($post[$i]['kd_nota'], $post[$i]['qty']);
    }
// lu masang foreign key? sebelumnya sih iya tapi udah gua delete semua oalah
    $this->db->insert_batch("layanan_detail", $data);
  }


}

 ?>
