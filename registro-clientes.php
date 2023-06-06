<!DOCTYPE html>
<html lang="es">
<?php include_once('views/head.php')?>
<body>
    <?php include_once('views/header.php') ?>
    <main class="container">
        <h1 class="title">Registro de Cliente</h1>
        <form>
            <label for="nombre-negocio">Nombre del Negocio:</label>
            <input type="text" id="nombre-negocio" name="nombre-negocio" required><br>
            
            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle" required><br>
            
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" required><br>
            
            <label for="cp">Código Postal:</label>
            <input type="text" id="cp" name="cp" required><br>
            
            <label for="colonia">Colonia:</label>
            <input type="text" id="colonia" name="colonia" required><br>
            
            <label for="localidad">Localidad:</label>
            <input type="text" id="localidad" name="localidad" required><br>
            
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required><br>
            
            <label for="nombre-contacto">Nombre de contacto:</label>
            <input type="text" id="nombre-contacto" name="nombre-contacto" required><br>
            
            <label for="telefono-contacto">Teléfono del Contacto:</label>
            <input type="tel" id="telefono-contacto" name="telefono-contacto" required><br>
        
            <button id="geolocationBtn">Obtener Geolocalización</button>

            <input type="submit" value="Enviar">
        </form>
        
        
        
    </main>

</body>
<script src="assets/js/main.js"></script>
</html>