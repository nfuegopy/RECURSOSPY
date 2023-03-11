<?php 
include '../conexion.php';

// Obtener los estados/provincias
$query_estados = "SELECT nombre_estado FROM t_prov";
$resultado_estados = mysqli_query($conn, $query_estados);
$estados = mysqli_fetch_all($resultado_estados, MYSQLI_ASSOC);

// Imprimir los estados/provincias
foreach($estados as $estado){
	echo $estado['nombre_estado'] . "<br>";
}

// Cerrar conexión
mysqli_close($conn);
?>
