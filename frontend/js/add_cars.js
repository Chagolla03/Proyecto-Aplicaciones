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