<?php
$title="Registro de Usuario";
include_once('includes/access.php');
permisos();
?>
<!DOCTYPE html>
<html lang="es">
<?php include_once('views/head.php')?>
<body>
    <?php include_once('views/header.php')?>
    <h1 class="text-center upper">Registro de usuarios</h1>
    <form action="functions/procesar_registro.php" method="POST" class="registro">
        <?php if (isset($_SESSION['mensaje_exito'])) { ?>
            <div class="mensaje-exito">
                <?php echo $_SESSION['mensaje_exito']; ?>
            </div>
            <?php unset($_SESSION['mensaje_exito']); ?>
        <?php } ?>

        <!-- Mostrar notificación de error -->
        <?php if (isset($_SESSION['mensaje_error'])) { ?>
            <div class="mensaje-error">
                <?php echo $_SESSION['mensaje_error']; ?>
            </div>
            <?php unset($_SESSION['mensaje_error']); ?>
        <?php } ?>
        <label for="nombre_usuario" class="registro__label">Nombre de usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" class="registro__input" required><br>

        <label for="password"  class="registro__label">Contraseña:</label>
        <input type="password" name="password" id="password" class="registro__input" required><br>

        <label for="confirmar_contraseña" class="registro__label">Confirmar contraseña:</label>
        <input type="password" name="confirmar_password" id="confirmar_password" class="registro__input" required><br>

        <label for="permisos" class="registro__label">Permisos:</label>
        <select name="permisos" id="permisos"  class="registro__input" required>
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
        </select><br>

        <input type="submit" value="Registrar" class="block w100 btn-submit mt-1">
    </form>
</body>
</html>