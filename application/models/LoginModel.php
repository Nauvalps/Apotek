<?php
/**
 *
 */
class LoginModel extends CI_Model
{
  function auth_admin($id, $pass){

    $password = md5($pass);
    $qry = $this->db->get_where('karyawan', array('id_kry' => $id, 'pass' => $password));
    return $qry;
  }
}


 ?>
