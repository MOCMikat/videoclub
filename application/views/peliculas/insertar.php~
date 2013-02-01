<?= validation_errors() ?>
<?= form_open('admin/peliculas/insertar') ?>
  <table>
    <tr>
      <td align="right">
        <label for="titulo">Título*:</label>
      </td>
      <td>
        <?= form_input(array('name' => 'titulo',
                             'size' => '50',
                             'maxlength' => '100',
                             'value' => set_value('titulo'))) ?>
        <br/>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="precio">Precio*:</label>
      </td>
      <td>
        <?= form_input(array('name' => 'precio',
                             'size' => '7',
                             'maxlength' => '7',
                             'placeholder' => '9999,99',
                             'value' => set_value('precio'))) ?>
                             (€ sin puntos, sólo coma decimal)
        <br/>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="genero">Genero:</label>
      </td>
      <td>
        <?= form_input(array('name' => 'genero',
                             'size' => '20',
                             'maxlength' => '20',
                             'value' => set_value('genero'))) ?>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="director">Director:</label>
      </td>
      <td>
        <?= form_input(array('name' => 'director',
                             'size' => '50',
                             'maxlength' => '50',
                             'value' => set_value('director'))) ?>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="duracion">Duración*:</label>
      </td>
      <td>
        <?= form_input(array('name' => 'duracion',
                             'size' => '3',
                             'maxlength' => '3',
                             'value' => set_value('director'))) ?>
                            (en minutos)
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="descripcion">Descripción:</label>
      </td>
      <td>
        <?= form_textarea(array('name' => 'descripcion',
                                'cols' => '50',
                                'rows' => '10',
                                'value' => set_value('descripcion'))) ?>
      </td>
    </tr>
    <tr>
      <td align="right">
        <label for="anio">Año*:</label>
      </td>
      <td>
        <?= form_input(array('name' => 'anio',
                             'size' => '4',
                             'maxlength' => '4',
                             'value' => set_value('anio'))) ?>
      </td>
    </tr>
  </table>
  <p>
    <?= form_submit('anadir', 'Añadir') ?>
    <?= form_submit(array('name' => 'cancelar',
                          'value' => 'Cancelar',
                          'formaction' => 'index')) ?>
  </p>
<?= form_close() ?>

