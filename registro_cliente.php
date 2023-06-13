<!DOCTYPE html>
<html lang="es">
<?php include_once('views/head.php')?>
<body>
    <?php include_once('views/header.php') ?>
    <main class="container">
        <h1 class="title upper text-center">Registro de Cliente</h1>

        <form action="" method="post" class="registro m-center">
            <fieldset class="br-1">
                <legend>Datos del Cliente:</legend>
                <div class="d-flex aling-center">
                    <label for="cliente" class="mr-1 bold">Nombre del Negocio:</label>
                    <input type="text" class="flex-1" id="cliente" name="cliente" placeholder="Ingresar Nombre del Negocio">
                </div>               
                <div class="d-flex aling-center mt-1">
                    <label for="contacto" class="mr-1 bold">Contacto:</label>
                    <input type="text" class="flex-1" id="contacto" name="contacto" placeholder="Ingresar Nombre del Contacto">
                </div>
                <div class="d-flex aling-center mt-1">
                    <label for="telefono" class="mr-1 bold">Telefono:</label>
                    <input type="tel" class="flex-1" id="telefono" name="telefono" placeholder="Numero de Telefono">
                </div>
                <div class="d-flex aling-center mt-1">
                    <label for="email" class="mr-1 bold">Email:</label>
                    <input type="email" class="flex-1" id="email" name="email" placeholder="Email">
                </div>
            </fieldset>
            <fieldset class="mt-1 br-1">
                <legend>Direccion del Negocio:</legend>
                <div class="d-flex aling-center">
                    <label for="calle" class="mr-1 bold">Calle:</label>
                    <input type="text" class="flex-1" id="calle" name="calle" placeholder="">
                </div>               
                <div class="d-flex aling-center mt-1">
                    <label for="numero" class="mr-1 bold">Numero:</label>
                    <input type="text" class="flex-1" id="numero" name="numero" placeholder="">
                </div>
                <div class="d-flex aling-center mt-1">
                    <label for="colonia" class="mr-1 bold">Colonia:</label>
                    <input type="text" class="flex-1" id="colonia" name="colonia" placeholder="">
                </div>
                <div class="d-flex aling-center mt-1">
                    <label for="localidad" class="mr-1 bold">Localidad:</label>
                    <input type="text" class="flex-1" id="localidad" name="localidad" placeholder="Email">
                </div>
            </fieldset>
        </form>
    </main>

</body>
<script src="assets/js/main.js"></script>
</html>