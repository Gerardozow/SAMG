
// Agrega un evento de clic al elemento
document.getElementById("Menu").addEventListener("click", function() {
  // Alterna la clase del elemento
  console.log("clik")
  document.getElementById("Nav").classList.toggle("hearder__nav--active");
  document.getElementById("Icon").classList.toggle("gg-close");
  document.getElementById("Icon").classList.toggle("gg-menu");
});

// Verificar si el navegador soporta la geolocalización
if ("geolocation" in navigator) {
  var geolocationBtn = document.getElementById("geolocationBtn");

  // Manejar el clic en el botón
  geolocationBtn.addEventListener("click", function() {
      navigator.geolocation.getCurrentPosition(function(position) {
          // Obtener la latitud y longitud
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;

          // Generar el enlace de Google Maps
          var googleMapsLink = "https://www.google.com/maps?q=" + latitude + "," + longitude;

          // Abrir el enlace en una nueva pestaña
          window.open(googleMapsLink, "_blank");
      });
  });
} else {
  console.log("Geolocalización no está disponible en este navegador");
}





function obtenerDatosCP() {
  var codigoPostal = document.getElementById('codigo_postal').value;

  // Crear un objeto XMLHttpRequest
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'functions/cp.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  // Configurar la función de respuesta
  xhr.onload = function() {
      if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response) {
              console.log(response)

              //Limpiar Selects
              var coloniaSelect = document.getElementById('colonia');
              coloniaSelect.innerHTML = '';

              response.colonia.forEach(function(colonia) {
                  var option = document.createElement('option');
                  option.value = colonia;
                  option.text = colonia;
                  coloniaSelect.appendChild(option);
              });


          }
      }
  };
  
  // Enviar la solicitud
  xhr.send('cp=' + encodeURIComponent(codigoPostal));
}