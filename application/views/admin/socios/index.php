<table border="1" style="margin:auto">
  <thead>
		<?php foreach ($columnas as $k): ?>
			<th><?= $k ?></th>
		<?php endforeach; ?>
    <th>Opciones</th>
  </thead>
  <tbody>
    <?php foreach ($res as $socio): ?>
      <tr>
			  <?php foreach ($columnas as $k => $v): ?>
			    <?php if ($k == 'id' || $k == $usuario): ?>
			      <td><?= anchor('admin/socios/modificar/' .
			                     $socio['id'], $socio[$k]) ?></td>
  			  <?php else: ?>
  			    <td><?= $socio[$k] ?></td>
  			  <?php endif; ?>
				<?php endforeach ?>
        <?= form_open('admin/socios/baja' . $socio['id']) ?>
          <td><?= form_submit('borrar', 'Borrar') ?></td>
        <?= form_close() ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= form_open('admin/socios/insertar') ?>
  <?= form_submit('anadir', 'Añadir Socio') ?>
<?= form_close() ?>
