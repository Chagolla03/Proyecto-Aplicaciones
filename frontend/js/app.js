const registrarForm = document.getElementById('registrarForm') || null

//función para la lista desplegable de la opción ciudad
document.addEventListener('DOMContentLoaded', function(){
  const Estados_Ciudades = {
    'Guanajuato': ['Celaya','Guanajuato', 'Irapuato', 'León', 'Silao'],
    'Querétaro': ['El Pueblito', 'San Juan del Río', 'Santiago de Querétaro'],
    'Michoacán': ['Morelia', 'Uruapan del Progreso', 'Zamora de Hidalgo'],
  };

  const estadoSelect = document.getElementById('estado');
  const ciudadSelect = document.getElementById('ciudad');

  estadoSelect.addEventListener('change', function(){
    const estadoSeleccionado = estadoSelect.value;
    const ciudades = Estados_Ciudades[estadoSeleccionado] || [];

    //Limpiamos las opciones de la ciudad
    ciudadSelect.innerHTML = '';

    //Agregamos nuevas opciones
    ciudades.forEach (ciudad => {
      const option = document.createElement('option');
      option.value = ciudad;
      option.textContent = ciudad;
      ciudadSelect.appendChild(option);
    });
  });
});

//Función para el registro
if(registrarForm){
  registrarForm.addEventListener('submit', (event)=> {
    event.preventDefault() //para hacer refresh 
    const form = new FormData(registrarForm)

    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })

    .then((response) => response.json())
    .then((res) => {
      console.log('@@ res =>', res)
      if (res.message === 'Usuario Registrado Satisfactoriamente'){
        window.location.href = '../frontend/login.html';
      }
    })
    .catch((err) => {
      console.log('@@ err =>', err)
    })
  })
}