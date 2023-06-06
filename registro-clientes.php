<!DOCTYPE html>
<html lang="es">
<?php include_once('views/head.php')?>
<body>
    <?php include_once('views/header.php') ?>
    <main class="container">
        <h1 class="title">Registro de Cliente</h1>
        
        <form>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion">

            <label for="codigoPostal">Código Postal:</label>
            <input type="text" id="codigoPostal" name="codigoPostal">

            <label for="estado">Estado:</label>
            <select id="estado" name="estado"></select>

            <label for="colonia">Colonia:</label>
            <select id="colonia" name="colonia"></select>

            <button type="button" onclick="buscarInformacion()">Buscar</button>
        </form>
    </main>

</body>
<script src="assets/js/main.js"></script>
</html>