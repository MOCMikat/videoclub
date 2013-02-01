<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socios extends CI_Controller {
<<<<<<< HEAD
	
	function baja($id){

		if ($baja) {
			$this->Socio->baja($baja);
		} else {
			$this->load->view->('admin/socios/confirmar',$id);
		}
	}  
	
=======

  function __construct() {
    parent::__construct();
    $this->load->model('Socio');
  }
  
  function index() {
    
    $columnas = array('usuario'   => 'Usuario',
                      'email'     => 'Email',
                      'nombre'    => 'Nombre',
                      'telefono'  => 'Telñefono');
                      
    $res = $this->Socio->obtener_socios();
                      
    $data = array('columnas'  => $columnas,
                  'res'    => $res);
                      
    $this->load->view('socios/index', $data);
  }
>>>>>>> 26e348c7121a5b20bfeb64d6452de0195901d53e
}
