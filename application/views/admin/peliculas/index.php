<table border="1" style="margin:auto">
	<thead>
		<?php foreach ($columnas as $col): ?>
			<th><?= $col ?></th>
		<?php endforeach; ?>
		<th>Opciones</th>
	</thead>

	<tbody>
		<?php foreach ($res as $fila): ?>
			<tr>
			  <?php foreach ($columnas as $col => $nombre): ?>
			    <?php if ($col == 'id' || $col == $descripcion): ?>
			      <td><?= anchor('admin/peliculas/modificar/' .
			                     $fila['id'], $fila[$col]) ?></td>
  			  <?php else: ?>
  			    <td><?= $fila[$col] ?></td>
  			  <?php endif; ?>
				<?php endforeach ?>
        <?= form_open('admin/peliculas/eliminar/' . $fila['id']) ?>
          <td><?= form_submit('eliminar', 'Eliminar') ?></td>
        <?= form_close() ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?= barra_navegacion('admin/peliculas/index', $pag, $npags); ?>
<?= form_open('admin/peliculas/insertar') ?>
  <?= form_submit('anadir', 'Añadir') ?>
<?= form_close()?>

