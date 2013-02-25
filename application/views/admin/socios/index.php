<html>
  <head>
	  <link REL="stylesheet" href="<?= base_url('css/socio.css') ?>" type="text/css">
  </head>
  
  <body>
    <table>
      <thead>
		    <?php foreach ($columnas as $k): ?>
			    <th><?= $k ?></th>
		    <?php endforeach; ?>
        <th>Opciones</th>
      </thead>
      
      <tbody>
        <fieldset>
          <legend>BUSCADOR</legend>
          <?= form_open('admin/socios/index') ?>
            <?= form_dropdown('columna', $columnas)?>
            <?= form_input('criterio', $criterio) ?>
            <?= form_submit('buscar', 'Buscar') ?>
          <?= form_close() ?>
        </fieldset>
        <?php foreach ($res as $socio): ?>
        <tr>
			    <?php foreach ($columnas as $k => $v): ?>
			      <?php if ($k == 'id' || $k == $descripcion): ?>
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
  </body>
</html>
