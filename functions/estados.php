
<?php
include_once('../includes/config.php');

// Consulta SQL para obtener la información de colonia, localidad y estado en base al código postal
$query = "SELECT DISTINCT estado from cp ORDER BY estado ASC";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontró información para el código postal ingresado
if (mysqli_num_rows($resultado) > 0) {
    // Obtener los valores de colonia, localidad y estado
    $fila=mysqli_fetch_array($resultado);
    $estado = $fila['estado'];

    
    // Devolver la información como una respuesta en formato JSON
   $response = array('estado' => $estado);
    echo json_encode($response);
} else {
    // No se encontró información para el código postal ingresado
    echo json_encode("No se encontró información.");
}
mysqli_close($conexion);
?>