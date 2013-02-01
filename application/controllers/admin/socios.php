<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socios extends CI_Controller {
    
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
    
    function modificar($id = null) {
      /* if ($id == null) {
        $this->session->set_flashdata('mensaje', 
               '<strong style="color: red">No se ha elegido cliente</strong>');
        redirect('clientes/index');
        return;
      } */
        $socio = $this->Socio->obtener_socios('id = ?', array($id));
        $data = array('socio' => $socio);
        $this->load->view('socios/modificar', $data);
    }
    
   	function baja($id){
  		if ($baja) {
  			$this->Socio->baja($baja);
  		}
  		$this->load->view->('socios/confirmar',$id);
	  }

}
