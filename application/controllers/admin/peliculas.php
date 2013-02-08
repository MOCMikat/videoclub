<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peliculas extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('Template');
    $this->load->model('Pelicula');
  }
  
  function index($pag = 1) {
    $this->load->helper('url');
    $this->load->library('paginador');
  
    $columnas = array('titulo'      => 'Título',
                      'precio'      => 'Precio',
                      'genero'      => 'Genero',
                      'director'    => 'Director',
                      'duracion'    => 'Duración',
                      'descripcion' => 'Descripción',
                      'anio'        => 'Año',
                      'opciones'    => 'Opciones');

    if ($this->input->post('buscar')) {
      $columna = $this->input->post('columna');
      $criterio = $this->input->post('criterio');
      $this->session->set_userdata('columna', $columna);
      $this->session->set_userdata('criterio', $criterio);
    } else if ($this->session->userdata('columna')) {
      $columna = $this->session->userdata('columna');
      $criterio = $this->session->userdata('criterio');
    } else {
      $columna = 'titulo';
      $criterio = '';
    }

    list($res, $npags) = $this->paginador->paginar($this->Pelicula,
                                                   $columna,
                                                   $criterio,
                                                   $pag);
    
    $data = array('res'      => $res,
                  'columnas' => $columnas,
                  'columna'  => $columna,
                  'criterio' => $criterio,
                  'pag'      => $pag,
                  'npags'    => $npags);
    
    $data['mensaje'] = $this->session->flashdata('mensaje');
    $this->template->load('template', 'admin/peliculas/index', $data);
  }
  
  
  //Insertar y modificar

  function insertar() {
    $this->load->helper('url');
    $this->load->model('Pelicula');

    if ($this->input->post('insertar') &&
        $this->reglas_validacion() == TRUE) {
        $this->Pelicula->insertar($this->input->post());
      $this->session->set_flashdata('mensaje', 'La película se ha ' .
                                    'insertado correctamente');
      redirect('admin/peliculas/index');
      return;
    }

    $this->template->load('template', 'admin/peliculas/insertar');
  }
  
  function modificar() {
    $this->load->helper('url');
    $this->load->model('Pelicula');

    if ($this->input->post('modificar') &&
        $this->reglas_validacion() == TRUE) {
        $this->Pelicula->modificar($this->input->post());
      $this->session->set_flashdata('mensaje', 'La película se ha ' .
                                    'modificado correctamente');
      redirect('admin/peliculas/index');
      return;
    }

    $this->template->load('template', 'admin/peliculas/modificar');
  }
  
  private function reglas_validacion() {
    $reglas = array(
      array(
        'field' => 'titulo',
        'label' => 'Título',
        'rules' => 'trim|required|max_length[100]'
      ),
      array(
        'field' => 'genero',
        'label' => 'Género',
        'rules' => 'trim|max_length[20]'
      ),
      array(
        'field' => 'director',
        'label' => 'Director',
        'rules' => 'trim|max_length[50]'
      ),
      array(
        'field' => 'descripcion',
        'label' => 'Descripción',
        'rules' => 'trim|max_length[500]'
      ),
      array(
        'field' => 'anio',
        'label' => 'Año',
        'rules' => 'trim|required|callback__es_numero'
      ),
      array(
        'field' => 'duracion',
        'label' => 'Duración',
        'rules' => 'trim|required|callback__es_numero'
      ),
      array(
        'field' => 'precio',
        'label' => 'Precio',
        'rules' => 'trim|required|puntos_y_comas' .
                   'callback__es_numero|callback__precio_valido'
      )
    );
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules($reglas);
    return $this->form_validation->run();
  }
  
  function _es_numero($num) {
    if (is_numeric($num)) {
      return TRUE;
    } else {
      $this->form_validation->set_message('_es_numero',
                             'El año no es un número');
      return FALSE;
    }
  }
  
  function _precio_valido($p) {
    $p = $this->puntos_y_comas($p);
    if (abs($p) >= 0 && abs($p) <= 9999.99) {
      return $p;
    } else {
      $this->form_validation->set_message('_precio_valido',
                             'El precio no es válido');
      return FALSE;
    }
  }
  
  function puntos_y_comas($valor) {
    return str_replace(',', '.', $valor);
  }
}

