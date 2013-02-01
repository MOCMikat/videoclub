<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('barra_navegacion')) {
  function barra_navegacion($destino, $pag, $npags) {
    $out = '';
    if ($npags > 1):
      $out .= '<div style="text-align: center">';
      $out .= anchor("$destino/1", '&lt;&lt;');
      $out .= '&nbsp; ';

      if ($pag > 1) {
        $out .= anchor("$destino/". ($pag - 1), '&lt;');
        $out .= ' ';
      }
    
      for ($p = 1; $p <= $npags; $p++) {
        if ($p == $pag) {
          $out .= "<strong>$p</strong>";
        } else {
          $out .= anchor("$destino/$p", $p);
        }
        $out .= ' ';
      }
    
      if ($pag < $npags) {
        $out .= anchor("$destino/". ($pag + 1), '&gt;');
        $out .= ' ';
      }

      $out .= '&nbsp; ';
      $out .= anchor("$destino/$npags", '&gt;&gt;');
      $out .= "</div>";
    endif;

    return $out;
  }
}

