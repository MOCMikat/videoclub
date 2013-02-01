<p><?= validation_errors() ?></p>
<?= form_open('admin/socios/modificar') ?>
  <?= form_label('Usuario:', 'usuario') ?>
  <?= form_input('usuario', set_value('usuario')) ?><br/>
  <?= form_label('Contraseña:', 'password') ?>
  <?= form_password('password', set_value('password')) ?><br/>
  <?= form_label('Confirmar contraseña:', 'password_confirm') ?>
  <?= form_password('password_confirm',
                    set_value('password_confirm')) ?><br/>
  <?= form_label('Email:', 'email') ?>
  <?= form_input('email', set_value('email')) ?><br/>
  <?= form_label('Nombre:', 'nombre') ?>
  <?= form_input('nombre', set_value('nombre')) ?><br/>
  <?= form_label('Teléfono:', 'telefono') ?>
  <?= form_input('telefono', set_value('telefono')) ?><br/>
  <?= form_submit('modificar', 'Modificar socio') ?>
  <?= form_submit(array('name' => 'cancelar',
                        'value' => 'Cancelar',
                        'formaction' => 'http://localhost/web/video/index.php/admin/socios/index')) ?>
<?= form_close() ?>
