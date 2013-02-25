<?= form_open('admin/peliculas/index') ?>
  <?= form_label('Desea eliminarla pelicula', 'eliminar') ?>
  <?= form_submit('eliminar', 'Sí') ?>
  <?= form_submit(array('name' => 'cancelar',
                        'value' => 'Cancelar',
                        'formaction' => 'admin/peliculas/index')) ?>
<?= form_close() ?>
