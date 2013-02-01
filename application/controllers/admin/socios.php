<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socios extends CI_Controller {

	  	

	function insertar(){
		$this->load->model('Socio');	
		if($this->input->post('insertar')){
			$res = $this->Socio->insertar($this->input->post());
			$this->load->view('admin/socios/insertar');
		} else {
			
			$this->load->view('admin/socios/insertar');			
		}
	}

}
