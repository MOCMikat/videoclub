<?= validation_errors() ?>
<?= form_open('admin/socios/insertar') ?>

<table>	
	<tr>
		<td><?= form_label('Usuario:', 'usuario') ?></td>
		<td><?= form_input('usuario', set_value('usuario')) ?></td>
	</tr>
	<tr>
		<td><?= form_label('Contraseña:', 'password') ?></td>
		<td><?= form_password('password', set_value('password')) ?></td>
	</tr>
	<tr>
		<td><?= form_label('Confirmar:', 'password_confirm') ?></td>
		<td><?= form_password('password_confirm', set_value('password_confirm')) ?></td>
	</tr>
	<tr>
		<td><?= form_label('Correo:', 'email') ?></td>
		<td><?= form_input('email', set_value('email')) ?></td>
	</tr>
	<tr>
		<td><?= form_label('Nombre:', 'nombre') ?></td>
		<td><?= form_input('nombre', set_value('nombre')) ?></td>
	</tr>
	<tr>
		<td><?= form_label('Teléfono:', 'telefono') ?></td>
		<td><?= form_input('telefono', set_value('telefono')) ?></td>
	</tr>
	<tr>
		<td colspan="2"><?= form_submit('insertar', 'Grabar nuevo socio') ?></td>
	</tr>
</table>
<?= form_close() ?>
<?= anchor('admin/socios/index', 'Atrás') ?>
