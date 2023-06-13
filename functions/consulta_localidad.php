<?php
include_once('../includes/config.php');

if (isset($_POST['verificar'])) {
    $cp = $_POST['cp'];

    // Realizar la consulta a la base de datos y obtener los resultados
    // Supongamos que tienes una tabla llamada 'opciones' con una columna 'valor'
    $query = "SELECT asentamiento, municipio, estado FROM cp WHERE cp = $cp";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si se encontraron resultados
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Obtener los valores de asentamiento y estado
        $asentamiento = array();
        $localidad = array();
        $estado = array();
        while($fila = mysqli_fetch_assoc($resultado)){
        $asentamiento[] = $fila['asentamiento'];
        $localidad[] = $fila['municipio'];
        $estado[]=$fila['estado'];
    };


        // Crear un array con los valores
        $response = array('asentamiento' => $asentamiento, 'localidad' => $localidad, 'estado' => $estado);

        // Devolver los valores como una respuesta en formato JSON
        echo json_encode($response);
    } else {
        // No se encontraron resultados
        echo json_encode([]);
    }

    mysqli_close($conexion);
    exit;
}
?>