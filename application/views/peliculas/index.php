<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
          href="<?= base_url('css/style.css') ?>">
	<title>Videoclub</title>
</head>
<body>
	<header>
		<h1>VIDEOCLUB - CABECERA</h1>
	</header>

	<div>
		<p>Login</p>
	</div>

	<div>
		<p>Filtros</p>
	</div>

	<section>
		<aside>
			<table border="1" style="margin:auto">
				<thead>
					<th>Titulo</th>
				</thead>

				<tbody>
					<?php foreach ($res as $fila): ?>
						<tr>
							<td><?= anchor("peliculas/index/$fila->id", "$fila->titulo") ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</aside>

		<article>
			<div><img src="http://adjuntos.estamosrodando.com/imagen/el-ataque-de-los-tomates-asesinos-147175.jpg" alt="Tomates asesinos" /></div>
			<div>
				<?php foreach ($datos as $fila): ?>
					<p><?= $fila->titulo ?></p>
				<?php endforeach; ?>
			</div>
		</article>
		
	</section>

	<footer>
		<p>Paginación</p>
	</footer>
</body>
</html>
