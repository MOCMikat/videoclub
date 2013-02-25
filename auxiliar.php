<?php
  function recoger_numero() {
    $numero = (isset($_POST['numero'])) ? trim($_POST['numero']) : '';
    if (isset($_GET['numero'])) $numero = trim($_GET['numero']);
    return $numero;
  }
  
  function esta_alquilada($con, $id_pelicula) {
    $res = pg_query($con, "select *
                             from alquileres
                            where peliculas_id = $id_pelicula
                              and fdev is null");
    return pg_num_rows($res) > 0;
  }

  function alquilar($con, $id_socio, $id_pelicula) {
    $id_socio = pg_escape_string($id_socio);
    $id_pelicula = pg_escape_string($id_pelicula);
    $res = pg_query($con, "insert into alquileres (socios_id,
                                                   peliculas_id)
                           values ($id_socio, $id_pelicula)");
  }
  
  function devolver($con, $id_alquiler) {
    $id_alquiler = pg_escape_string($id_alquiler);
    $res = pg_query($con, "update alquileres
                        set fdev = current_date
                      where id = $id_alquiler");
  }

  function pedir_numero_socio($numero) { ?>
    <form action="index.php" method="post">
      <label for="numero">Número de socio:</label>
      <input type="text" name="numero" value="<?= $numero ?>" />
      <input type="submit" value="Aceptar" />
    </form><?php
  }

  function validar_numero($numero) {
    if (!ctype_digit($numero)) {
      throw new Exception("Número incorrecto");
    }
  }

  function socio_existe($con, $numero) {
    $numero = pg_escape_string($numero);
    $res = pg_query($con, "select *
                             from socios
                            where numero = $numero");
    if (pg_num_rows($res) == 0) {
      throw new Exception("Ese socio no existe");
    }
    return pg_fetch_array($res, 0);
  }

  function mostrar_datos_socio($nombre, $telefono) { ?>
    <fieldset>
      <legend>Datos del socio</legend>
      Nombre: <?= $nombre ?><br/>
      Teléfono: <?= $telefono ?><br/>
    </fieldset><?php
  }

  function alquileres_pendientes($con, $id_socio) {
    $filas = array();
    $res = pg_query($con, "select a.*, p.codigo, p.titulo
                             from alquileres a join peliculas p
                                  on peliculas_id = p.id
                            where socios_id = $id_socio
                                  and fdev is null");

    for ($i = 0; $i < pg_num_rows($res); $i++) {
      $filas[] = pg_fetch_array($res, $i);
    }
      
    return $filas;
  }

  $con = pg_connect("host=localhost user=usuario
                     password=usuario dbname=video");
?>

