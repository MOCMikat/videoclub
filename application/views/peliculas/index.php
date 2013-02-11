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
			<article>
				<div>
					<?php foreach ($res as $fila): ?>
						<?= anchor('peliculas/index/' . $fila['id'], img('http://adjuntos.estamosrodando.com/imagen/el-ataque-de-los-tomates-asesinos-147175.jpg')) ?>
					<?php endforeach; ?>
				</div>
			</article>
		</section>
	</body>
</html>
