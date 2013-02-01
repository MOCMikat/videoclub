<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilidades {

  function comprobar_usuario() {
    $CI =& get_instance();
    if (!$CI->session->userdata('usuario')) {
      $CI->load->helper('url');
      redirect('usuarios/login');
    }
  }

}

