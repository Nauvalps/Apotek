<?php
/**
 *
 */

class TransObatModel extends CI_Model
{

      private $_table = "obat_detail";

      public $kd_obat;
      public $kd_nota;
      public $qty;
      public $sub_total;

  public function rules()
  {
    return [
      ['field' => 'kd_nota',
      'label' => 'Kode Nota',
      'rules' => 'required'],

      ['field' => 'kd_obat',
      'label' => 'Obat',
      'rules' => 'required'],

      ['field' => 'qty',
      'label' => 'Jumlah',
      'rules' => 'required'],

      ['field' => 'sub_total',
      'label' => 'Sub Total',
      'rules' => 'required'],
    ];
  }
  public function save()
  {

    // $this->load->model("ObatModel");
    $post = $this->input->post('data_table');
    for ($i=0; $i < count($post); $i++) {
      // code...
      $data[] = array (
        'kd_nota' => $post[$i]['kd_nota'],
        'kd_obat' => $post[$i]['kd_obat'],
        'qty' => $post[$i]['qty'],
        'sub_total' => $post[$i]['sub_total'],
      );
      
    // $this->ObatModel->minusStock($post[$i]['kd_nota'], $post[$i]['qty']);
    }
    //kek nya table nya masih ngebaca primary hm
    // echo print_r($data);m bntr gua ke toilet 
    //entah kenapa gak bisa insert batch lu update xamppnya wkwkwk corrupt gatau itu corrupt atau apa gua gak ngerti kenapa in use coba bikin baru? liat dari sql gua aja
    $this->db->insert_batch("obat_detail", $data);
  }


}

 ?>
