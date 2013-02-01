<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socio extends CI_Model {

 
	function insertar($datos){

			extract($datos);
			$this->db->query("insert into socios(usuario, password, email, nombre, telefono) 
																		values(?,?,?,?,?)", array($usuario, $password, $email, $nombre, $telefono));

			return $this->db->affected_rows();
	} 

  function modificar($datos){
    extract($datos);
    $npassword = ($password != '') ? 'password = ?,' : '';
    $password = ($password != '') ? md5($password) : '';
    
    /*var_dump($password);
    var_dump($npassword);*/
    
    $this->db->query("update socios
                      set usuario = ?,
                          $npassword
                          email = ?,
                          nombre = ?,
                          telefono = ?
                      where id = ?", array( $usuario, 
                                            $password, 
                                            $email, 
                                            $nombre, 
                                            $telefono,
                                            $id));

			return $this->db->affected_rows();
	}
	
	function baja($id){
		$this->db->query ("delete from socios
														 where id = $id");
		redirect('socios/index');
	}  



  function obtener_socios($cond = '', $valores = array()) {
    $where = ($cond != '') ? "where $cond" : '';
    $res = $this->db->query("select *
                             from socios
                             $where", $valores);
                      
    return $res->result();
  }


}
