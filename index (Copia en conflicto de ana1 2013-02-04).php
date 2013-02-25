<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Videoclub</title>
  </head>
  <body>
    <?php

      require 'comun/conexion.php';

      $numsocio = (isset($_POST['cod_socio'])) ? trim($_POST['cod_socio']) : '';

      if(isset($_POST['devolver'])) {
        $id_alquiler = pg_escape_string($_POST['id_alquiler']);
        $res = pg_query($con,"update alquileres set fdev = current_date where id = $id_alquiler");
      } else if(isset($_POST['alquilar'])){
        $id_socio = pg_escape_string($_POST['id_socio']);
        $id_pelicula = pg_escape_string($_POST['id_pelicula']);
        $res = pg_query($con, "select * from alquileres where peliculas_id = $id_pelicula");
          if(!pg_num_rows($res) > 0) {
            $res = pg_query($con,"insert into alquileres(socios_id,peliculas_id) values ($id_socio,$id_pelicula)");
        }
      }

    ?>

    <form action="index.php" method="post">
      <label for="cod_socio">Nº socio: </label>
      <input type="text" name="cod_socio" value="<?= $numsocio ?>" autofocus />
      <input type="submit" value="Aceptar" />
    </form>
    
    <?php
        if(!empty($numsocio)):
          try{
            if(!ctype_digit($numsocio)){
              throw new Exception("Número incorrecto.");
            }
            $numsocio = pg_escape_string($numsocio);
            $res = pg_query($con, "select * from socios where numero= $numsocio")
                  or die("No se ha podido acceder a la tabla de socios");
            if(pg_num_rows($res) == 0) {
              throw new Exception("No existe el socio indicado");
            }

            $fila = pg_fetch_array($res, 0);
            $id_socio = $fila['id'];
            $nombre = $fila['nombre'];
            $telef = $fila['telefono'];
          
    ?>

    <fieldset>
      <legend><strong>Datos de socio</strong></legend>
        <table>
          <tr><td>Nombre: </td><td><input type="text" value="<?= $nombre ?>" /></td></tr>
          <tr><td>Telefono: </td><td><input type="text" value="<?= $telef ?>" /></td></tr>
        </table>
    </fieldset>

    <?php

      $res = pg_query($con,"select a.*, p.codigo, p.titulo from alquileres a join peliculas p"
                      ." on a.peliculas_id=p.id where socios_id = $id_socio and fdev is null");
      if(pg_num_rows($res) > 0):
    ?>
      <table  border="1" style="margin:auto">
        <thead>
          <th>Código</th><th>Título</th><th>Alquiler</th><th>Devolución</th>
        </thead>
        <tbody>
    <?php
      for($i=0;$i<pg_num_rows($res);$i++):
        $fila = pg_fetch_array($res, $i);
        $codigo = $fila['codigo'];
        $titulo = $fila['titulo'];
        $falq = $fila['falq'];
        $id_alquiler = $fila['id'];
    ?>
          <tr>
            <td><?= $codigo ?></td>
            <td><?= $titulo ?></td>
            <td><?= $falq ?></td>
            <td>
              <form action="index.php" method="post">
                <input type="hidden" name="cod_socio" value="<?= $numsocio ?>" />
                <input type="hidden" name="id_alquiler" value="<?= $id_alquiler ?>" />
                <input type="submit" name="devolver" value="Devolver" />
              </form>
            </td>
          </tr>

      <?php endfor; ?>
        </tbody>
      </table>

    <?php

      endif;

      $codigo = (isset($_POST['cod_pelicula'])) ? trim($_POST['cod_pelicula']) : '';

    ?>

    <form action="index.php" method="post">
      <label for="cod_pelicula">Nº de pelicula: </label>
      <input type="hidden" name="cod_socio" value="<?= $numsocio ?>" />
      <input type="text" name="cod_pelicula" value="<?= $codigo ?>" />
      <input type="submit" value="Aceptar" />
    </form>
    
    <?php
          if(!empty($codigo)):
            if(!ctype_digit($codigo)){
              throw new Exception("Código incorrecto.");
            }
            $codigo = pg_escape_string($codigo);
            $res = pg_query($con, "select * from peliculas where codigo = $codigo")
                  or die("No se ha podido acceder a la tabla de peliculas");
            if(pg_num_rows($res) == 0) {
              throw new Exception("No existe la pelicula indicada");
            }

            $fila = pg_fetch_array($res, 0);
            $id_pelicula = $fila['id'];
            $titulo = $fila['titulo'];
            $precio = $fila['precio'];

      $res = pg_query($con, "select * from alquileres where peliculas_id = $id_pelicula and fdev is null");

      if(pg_num_rows($res) > 0):
        echo "<strong>Película en alquiler</strong>";
      else:
    ?>

    <fieldset>
      <legend><strong>Datos de la película</strong></legend>
        <table>
          <tr><td>Título: </td><td><input type="text" size="50" value="<?= $titulo ?>" /></td></tr>
          <tr><td>Precio: </td><td><input type="text" size="50" value="<?= $precio ?>" /></td></tr>
          <tr>
            <td colspan="2" style="text-aling=right">
              <form action="index.php" method="post">
                <input type="hidden" name="cod_socio" value="<?= $numsocio ?>" />
                <input type="hidden" name="id_socio" value="<?= $id_socio ?>" />
                <input type="hidden" name="id_pelicula" value="<?= $id_pelicula ?>" />
                <input type="submit" name="alquilar" value="Alquilar" />
              </form>
            </td>
          </tr>
        </table>
    </fieldset>

    <?php 
            endif;
          endif;

          } catch (Exception $e) {
            echo "<strong>{$e->getMessage()}</strong>";
          }
      endif;
    ?>

    <?php pg_close($con); ?>
  </body>
</html>
