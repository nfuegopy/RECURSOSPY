<?php 
include '../conexion.php';

// Obtener los países
$query_paises = "SELECT nombre_pais FROM t_pais";
$resultado_paises = mysqli_query($conn, $query_paises);
$paises = mysqli_fetch_all($resultado_paises, MYSQLI_ASSOC);

// Imprimir los países
foreach($paises as $pais){
	echo $pais['nombre_pais'] . "<br>";
}

// Cerrar conexión
mysqli_close($conn);
?>
