<?php
include_once('includes/access.php');
login();

?>

<?php
// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['Ingresar'])) {
    // Verificar las credenciales del usuario
    $username = $_POST['usuario'];
    $password = $_POST['password'];

    // Aquí debes implementar la lógica para verificar las credenciales en tu base de datos
    // Por simplicidad, se utilizará una verificación básica en este ejemplo
    if ($username === 'admin' && $password === '123456') {
        // Credenciales válidas, iniciar sesión
        $_SESSION['id'] = 1;    
        $_SESSION['username'] = $username;

        // Redirigir al usuario a la página de inicio
        header("Location: home.php");
        exit();
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}
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



