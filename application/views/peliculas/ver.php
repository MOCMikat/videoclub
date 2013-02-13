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
			<h1>
				<?= anchor('peliculas/index/', 'VIDEOCLUB') ?>
			</h1>
		</header>

		<div>
			<p>Login</p>
		</div>
		<div>
			<p>Filtros</p>
		</div>

		<section>
			<article>
				<h3>
					<?= $res['titulo'] ?>
				</h3>
				<?= img($res['url_imagen']) ?>
			</article>
		</section>
	</body>
</html>
