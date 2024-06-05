document.addEventListener("DOMContentLoaded", function() {

  const maxSize = 500 * 1024; //300KB en bytes

  document.getElementById("imagen").addEventListener("change", function(event){
    const file = event.target.files[0];
    if(file && file.size > maxSize){
      alert("El tamaño del archivo no debe exceder los 500KB");
      event.target.value = ""; //Limpiamos la entrada
    }
  });

  const CatyModel = {
    "Automóvil de Lujo": ["Audi TT RS","Camaro RS","Ford Mustang"],
    "Automóvil Intermedio": ["Audi A4", "BMW Serie 1", "Cupra Formentor"],
    "Automóvil Eléctrico": ["JAC E10X","Tesla Model S","Toyota Prius Plug-in"],
    "Camioneta de Lujo": ["Cadillac Escalade","Chevrolet Suburban","GMC Yukon"],
    "Camioneta Intermedia": ["Chevrolet Trax","Nissan X-Trail","Volkswagen Tiguan"]
  };

  const ModelColors = {
    "Ford Mustang": ["Amarillo Splash", "Azul Atlas", "Blanco", "Gris Dark Matter","Rojo Race"],
    "Camaro RS": ["Amarillo", "Blanco", "Negro"],
    "Audi TT RS": ["Blanco Ibis (sólido)", "Gris Nardo (sólido)", "Naranja pulso (sólido)","Rojo Tango (metalizado)"],
    "Audi A4": ["Azul Navarra (metalizado)","Blanco Arkona (sólido)","Gris Daytona (efecto perla)","Negro Brillante (sólido)"],
    "BMW Serie 1": ["Melbourne Rot","Pintura metalizada Misano Blau","Pintura sólida Alpinweiss", "Pintura sólida Negra"],
    "Cupra Formentor": ["Azul Fiord (suave)", "Azul Petrol (mate)", "Blanco (suave)", "Negro Midnight (metalizado)"],
    "Toyota Prius Plug-in": ["Azul Ipanema", "Blanco Classic", "Gris Grafito", "Rojo Emoción"],
    "Tesla Model S": ["Metálico azul profundo", "Multicapa blanco perla", "Negro Sólido", "Stealth Grey","Ultra Red"],
    "JAC E10X": ["Azul Frío","Blanco Ártico", "Rojo Extremo", "Verde Lima"],
    "Cadillac Escalade": ["Abalone White Tricoat", "Black Meet Kettle Metallic", "Dark Reddish Metallic", "Opulent Blue Metallic"],
    "GMC Yukon": ["Abalone White Tricoat","Black Raven", "Radiant Red Metallic"],
    "Chevrolet Suburban": ["Blanco Platino", "Negro", "Rojo Radiante"],
    "Volkswagen Tiguan": ["Azul Verdoso (metalizado)", "Negro Oscuro (metalizado)","Plata (metalizado)"],
    "Nissan X-Trail": ["Azul Imperial", "Blanco Perlado", "Gris Oxford"],
    "Chevrolet Trax": ["Amarillo Metálico","Azul Metálico", "Blanco", "Negro Metálico", "Rojo Sangría"]
  };

  const catSelect = document.getElementById("categoria");
  const modelSelect = document.getElementById("modelo");
  const colorSelect = document.getElementById("color");

  catSelect.addEventListener("change", function() {
    const catSeleccionado = catSelect.value;
    const modelos = CatyModel[catSeleccionado] || [];

    // Limpiamos las opciones de modelo
    modelSelect.innerHTML = "<option value=''>Selecciona un modelo</option>";

    // Agregamos nuevas opciones de modelo
    modelos.forEach(modelo => {
      const option = document.createElement('option');
      option.value = modelo;
      option.textContent = modelo;
      modelSelect.appendChild(option);
    });

    // Limpiamos las opciones de color
    colorSelect.innerHTML = "<option value=''>Selecciona el color del modelo</option>";
  });

  modelSelect.addEventListener("change", function() {
    const modelSeleccionado = modelSelect.value;
    const colores = ModelColors[modelSeleccionado] || [];

    // Limpiamos las opciones de color
    colorSelect.innerHTML = "<option value=''>Selecciona el color del modelo</option>";

    // Agregamos nuevas opciones de color
    colores.forEach(color => {
      const option = document.createElement('option');
      option.value = color;
      option.textContent = color;
      colorSelect.appendChild(option);
    });
  });
});
