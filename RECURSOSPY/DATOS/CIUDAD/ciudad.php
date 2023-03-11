<!DOCTYPE html>
<html>
<head>
	<title>Ingresar Ciudad</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<?php 
	include '../conexion.php';

	// Obtener los países para llenar el combobox
	$query_paises = "SELECT id_pais, nombre_pais FROM t_pais";
	$resultado_paises = mysqli_query($conn, $query_paises);
	$paises = mysqli_fetch_all($resultado_paises, MYSQLI_ASSOC);

	// Obtener los departamentos para llenar el combobox
	$query_departamentos = "SELECT id_departamento, nombre_estado FROM t_prov";
	$resultado_departamentos = mysqli_query($conn, $query_departamentos);
	$departamentos = mysqli_fetch_all($resultado_departamentos, MYSQLI_ASSOC);

	// Obtener el siguiente id_ciudad
	$query_ultimo_id = "SELECT MAX(id_ciudad) as ultimo_id FROM t_ciu";
	$resultado_ultimo_id = mysqli_query($conn, $query_ultimo_id);
	$ultimo_id = mysqli_fetch_assoc($resultado_ultimo_id);
	$id_ciudad = $ultimo_id['ultimo_id'] + 1;


	// Insertar datos en la tabla t_ciu
	if(isset($_POST['submit'])){
		$id_pais = $_POST['id_pais'];
		$id_departamento = $_POST['id_departamento'];
		$nombre_ciudad = strtoupper($_POST['nombre_ciudad']);
		$sql = "INSERT INTO t_ciu (id_ciudad, id_departamento, id_pais, nombre_ciudad) VALUES ('$id_ciudad', '$id_departamento', '$id_pais', '$nombre_ciudad')";
		if(mysqli_query($conn, $sql)){
			echo "Datos insertados correctamente.";
			// Obtener el siguiente id_ciudad
			$query_ultimo_id = "SELECT MAX(id_ciudad) as ultimo_id FROM t_ciu";
			$resultado_ultimo_id = mysqli_query($conn, $query_ultimo_id);
			$ultimo_id = mysqli_fetch_assoc($resultado_ultimo_id);
			$id_ciudad = $ultimo_id['ultimo_id'] + 1;
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
		<h1>Ingresar Ciudad</h1>
	</header>
	<form method="post" class="formulario">
		<label>País:</label>
		<select name="id_pais">
			<?php foreach($paises as $pais): ?>
			<option value="<?php echo $pais['id_pais']; ?>"><?php echo $pais['nombre_pais']; ?></option>
			<?php endforeach; ?>
		</select>
		<label>Departamento:</label>
		<select name="id_departamento">
			<?php foreach($departamentos as $departamento): ?>
			<option value="<?php echo $departamento['id_departamento']; ?>"><?php echo $departamento['nombre_estado']; ?></option>
			<?php endforeach; ?>
		</select>
		<label>Nombre de la ciudad:</label>
		<input type="text" name="nombre_ciudad">
		<input type="submit"name="submit" value="Guardar">
</form>

</body>
</html>