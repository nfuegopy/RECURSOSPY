<!DOCTYPE html>
<html>
<head>
	<title>Ingresar Provincia</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<?php 
	include '../conexion.php';

	// Obtener los países para llenar el combobox
	$query_paises = "SELECT id_pais, nombre_pais FROM t_pais";
	$resultado_paises = mysqli_query($conn, $query_paises);
	$paises = mysqli_fetch_all($resultado_paises, MYSQLI_ASSOC);

	// Obtener el siguiente id_departamento
	$query_ultimo_id = "SELECT MAX(id_departamento) as ultimo_id FROM t_prov";
	$resultado_ultimo_id = mysqli_query($conn, $query_ultimo_id);
	$ultimo_id = mysqli_fetch_assoc($resultado_ultimo_id);
	$id_departamento = $ultimo_id['ultimo_id'] + 1;


	// Insertar datos en la tabla t_prov
	if(isset($_POST['submit'])){
		$id_pais = $_POST['id_pais'];
		$nombre_estado = $_POST['nombre_estado'];
		$sql = "INSERT INTO t_prov (id_departamento, id_pais, nombre_estado) VALUES ('$id_departamento', '$id_pais', '$nombre_estado')";
		if(mysqli_query($conn, $sql)){
			echo "Datos insertados correctamente.";
			// Obtener el siguiente id_departamento
			$query_ultimo_id = "SELECT MAX(id_departamento) as ultimo_id FROM t_prov";
			$resultado_ultimo_id = mysqli_query($conn, $query_ultimo_id);
			$ultimo_id = mysqli_fetch_assoc($resultado_ultimo_id);
			$id_departamento = $ultimo_id['ultimo_id'] + 1;
		}else{
			echo "Error al insertar datos: " . mysqli_error($conn);
		}
	}

	// Cerrar conexión
	mysqli_close($conn);
	?>
	<nav>
		<ul>
			<li><a href="../../menu.php">Menu Principal</a></li>
		</ul>
	</nav>
	<header>
		<h1>Ingresar Provincia</h1>
	</header>
	<form method="post" class="formulario">
		<label>País:</label>
		<select name="id_pais">
			<?php foreach($paises as $pais): ?>
			<option value="<?php echo $pais['id_pais']; ?>"><?php echo $pais['nombre_pais']; ?></option>
			<?php endforeach; ?>
		</select>
		<label>Nombre del estado:</label>
		<input type="text" name="nombre_estado">
		<input type="submit" name="submit" value="Guardar">
	</form>
</body>
</html>
