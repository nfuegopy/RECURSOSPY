<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "antonio", "2019Bboy", "rrhhpy");

// Verificar si se ha producido un error al conectar
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos.";
}

// Leer los datos del formulario
$usuario = $_POST["usuario"];
$contrasena = $_POST["contraseña"];

// Buscar el usuario y la contraseña en la tabla t_log
$resultado = mysqli_query($conexion, "SELECT * FROM t_log WHERE usuario = '$usuario' AND contrasena = '$contrasena'");

// Verificar si se encontró un registro en la tabla
if(mysqli_num_rows($resultado) == 1) {
	// Inicio de sesión correcto: redirigir a la página de menú principal
	header('Location: menu.php');
	exit;

}
else {
	// Inicio de sesión incorrecto: mostrar mensaje de error
	echo "Usuario o contraseña incorrectos";
}
?>
