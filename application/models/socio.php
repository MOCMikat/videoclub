<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socio extends CI_Model {
 
	function insertar($datos){

			extract($datos);
			$this->db->query("insert into socios(usuario, password, email, nombre, telefono) 
																		values(?,?,?,?,?)", array($usuario, $password, $email, $nombre, $telefono));

			return $this->db->affected_rows();
	} 
}
