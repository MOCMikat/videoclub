<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Reserva');
		$this->load->library('paginador');
	}

	function index() {
		$res = $this->Reserva->obtener_todos('', '', '', '');

		$columnas = array('id'            => 'ID',
		                  'id_socio' 		  => 'IdSocio',
		                  'id_pelicula'   => 'IdPelicula',
		                  'f_alquiler'    => 'FAlquiler',
		                  'f_devolucion'  => 'FDevolucion');

		$data = array('res' => $res, 'columnas' => $columnas);
		$this->load->view('reservas/index', $data);
	}
}
