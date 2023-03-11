<!DOCTYPE html>
<html>
<head>
	<title>Ingresar País</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<?php include 'conexion.php'; ?>
	<header>
		<h1>Ingresar País</h1>
		<nav>
			<ul>
				<li><a href="../../menu.php">Menu Principal</a></li>
			</ul>
		</nav>
	</header>
	<div class="formulario">
		<form method="post">
			<label>Nombre del país:</label>
			<input type="text" name="nombre_pais">
			<input type="submit" name="submit" value="Guardar">
		</form>
	</div>
</body>
</html>

