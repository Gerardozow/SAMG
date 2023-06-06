
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


document.addEventListener('DOMContentLoaded', function() {
  // Obtener el campo de código postal y registrar el evento de cambio
  var cpInput = document.getElementById('cp');
  cpInput.addEventListener('change', obtenerInformacionCP);
});

function obtenerInformacionCP() {
  
  var cp = this.value;
  if (cp.length === 5) {
  // Realizar la solicitud AJAX al archivo PHP
  fetch('functions/cp.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'cp=' + encodeURIComponent(cp)
  })
  .then(function(response) {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error('Error al obtener la información del código postal.');
    }
  })
  .then(function(data) {
    // Actualizar los campos de colonia, localidad y estado con la información recibida
    document.getElementById('colonia').value = data.colonia;
    document.getElementById('localidad').value = data.municipio;
    document.getElementById('estado').value = data.estado;
  })
  .catch(function(error) {
    // Manejar el error si ocurre
    alert(error.message);
  });
}
}