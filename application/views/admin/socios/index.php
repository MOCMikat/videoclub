<html>
<head>
	<LINK REL="stylesheet" HREF="<?= base_url('css/socio.css') ?>" TYPE="text/css">
</head>
<body>
<table>
  <thead>
    <th>Usuario</th>
    <th>Email</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th colspan="2">Opciones</th>
  </thead>
  <tbody>
    <?php foreach ($res as $socio): ?>
      <tr>
        <td><?= $socio->usuario ?></td>
        <td><?= $socio->email ?></td>
        <td><?= $socio->nombre ?></td>
        <td><?= $socio->telefono ?></td>
        <?= form_open('admin/socios/baja') ?>
        <?= form_hidden('id', $socio->id) ?>
        <td><?= form_submit('borrar', 'Borrar') ?></td>
        <?= form_close() ?>
        <?= form_open('admin/socios/modificar') ?>
        <?= form_hidden('id', $socio->id) ?>
        <td><?= form_submit('modificar', 'Modificar') ?></td>
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
