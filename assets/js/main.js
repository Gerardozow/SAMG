
// Agrega un evento de clic al elemento
document.getElementById("Menu").addEventListener("click", function() {
  // Alterna la clase del elemento
  console.log("clik")
  document.getElementById("Nav").classList.toggle("hearder__nav--active");
  document.getElementById("Icon").classList.toggle("gg-close");
  document.getElementById("Icon").classList.toggle("gg-menu");
});


//Realizar busqueda de CP
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById("verificar").addEventListener('click', function(event) {
      event.preventDefault();

      var cp = document.getElementById('cp').value;
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                var selectAsentamiento = document.getElementById('colonia');
                var selectLocalidad = document.getElementById('localidad');
                var selectEstado = document.getElementById('estado');
                selectAsentamiento.innerHTML = '';
                selectLocalidad.innerHTML = '';
                selectEstado.innerHTML = '';

                // Agregar las opciones al select de asentamiento
                response.asentamiento.forEach(function(response){
                  var optionAsentamiento = document.createElement('option');
                  optionAsentamiento.value = response;
                  optionAsentamiento.text = response;
                  selectAsentamiento.appendChild(optionAsentamiento);
                });

                // Agregar las opciones únicas al select de localidad
                var uniqueLocalidades = new Set(response.localidad);
                var localidadesArray = [...uniqueLocalidades];
                localidadesArray.forEach(function(localidad) {
                  var optionLocalidad = document.createElement('option');
                  optionLocalidad.value = localidad;
                  optionLocalidad.text = localidad;
                  selectLocalidad.appendChild(optionLocalidad);
                })
                
                
                // Agregar las opciones únicas al select de Estado
                var uniqueEstado = new Set(response.estado);
                var EstadoArray = [...uniqueEstado];
                EstadoArray.forEach(function(estado) {
                  var optionEstado = document.createElement('option');
                  optionEstado.value = estado;
                  optionEstado.text = estado;
                  selectEstado.appendChild(optionEstado);
                })
            } else {
                console.log('Error en la solicitud AJAX');
            }
        }
    };

      xhr.open('POST', 'functions/consulta_localidad.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send('verificar=true&cp=' + encodeURIComponent(cp));
  });
});
