<?php
$title = "Inicio de Sesion";
include_once('includes/access.php');
include_once('includes/config.php');
login();
?>

<?php
// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['Ingresar'])) {
    // Verificar las credenciales del usuario
    $username = $_POST['usuario'];
    $password = $_POST['password'];

    // Prevenir ataques de inyección SQL
    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);

    // Construir la consulta SQL
    $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$username'";

    // Ejecutar la consulta
    $result = mysqli_query($conexion, $query);

    // Verificar el resultado de la consulta
    if (mysqli_num_rows($result) === 1) {
        // Obtener el registro de usuario de la base de datos
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verificar si la contraseña ingresada coincide con la contraseña encriptada
        if (password_verify($password, $hashedPassword)) {
            // Credenciales válidas, iniciar sesión
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['nombre_usuario'];
            $_SESSION['permisos'] = $row['permisos'];
            
            // Redirigir al usuario a la página de inicio
            header("Location: home.php");
            exit();
        } else {
            // Contraseña inválida, mostrar mensaje de error
            $error = "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // Usuario no encontrado, mostrar mensaje de error
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="es">
<?php include_once('views/head.php')?>
<body class="d-flex justify-center aling-center" style="height: 100vh;">
    <main class="container login ">
        <div class="d-flex mb-1 justify-center login__logo">
            <img src="assets/img/logo.png" alt="" width="100px">
            <h1 class="login__titulo upper">Sistema de Administracion MAUGER</h1>
        </div>
        

        <form action="" method="POST">
                <?php if (isset($error)){ ?>
                <p><?= $error; ?></p>
                <?php }; ?>
            <label for="usuario" class="registro__label">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario" class="registro__input">

            <label for="password" class="registro__label">Password</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" class="registro__input">

            <input type="submit" value="Ingresar" name="Ingresar"class="btn-submit w100">
        </form>

    </main>

</body>
<script src="assets/js/main.js"></script>
</html>



