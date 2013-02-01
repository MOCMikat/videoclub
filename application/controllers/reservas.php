<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Reserva');
		$this->load->library('paginador');
	}

	function index() {
		$res = $this->Reserva->obtener_todos('', '', '', '');

		$columnas = array('id'            => 'ID Reserva',
		                  'id_socio' 		  => 'ID Socio',
		                  'id_pelicula'   => 'ID Pelicula',
		                  'f_alquiler'    => 'Fecha Alquiler',
		                  'f_devolucion'  => 'Fecha Devolución');

		$data = array('res' => $res, 'columnas' => $columnas);
		$this->load->view('reservas/index', $data);
	}
}
