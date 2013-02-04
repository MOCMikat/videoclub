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
                      
    $this->load->view('admin/socios/index', $data);
  }

	function insertar(){
		$this->load->model('Socio');	
		if($this->input->post('insertar')){
			$res = $this->Socio->insertar($this->input->post());
			$this->load->view('admin/socios/insertar');
		} else {
			
			$this->load->view('admin/socios/insertar');			
		}
	}
    
  function modificar($id = null) {
    /* if ($id == null) {
      $this->session->set_flashdata('mensaje', 
             '<strong style="color: red">No se ha elegido cliente</strong>');
      redirect('clientes/index');
      return;
    } */
      if ($this->input->post('modificarsocio')) {
			  $this->Socio->modificar($this->input->post());
		  }
		  
		  if ($this->input->post('modificarprimera') &&
        $this->reglas_validacion() == TRUE) {
        $this->Socio->modificar($this->input->post());
        redirect('admin/socios/index');
        return;
      } else {  
  		  $this->load->view('admin/socios/modificar');
		  }
		  $id = $this->input->post('id');
      $socio = $this->Socio->obtener_socios('id = ?', array($id));
      $data = array('socio' => $socio[0]);
      $this->load->view('admin/socios/modificarprimera', $data);
  }
  
 	function baja($id){
		if ($this->input->post('baja')) {
			$this->Socio->baja($this->input->post('idsocio'));
		}
		$data['id'] = $id;
		$this->load->view('admin/socios/confirmar',$data);
  }
}
