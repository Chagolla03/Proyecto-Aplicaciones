document.addEventListener("DOMContentLoaded", function() {

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
    "BMW Series 1": ["Pintura metalizada Melbourne Rot","Pintura metalizada Misano Blau","Pintura sólida Alpinweiss", "Pintura sólida Negra"],
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

    //Limpiamos las opciones de ciudad
    modelSelect.innerHTML = "";

    //Agregamos nuevas opciones
    modelos.forEach(modelo => {
      const option = document.createElement('option');
      option.value = modelo;
      option.textContent = modelo;
      modelSelect.appendChild(option);
    });
  });
});