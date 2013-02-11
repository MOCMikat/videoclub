<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peliculas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Pelicula');
		$this->load->library('Template');
		$this->load->helper('html');
	}

	function index($id = null) {
		$res = $this->Pelicula->obtener_todos('', '', '', '');

		$columnas = array('titulo' 			  => 'Título',
						  'precio' 			  => 'Precio',
						  'genero' 			  => 'Género',
						  'director' 		  => 'Director',
						  'duracion' 		  => 'Duración',
						  'descripcion' 	  => 'Descripción',
						  'anio' 			  => 'Año',
						  'fecha_lanzamiento' => 'Fecha lanzamiento');

		$datos = $this->Pelicula->por_id($id);
		$data = array('res'      => $res, 
					  'columnas' => $columnas, 
					  'datos'    => $datos);
		$this->template->load('template', 'peliculas/index', $data);
	}
	
	function ver($id = null) {
		
	}
}
