<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peliculas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Pelicula');
	}

	function index() {
		$res = $this->Pelicula->obtener_todos('', '', '', '');

		$columnas = array('titulo' 		=> 'Título',
						  'precio' 		=> 'Precio',
						  'genero' 		=> 'Género',
						  'director' 	=> 'Director',
						  'duracion' 	=> 'Duración',
						  'descripcion' => 'Descripción',
						  'anio' 		=> 'Año');

		$data = array('res' => $res, 'columnas' => $columnas);
		$this->load->view('peliculas/index', $data);
	}
}