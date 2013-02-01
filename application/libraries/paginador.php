<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginador {

  function paginar($modelo, $columna, $criterio, &$pag) {
    $CI =& get_instance();
    $CI->load->helper('paginador');
    $CI->config->load('parametros');

    if ($columna != '' && $criterio != '') {
      $res = $modelo->obtener_filtrado($columna, $criterio);
    } else {
      $res = $modelo->obtener_todos();
    }
  
    $fpp = (float) $CI->config->item('FPP');
    $nfilas = count($res);
    $npags = ceil($nfilas / $fpp);
    if ($pag > $npags) $pag = 1;
    if ($pag < 0)      $pag = 1;
    $res = $modelo->obtener_filtrado($columna, $criterio,
                                     $fpp, $fpp * ($pag - 1));
    return array($res, $npags);
  }

}

