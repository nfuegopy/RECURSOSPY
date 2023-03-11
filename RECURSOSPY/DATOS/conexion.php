<?php
$servername = "localhost";
$username = "antonio";
$password = "2019Bboy";
$dbname = "rrhhpy";

// Establecer conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


?>
