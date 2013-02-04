<?php

class Reserva extends CI_Model{

  function __construct() {
  	parent::__construct();
  	$this->load->database();
  }

  function obtener_todos($cond = '', $valores = array(),
                         $limit = '', $offset = '') {
    $where = ($cond != null) ? "where $cond" : '';
    $limit = ($limit != '') ? "limit $limit" : '';
    $offset = ($offset != '') ? "offset $offset" : '';
    $res = $this->db->query("select *
                             from reservas
                             $where
                             order by id
                             $limit
                             $offset", $valores);
    return $res->result();
  }

  function obtener_filtrado($columna, $criterio, $limit = '',
                            $offset = '') {
    $cond = "upper(" . $this->db->escape_str($columna) . ") like ".
            "upper('%" . $this->db->escape_str($criterio) . "%')";
    return $this->obtener_todos($cond, array(), $limit, $offset);
  }

  function por_id($id) {
    return $this->obtener_todos("id = ?", array($id));
  }

  function por_id_socio($idSocio) {
    return $this->obtener_todos("id_socio = ?", array($idSocio));
  }

  function por_id_pelicula($idPelicula) {
    return $this->obtener_todos("id_pelicula = ?", array($idPelicula));
  }

  function por_fecha_alquiler($fAlquiler) {
    return $this->obtener_todos("f_alquiler = ?", array($fAlquiler));
  }

  function por_fecha_devolucion($fDevolucion) {
    return $this->obtener_todos("f_devolucion = ?", array($fDevolucion));
  }

  function insertar($columnas) {
    extract($columnas);
    $res = $this->db->query("insert into reservas (id_socio, id_pelicula, 
                                                   f_alquiler, f_devolucion)
                             values (?, ?, ?, ?)",
                             array($idSocio, $idPelicula, $fAlquiler, $fDevolucion));
    return $this->db->affected_rows();
  }

  /* Pendiente de mejorar
   function modificar($columnas) {
    extract($columnas);
    $res = $this->db->query("update reservas set f_devolucion = ?",
                             array($fDevolucion));
    return $this->db->affected_rows();
  } */

  function borrar($id){
    $res = $this->db->query("delete from reservas where id = $id");
  }
}
