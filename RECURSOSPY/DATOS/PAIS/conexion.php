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

// Verificar si ya existe el id_pais
$id_pais = 1;
$result = mysqli_query($conn, "SELECT MAX(id_pais) FROM t_pais");
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $id_pais = $row[0] + 1;
}

// Obtener el nombre del país
$nombre_pais = "";
if(isset($_POST['nombre_pais'])){
    $nombre_pais = strtoupper($_POST['nombre_pais']);
}

// Insertar datos en la tabla t_pais
if(isset($_POST['submit'])){
    $sql = "INSERT INTO t_pais (id_pais, nombre_pais) VALUES ('$id_pais', '$nombre_pais')";
    if(mysqli_query($conn, $sql)){
        echo "Datos insertados correctamente.";
    }else{
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
}

// Cerrar conexión
mysqli_close($conn);

?>
