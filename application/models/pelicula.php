<?php
// id | titulo | precio | genero | director | duracion | descripcion | anio
class Pelicula extends CI_Model{

  function obtener_todos($cond = '', $valores = array(),
                         $limit = '', $offset = '') {
    $where = ($cond != null) ? "where $cond" : '';
    $limit = ($limit != '') ? "limit $limit" : '';
    $offset = ($offset != '') ? "offset $offset" : '';
    $res = $this->db->query("select *
                             from peliculas
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

  function por_titulo($titulo) {
    return $this->obtener_todos("titulo = ?", array($titulo));
  }

  function por_precio($precio) {
    return $this->obtener_todos("precio = ?", array($precio));
  }

  function por_genero($genero) {
    return $this->obtener_todos("genero = ?", array($genero));
  }

  function por_director($director) {
    return $this->obtener_todos("director like upper(%?%)", array($director));
  }

  function por_anio($anio) {
    return $this->obtener_todos("anio = ?", array($anio));
  }

  function insertar($columnas) {
    extract($columnas);
    $res = $this->db->query("insert into peliculas (titulo, precio, 
                                                    genero, director, 
                                                    duracion, descripcion, 
                                                    anio)
                             values (?, ?, ?, ?, ?, ? , ?)",
                             array($titulo, $precio, $genero, $director,
                                   $duracion, $descripcion, $anio));
    return $this->db->affected_rows();
  }

  function modificar($columnas) {
    extract($columnas);
    $res = $this->db->query("update peliculas set titulo = ?, precio = ?, 
                                                    genero = ?, director = ?, 
                                                    duracion = ?, descripcion = ?, 
                                                    anio = ?",
                             array($titulo, $precio, $genero, $director,
                                   $duracion, $descripcion, $anio));
    return $this->db->affected_rows();
  }

  function borrar($id){
    $res = $this->db->query("delete from peliculas where id = $id");
  }
}
