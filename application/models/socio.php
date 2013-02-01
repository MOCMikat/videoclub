<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socio extends CI_Model {
	
	function baja($baja){
		$this->db->query ("delete from socios
														 where id = $baja");
		redirect('socios/index');
	}  

}
