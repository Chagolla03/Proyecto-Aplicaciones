document.addEventListener("DOMContentLoaded", function() {
  const ciudadSelect = document.getElementById("ciudad");
  const lugarRentaSelect = document.getElementById("lugar-renta");

  ciudadSelect.addEventListener("change", function() {
      const selectedCiudad = ciudadSelect.value;

      if (selectedCiudad === "León") {
          lugarRentaSelect.innerHTML = `
              <option value="">Selecciona una dirección en León</option>
              <option value="Col. Los Limones">Colonia los limones</option>
              <option value="Col. Panorama">Colonia Panorama</option>
              <option value="Col. Campestre">Colonia Campestre</option>
          `;
      } else if (selectedCiudad === "Irapuato") {
          lugarRentaSelect.innerHTML = `
              <option value="">Selecciona una dirección en Irapuato</option>
              <option value="Centro Histórico">Centro Histórico</option>
              <option value="Col. Mandarinas">Colonia Mandarinas</option>
              <option value="Col. Reforma">Colonia Reforma</option>
          `;
      } else {
          lugarRentaSelect.innerHTML = `<option value="">Selecciona una dirección</option>`;
      }
  });
});