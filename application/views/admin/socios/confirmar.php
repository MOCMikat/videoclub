<?= form_open('socios/baja'); ?>
	<table>
		<tr>
			<td colspan="2">
				¿Está seguro de querer eliminar este socio?
			</td>
		</tr>
		<tr>
			<td>
				<?= $baja = $id; ?>
				<?= form_submit('baja', 'Si', $baja); ?>
			</td>
			<td>
				<?= form_submit(array('name' 			 => 'cancelar',
						                  'value' 		 => 'No',
						                  'formaction' => 'index')); ?>
			</td>
		</tr>
	</table>
<?= form_close(); ?>
