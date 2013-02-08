<table border="1" style="margin:auto">
	<thead>
		<?php foreach ($columnas as $col): ?>
			<th><?= $col ?></th>
		<?php endforeach; ?>
		<th colspan="2">Opciones</th>
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
				  <?= form_open('admin/peliculas/modificar') ?>
				    <?= form_hidden('id',$fila-> id)?>
            <td><?= form_submit('modificar', 'Modificar') ?></td>
          <?= form_close()?>         
          <?= form_open('admin/peliculas/eliminar') ?>
				    <?= form_hidden('id',$fila-> id)?>
            <td><?= form_submit('eliminar', 'Eliminar') ?></td>
          <?= form_close()?>
          
				
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?= barra_navegacion('admin/peliculas/index', $pag, $npags); ?>
<?= form_open('admin/peliculas/insertar') ?>
  <?= form_submit('anadir', 'Añadir') ?>
<?= form_close()?>
