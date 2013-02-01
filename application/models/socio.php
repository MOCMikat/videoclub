<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socio extends CI_Model {

  function obtener_socios($cond = '', $valores = array()) {
    $where = ($cond != '') ? "where $cond" : '';
    $res = $this->db->query("select *
                             from socios
                             $where", $valores);
                      
    return $res->result();
  }
}
