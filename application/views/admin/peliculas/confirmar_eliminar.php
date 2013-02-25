<?= form_open('admin/peliculas/eliminar') ?>
  <?= form_label('Desea eliminarla pelicula', 'eliminar') ?>
  
  <?= form_hidden('id', $id); ?>
  <?= form_submit('si', 'Sí') ?>
  <?= form_submit(array('name' => 'cancelar',
                        'value' => 'Cancelar',
                        'formaction' => site_url('admin/peliculas/index'))) ?>
<?= form_close() ?>
