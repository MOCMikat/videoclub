<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Modificar un artículo</title>
  </head>
  <body>
  <?php
    require 'auxiliar.php';

    $numero = recoger_numero();

    if (isset($_POST['Devolver'])) {
      $id_alquiler = $_POST['id_alquiler'];
      devolver($con, $id_alquiler);
    } else if (isset($_POST['Alquilar'])) {
      $id_socio = $_POST['id_socio'];
      $id_pelicula = $_POST['id_pelicula'];
      if (!esta_alquilada($con, $id_pelicula)) {
        alquilar($con, $id_socio, $id_pelicula);
      }
    }

    pedir_numero_socio($numero);

    if (!empty($numero)):
      try {
        validar_numero($numero);
        extract(socio_existe($con, $numero));
        $id_socio = $id;
        mostrar_datos_socio($nombre, $telefono);
        $filas = alquileres_pendientes($con, $id_socio);
        if (!empty($filas)): ?>
          <table border="1" style="margin:auto">
            <thead>
              <th>Código</th>
              <th>Título</th>
              <th>Alquiler</th>
              <th>Devolver</th>
            </thead>
            <tbody>
            <?php
              for ($i = 0; $i < pg_num_rows($res); $i++):
                extract(pg_fetch_array($res, $i)); ?>
                <tr>
                  <td align="center"><?= $codigo ?></td>
                  <td><?= $titulo ?></td>
                  <td><?= $falq ?></td>
                  <form action="index.php" method="post">
                    <input type="hidden" name="numero"
                           value="<?= $numero ?>" />
                    <input type="hidden" name="id_alquiler"
                           value="<?= $id ?>" />
                    <td><input type="submit" name="Devolver" 
                               value="Devolver" /></td>
                  </form>
                </tr>
            <?php
              endfor; ?>
            </tbody>
          </table>
      <?php
        endif;
        $codigo = (isset($_POST['codigo'])) ?
                  trim($_POST['codigo']) : ''; ?>
        <form action="index.php" method="post">
          <input type="hidden" name="numero" value="<?= $numero ?>" />
          <label for="codigo">Código de película:</label>
          <input type="text" name="codigo" value="<?= $codigo ?>" />
          <input type="submit" value="Aceptar" />
        </form>
      <?php
        if (!empty($codigo)):
          if (!ctype_digit($codigo)) {
            throw new Exception("Código incorrecto");
          }
          $codigo = pg_escape_string($codigo);
          $res = pg_query($con, "select *
                                   from peliculas
                                  where codigo = $codigo");
          if (pg_num_rows($res) == 0) {
            throw new Exception("Esa película no existe");
          }
          extract(pg_fetch_array($res, 0));
          $id_pelicula = $id; ?>
          <fieldset>
            <legend>Datos de la película</legend>
            Título: <?= $titulo ?><br/>
            Precio: <?= $precio ?><br/>
          </fieldset>
        <?php
          $res = pg_query($con, "select a.*, s.numero, s.nombre
                                   from alquileres a join socios s on
                                        socios_id = s.id
                                  where peliculas_id = $id_pelicula
                                        and fdev is null");
          if (pg_num_rows($res) > 0):
            $fila = pg_fetch_array($res, 0);
            $num_tiene = $fila['numero'];
            $nom_tiene = $fila['nombre'];
            $fecha_alq = $fila['falq']; ?>
            <strong>Película alquilada: la tiene 
            <a href="index.php?numero=<?=$num_tiene?>">(<?=$num_tiene?>)
            <?=$nom_tiene?></a> y se la llevó el <?=$fecha_alq?></strong>
          <?php else: ?>
            <form action="index.php" method="post">
              <input type="hidden" name="numero"
                     value="<?= $numero ?>" />
              <input type="hidden" name="id_socio"
                     value="<?= $id_socio ?>" />
              <input type="hidden" name="id_pelicula"
                     value="<?= $id_pelicula ?>" />
              <input type="submit" name="Alquilar" value="Alquilar" />
            </form>
        <?php
          endif;
        endif; ?>
    <?php
      } catch (Exception $e) {
        echo "<strong>{$e->getMessage()}</strong>";
      }
    ?>
  <?php
    endif; ?>
  <?php
    pg_close($con); ?>
  </body>
</html>

