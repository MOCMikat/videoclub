<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socios extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('Template');
    $this->load->model('Socio');
 		$this->load->library('Template');
  }
  
  function index() {
    $columnas = array('id'        => 'ID',
                      'usuario'   => 'Usuario',
                      'email'     => 'Email',
                      'nombre'    => 'Nombre',
                      'telefono'  => 'Teléfono');
                      
    $descripcion = 'usuario';
    $res = $this->Socio->obtener_socios();
    
    if ($this->input->post('buscar')) {
      $columna = $this->input->post('columna');
      $criterio = $this->input->post('criterio');
      $this->session->set_userdata('columna', $columna);
      $this->session->set_userdata('criterio', $criterio);
    } else if ($this->session->userdata('columna')) {
      $columna = $this->session->userdata('columna');
      $criterio = $this->session->userdata('criterio');
    } else {
      $columna = array_keys($columnas);
      $columna = $columna[0];
      $criterio = '';
    }
    
    $cond = "upper(" . $this->db->escape_str($columna) . ") like ".
            "upper('%" . $this->db->escape_str($criterio) . "%')";;
    
    if ($columna != '' && $criterio != '') {
      $res = $this->Socio->obtener_socios($cond); 
    }
       
    $data = array('columnas'    => $columnas,
                  'res'         => $res,
                  'descripcion' => $descripcion,
                  'criterio'    => $criterio,
                  'columna'     => $columna);
                      
    $this->template->load('template', 'admin/socios/index', $data);
  }

	function insertar(){
		$this->load->model('Socio');	
		if($this->input->post('insertar') && $this->reglas_insertar() == TRUE){
				$res = $this->Socio->insertar($this->input->post());
		 	 	$this->template->load('template', 'admin/socios/insertar');
		 	 	$this->session->set_flashdata('mensaje',
            'El socio se ha modificado correctamente');
        redirect('admin/socios/index');
        return;
		} else {
			 	$this->template->load('template', 'admin/socios/insertar');			
		}
	}
    
  function modificar($id = null) {
    $this->load->helper('url');
    $this->load->model('Socio');

    if ($this->input->post('modificar')) {
      $id = $this->input->post('id');
      $usuario = $this->input->post('usuario');
      
      if ($this->reglas_modificar($id, $usuario) == TRUE) {
        $this->Socio->modificar($this->input->post());
        $this->session->set_flashdata('mensaje',
            'El socio se ha modificado correctamente');
        redirect('admin/socios/index');
        return;
      }
    } else {
      if ($id == null) {
        redirect('admin/socios/index');
        return;
      }
    }
    
    $socio = $this->Socio->obtener_socios('id = ?', array($id));
    $data['socio'] = $socio[0];
    $this->template->load('template', 'admin/socios/modificar', $data);
  }
  
 	function baja(){
		if ($this->input->post('baja')) {
			$this->Socio->darbaja($this->input->post('id'));
		} else {
			$data['id'] = $this->input->post('id');
 			$this->load->view('admin/socios/confirmar', $data);
		}
  }
  
  private function reglas_comunes() {
    $comunes = array(
      array(
        'field' => 'password',
        'label' => 'Contraseña',
        'rules' => 'trim|required|min_length[6]|' .
                   'matches[password_confirm]'
      ),
      array(
        'field' => 'password_confirm',
        'label' => 'Confirmar contraseña',
        'rules' => 'trim|required'
      ),
      array(
        'field' => 'email',
        'label' => 'email',
        'rules' => 'trim|required'
      ),
      array(
        'field' => 'nombre',
        'label' => 'Nombre',
        'rules' => 'trim|required'
      ),
     
      array(
        'field' => 'telefono',
        'label' => 'telefono',
        'rules' => 'trim'
      )
    );
    
    return $comunes;
  }
  
  private function reglas_insertar() {
    $reglas = array(  
      array(
        'field' => 'usuario',
        'label' => 'Usuario',
        'rules' => "trim|required|is_unique[socios.usuario]"
      )
    );
    
    $comunes = $this->reglas_comunes();
    
    $reglas = array_merge($reglas, $comunes);
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules($reglas);
    return $this->form_validation->run();
  }
  
  // REGLAS MODIFICAR
  
  private function reglas_modificar($id = null, $usuario = null) {
    
    $socio = $this->Socio->obtener_socios('usuario = ?', array($usuario));
    if (!empty($socio)) {
      $id_bd = $socio[0]['id'];
      
      $unique = ($id_bd != $id) ? '|is_unique[socios.usuario]' : '';
    } else {
      $unique = '|is_unique[socios.usuario]';
    }
    
    $reglas = array(  
      array(
        'field' => 'usuario',
        'label' => 'Usuario',
        'rules' => "trim|required$unique"
      )
    );
    
    $comunes = $this->reglas_comunes();
    
    $reglas = array_merge($reglas, $comunes);
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules($reglas);
    return $this->form_validation->run();
  }
}
