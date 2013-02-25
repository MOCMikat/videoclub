<table border="1" style="margin:auto">
	<thead>
		<?php foreach ($columnas as $col): ?>
			<th><?= $col ?></th>
		<?php endforeach; ?>
	</thead>

	<tbody>
		<?php foreach ($res as $fila): ?>
			<tr>
				<td><?= $fila->id ?></td>
				<td><?= $fila->id_socio ?></td>
				<td><?= $fila->id_pelicula ?></td>
				<td><?= $fila->f_alquiler ?></td>
				<td><?= $fila->f_devolucion ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?= barra_navegacion('admin/reservas/index', $pag, $npags); ?>
<?= form_open('admin/reservas/insertar') ?>
  <?= form_submit('insertar', 'Insertar') ?>
<?= form_close()?>
