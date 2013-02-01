<?= form_open('admin/socios/insertar') ?>
<?php if(isset($res)){ echo $res}else{} ?>
<table>	
	<tr>
		<td><?= form_label('Usuario:', 'usuario') ?></td>
		<td><?= form_input('usuario') ?></td>
	</tr>
	<tr>
		<td><?= form_label('Contraseña:', 'password') ?></td>
		<td><?= form_password('password') ?></td>
	</tr>
	<tr>
		<td><?= form_label('Correo:', 'email') ?></td>
		<td><?= form_input('email') ?></td>
	</tr>
	<tr>
		<td><?= form_label('Nombre:', 'nombre') ?></td>
		<td><?= form_input('nombre') ?></td>
	</tr>
	<tr>
		<td><?= form_label('Teléfono:', 'telefono') ?></td>
		<td><?= form_input('telefono') ?></td>
	</tr>
	<tr>
		<td colspan="2"><?= form_submit('insertar', 'Grabar nuevo socio') ?></td>
	</tr>
</table>
<?= form_close() ?>
