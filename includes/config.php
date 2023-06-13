<?php
// Conexión a la base de datos MySQL
$conexion = mysqli_connect("localhost", "root", "1234", "samg");

// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Error en la conexión a MySQL: " . mysqli_connect_error();
    exit();
}


?>
