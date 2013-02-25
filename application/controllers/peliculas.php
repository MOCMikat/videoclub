<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peliculas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Pelicula');
		$this->load->library('Template');
		$this->load->helper('html');
	}

	function index() {
		$res = $this->Pelicula->obtener_novedades();

		$data = array('res' => $res);
		$this->template->load('template', 'peliculas/index', $data);
	}
	
	function ver($id = null) {
		$res = $this->Pelicula->por_id($id);
		
		$columnas = array('titulo' 			  => 'Título',
						  'precio' 			  => 'Precio',
						  'genero' 			  => 'Género',
						  'director' 		  => 'Director',
						  'duracion' 		  => 'Duración',
						  'descripcion' 	  => 'Descripción',
						  'anio' 			  => 'Año',
						  'fecha_lanzamiento' => 'Fecha lanzamiento');
						  
		$data = array('res'      => $res,
					  'columnas' => $columnas);
					  
		$this->template->load('template', 'peliculas/ver', $data);
	}
}
