<?php
include_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php include_once('views/head.php')?>
<body>
    <?php include_once('views/header.php') ?>
    <main class="container">
        <h1 class="title upper text-center">Registro de Cliente</h1>

        <form action="" method="post" class="registro m-center">
            <fieldset class="registro__grupo">
                <legend>Datos Generales</legend>

                <label for="nombre-negocio" class="registro__label">Nombre del Negocio:</label>
                <input type="text" id="nombre-negocio" name="nombre-negocio" class="registro__input" required>

                <label for="nombre-contacto" class="registro__label">Nombre de Contacto:</label>
                <input type="text" id="nombre-contacto" name="nombre-contacto" class="registro__input"  required>

                <label for="telefono-contacto" class="registro__label">Teléfono del Contacto:</label>
                <input type="tel" id="telefono-contacto" name="telefono-contacto" class="registro__input"  required>

                <label for="email-contacto" class="registro__label">Email del Contacto:</label>
                <input type="email" id="email-contacto" name="email-contacto" class="registro__input"  required>

            </fieldset>
            <fieldset class="registro__grupo">
                <legend>Direccion</legend>

                <label for="calle" class="registro__label">Calle:</label>
                <input type="text" id="calle" name="calle" class="registro__input"  required>

                <label for="numero" class="registro__label">Número:</label>
                <input type="text" id="numero" name="numero" class="registro__input"  required>
                
                <label for="cp" class="registro__label">Código Postal:</label>
                <div class="d-flex aling-center">
                    <input type="text" id="cp" name="cp" class="registro__input mr-1"  required>
                    <input type="submit" value="verificar" id="verificar" class="block btn mb-1">
                </div>

                <label for="colonia" class="registro__label">Colonia:</label>
                <select name="colonia" id="colonia" class="registro__select" >
                    <option value="0" disabled selected="true"></option>
                </select>

                <label for="localidad" class="registro__label">Localidad:</label>
                <select name="localidad" id="localidad" class="registro__select" >
                    <option value="0" disabled selected="true"></option>
                </select>
                
                <label for="estado" class="registro__label">Estado:</label>
                <select name="estado" id="estado" class="registro__select">
                    <option value="0" disabled selected="true">Selecciona un estado</option>
                    <?php 
                    $query = "SELECT * from estados";
                    $resultado = mysqli_query($conexion, $query);
                    if (mysqli_num_rows($resultado) > 0) {
                        while($fila=mysqli_fetch_array($resultado)){
                            $estado = $fila['estado'];
                            $id = $fila['id'];
                            echo "<option value=".$id.">".$estado."</option>";
                        }
                    }

                    ?>
                </select>

            </fieldset>

            <input type="submit" value="Enviar" class="block w100 btn-submit mt-1">
        </form>
    </main>

</body>
<script src="assets/js/main.js"></script>
</html>