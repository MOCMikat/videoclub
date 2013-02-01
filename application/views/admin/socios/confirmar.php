<?= form_open('socios/baja'); ?>
	<table>
		<tr>
			<td colspan="2">
				¿Está seguro de querer eliminar este socio?
			</td>
		</tr>
		<tr>
			<td>
			  <?= form_hidden('idsocio', $id); ?>
				<?= form_submit('baja', 'Si', $id); ?>
			</td>
			<td>
				<?= form_submit(array('name' 			 => 'cancelar',
						                  'value' 		 => 'No',
						                  'formaction' => 'index')); ?>
			</td>
		</tr>
	</table>
<?= form_close(); ?>
