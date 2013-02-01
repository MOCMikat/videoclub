<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peliculas extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Pelicula');
  }
  
  function index($pag = 1) {
    $this->load->helper('url');
    $this->load->library('paginador');
  
    $columnas = array('titulo'      => 'Título',
                      'genero'      => 'Genero',
                      'director'    => 'Director',
                      'descripcion' => 'Descripción',
                      'anio'        => 'Año',
                      'duracion'    => 'Duración',
                      'precio'      => 'Precio');

    if ($this->input->post('buscar')) {
      $columna = $this->input->post('columna');
      $criterio = $this->input->post('criterio');
      //$this->session->set_userdata('columna', $columna);
      //$this->session->set_userdata('criterio', $criterio);
    /*} else if ($this->session->userdata('columna')) {
      $columna = $this->session->userdata('columna');
      $criterio = $this->session->userdata('criterio');
    */} else {
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

  
}

