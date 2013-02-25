<?= validation_errors() ?>
<?= form_open('admin/peliculas/modificar') ?>
  <?php extract($pelicula); ?>
  <table>
    <tr>
      <td align="right">
        <label for="titulo">Título*:</label>
      </td>
      <td>
        <?= form_input(
              array(
                'name'      => 'titulo',
                'size'      => '50',
                'maxlength' => '100',
                'value'     => set_value('titulo', $titulo)
              )
            ) ?>
        <br/>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="precio">Precio*:</label>
      </td>
      <td>
        <?= form_input(
              array(
                'name' => 'precio',
                'size' => '7',
                'maxlength' => '7',
                'placeholder' => '9999,99',
                'value' => set_value('precio', $precio)
              )
            ) ?> (€ sin puntos, sólo coma decimal)
        <br/>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="genero">Genero:</label>
      </td>
      <td>
        <?= form_input(
              array(
                'name' => 'genero',
                'size' => '20',
                'maxlength' => '20',
                'value' => set_value('genero', $genero)
              )
            ) ?>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="director">Director:</label>
      </td>
      <td>
        <?= form_input(
              array(
                'name'      => 'director',
                'size'      => '50',
                'maxlength' => '50',
                'value'     => set_value('director', $director)
              )
            ) ?>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="duracion">Duración*:</label>
      </td>
      <td>
        <?= form_input(
              array(
                'name'      => 'duracion',
                'size'      => '3',
                'maxlength' => '3',
                'value'     => set_value('duracion', $duracion)
              )
            ) ?> (en minutos)
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="descripcion">Descripción:</label>
      </td>
      <td>
        <?= form_textarea(
              array(
                'name'  => 'descripcion',
                'cols'  => '50',
                'rows'  => '10',
                'value' => set_value('descripcion', $descripcion)
              )
            ) ?>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="anio">Año*:</label>
      </td>
      <td>
        <?= form_input(
              array(
                'name'      => 'anio',
                'size'      => '4',
                'maxlength' => '4',
                'value'     => set_value('anio', $anio)
              )
            ) ?>
      </td>
    </tr>
  </table>
  <?= form_hidden('id', $id) ?>
  <p>
    <?= form_submit('modificar', 'Modificar') ?>
    <?= form_submit(
          array(
            'name'       => 'cancelar',
            'value'      => 'Cancelar',
            'formaction' => site_url('admin/peliculas')
          )
        ) ?>
  </p>
<?= form_close() ?>

