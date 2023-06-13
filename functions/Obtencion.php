<?php
// Conexión a la base de datos MySQL
$conexion = mysqli_connect("localhost", "root", "1234", "samg");

// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Error en la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Obtener el código postal ingresado por el usuario
$cp = $_POST['cp'];

// Consulta SQL para obtener la información de colonia, localidad y estado en base al código postal
$query = "SELECT asentamiento, municipio, estado FROM cp WHERE cp = '$cp'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontró información para el código postal ingresado
if (mysqli_num_rows($resultado) > 0) {
    // Obtener los valores de colonia, localidad y estado
    $fila = mysqli_fetch_array($resultado);
    $colonia = $fila['asentamiento'];
    $municipio = $fila['municipio'];
    $estado = $fila['estado'];

    // Devolver la información como una respuesta en formato JSON
    $response = array('colonia' => $colonia, 'municipio' => $municipio, 'estado' => $estado);
    echo json_encode($response);
} else {
    // No se encontró información para el código postal ingresado
    echo json_encode("No se encontró información para el código postal ingresado.");
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>