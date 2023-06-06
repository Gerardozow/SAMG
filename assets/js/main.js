
// Agrega un evento de clic al elemento
document.getElementById("Menu").addEventListener("click", function() {
  // Alterna la clase del elemento
  console.log("clik")
  document.getElementById("Nav").classList.toggle("hearder__nav--active");
  document.getElementById("Icon").classList.toggle("gg-close");
  document.getElementById("Icon").classList.toggle("gg-menu");
});

function buscarInformacion() {
  var codigoPostal = document.getElementById('codigoPostal').value;

  // Llamada a la API de codigos postales
  fetch('https://apicp.softfortoday.com/api/v1/estados/codigo_postal/' + codigoPostal, {
    method: 'GET',
    mode: 'cors'
  })
    .then(response => response.json())
    .then(data => {

      //Limpiar Inputs anteriores
      var estadoSelect = document.getElementById('estado');
      estadoSelect.innerHTML = '';
      var coloniaSelect = document.getElementById('colonia');
      coloniaSelect.innerHTML = '';

      // Rellenar el select de estados
      var estados = data.respuesta;
      estados.forEach(function(codigo_estado) {
        var option = document.createElement('option');
        option.value = codigo_estado;
        option.textContent = codigo_estado;
        estadoSelect.appendChild(option);
      });

    })
    .catch(error => {
      console.log('Error al obtener la información:', error);
    });
}