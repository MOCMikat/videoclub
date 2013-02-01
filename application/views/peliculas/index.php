<table border="1" style="margin:auto">
	<thead>
		<?php foreach ($columnas as $col): ?>
			<th><?= $col ?></th>
		<?php endforeach; ?>
	</thead>

	<tbody>
		<?php foreach ($res as $fila): ?>
			<tr>
				<td><?= $fila->titulo ?></td>
				<td><?= $fila->precio ?></td>
				<td><?= $fila->genero ?></td>
				<td><?= $fila->director ?></td>
				<td><?= $fila->duracion ?></td>
				<td><?= $fila->descripcion ?></td>
				<td><?= $fila->anio ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?= barra_navegacion('admin/peliculas/index', $pag, $npags); ?>
<?= form_open('admin/peliculas/insertar') ?>
  <?= form_submit('insertar', 'Insertar') ?>
<?= form_close()?>
