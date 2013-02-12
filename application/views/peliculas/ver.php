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
				<?= "Título: " . $res['titulo'] ?><br>
				<?= img($res['url_imagen']) ?>
			</article>
		</section>
	</body>
</html>
