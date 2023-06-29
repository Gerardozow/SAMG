<?php
// Verificar si se ha enviado el formulario de registro
if (isset($_POST['nombre_usuario'], $_POST['password'], $_POST['confirmar_password'], $_POST['permisos'])) {
    $nombreUsuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];
    $confirmarPassword = $_POST['confirmar_password'];
    $permisos = $_POST['permisos'];

    // Validar los datos del formulario
    if (empty($nombreUsuario) || empty($password) || empty($confirmarPassword) || empty($permisos)) {
        // Mostrar mensaje de error si algún campo está vacío
        echo "Por favor, completa todos los campos.";
    } elseif ($password !== $confirmarPassword) {
        // Mostrar mensaje de error si las contraseñas no coinciden
        echo "Las contraseñas no coinciden. Por favor, intenta nuevamente.";
    } else {
        // Los datos del formulario son válidos, proceder a guardar el usuario en la base de datos
echo "1";
        include_once('../includes/config.php');

        // Escapar caracteres especiales para evitar inyección de SQL
        $nombreUsuario = mysqli_real_escape_string($conexion, $nombreUsuario);
        $password = mysqli_real_escape_string($conexion, $password);
        $permisos = mysqli_real_escape_string($conexion, $permisos);

        // Consultar si el nombre de usuario ya existe en la base de datos
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombreUsuario'";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) == 0) {
            // El nombre de usuario ya existe, mostrar mensaje de error
            echo "No existe el usuario.";
        } else {

            // Hashear la contraseña (ajusta el método de hash según tus necesidades)
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            // Insertar el usuario en la base de datos
            $sqlModificar = "UPDATE usuarios SET password = '$passwordHash' WHERE nombre_usuario = '$nombreUsuario'";

            if (mysqli_query($conexion, $sqlModificar)) {
                // Registro exitoso, almacenar mensaje de éxito en una variable de sesión
                $_SESSION['mensaje_exito'] = "El usuario se registró correctamente.";

                header("Location: ../change_password.php");
                mysqli_close($conexion);
                exit();
            } else {
                // Mostrar mensaje de error si no se pudo insertar el usuario en la base de datos
                $_SESSION['mensaje_error'] = "Error al registrar el usuario: " . mysqli_error($conexion);
                header("Location: ../change_password.php");
                mysqli_close($conexion);
                exit();
            }
            
        }  
    }
}
?>