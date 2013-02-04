<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socio extends CI_Model {

 
	function insertar($datos){

			extract($datos);
			$this->db->query("insert into socios(usuario, password, email, nombre, telefono) 
																		values(?,?,?,?,?)", array($usuario, $password, $email, $nombre, $telefono));

			return $this->db->affected_rows();
	} 


	
	function darbaja($id){
		$this->db->query ("delete from socios
														 where id = ?", array($id));
		redirect('admin/socios/index');
	}  



  function obtener_socios($cond = '', $valores = array()) {
    $where = ($cond != '') ? "where $cond" : '';
    $res = $this->db->query("select *
                             from socios
                             $where", $valores);
                      
    return $res->result();
  }


}
