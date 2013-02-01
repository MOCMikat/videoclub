<table border="1" style="margin:auto">
  <thead>
    <th>Usuario</th>
    <th>Email</th>
    <th>Nombre</th>
    <th>Teléfono</th>
  </thead>
  <tbody>
    <?php foreach ($res as $socio): ?>
      <tr>
        <td><?= $socio->usuario ?></td>
        <td><?= $socio->email ?></td>
        <td><?= $socio->nombre ?></td>
        <td><?= $socio->telefono ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= form_open('socios/index') ?>
  <?= form_submit('anadir', 'Añadir Socio') ?>
<?= form_close() ?>
